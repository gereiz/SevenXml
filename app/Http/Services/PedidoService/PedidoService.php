<?php

namespace App\Http\Services\PedidoService;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PedidoService
{
    private $url;
    private $api_key;

    public function __construct() {
        $this->url = env('SV_API_URL');
        $this->api_key = env('SV_API_KEY');
    }


    public function getPedido($pedido) : array {

        $client = new Client();
        $response = $client->request('GET', $this->url . '/Pedido'.'/'.$pedido, [
            'headers' => [
                'Token' => $this->api_key,
                'Content-Type' => 'application/json'
            ]
        ]);


        $response = json_decode($response->getBody()->getContents(), true);

        session()->put('pedido', $response);

        $fornecedor_id = $response['pedi_forn_id'];
        $contratante_id = $response['pedi_cont_id'];

        $fornecedor = $this->getPedidoFornecedor($fornecedor_id);
        $nome_fornecedor = $fornecedor->cont_razao_social;

        $cliente = $this->getPedidoContratante($contratante_id);
        $nome_cliente = $cliente->cont_razao_social;


        // Retorna o nomes e código de cada produto do pedido
        $itens = $response['pedi_itens'];

        $produtos = $this->getProdutos($itens);


       return compact('response','nome_fornecedor', 'nome_cliente', 'produtos');
    }


    public function getPedidoFornecedor($id) {
       $client = new Client();
         $response = $client->request('GET', $this->url . '/Industria'.'/'.$id, [
              'headers' => [
                'Token' => $this->api_key,
                'Content-Type' => 'application/json'
              ]
        ]);

        return json_decode($response->getBody()->getContents());
    }


    public function getPedidoContratante($id) {
        $client = new Client();
        $response = $client->request('GET', $this->url . '/Cliente'.'/'.$id, [
            'headers' => [
                'Token' => $this->api_key,
                'Content-Type' => 'application/json'
            ]
        ]);

        return json_decode($response->getBody()->getContents());
    }


    public function getProdutos($itens) {
        // Lógica antiga, remover na proxima versão
        // $array_produtos = [];

        // foreach ($itens as $key => $item) {

        //     $produto = new Client();
        //     $response = $produto->request('GET', $this->url . '/Produto'.'/'.$item['peit_prod_id'], [
        //         'headers' => [
        //             'Token' => $this->api_key,
        //             'Content-Type' => 'application/json'
        //         ]
        //     ]);


        //     $produto = json_decode($response->getBody()->getContents(), true);


        //     $array_produtos[] = [
        //         'codigo' => $produto['prod_id'],
        //         'nome' => $produto['prod_descricao'],
        //         'referencia' => $produto['prod_codigo'],
        //         'item' => $item['peit_id'],

        //     ];
        // }

        $responses = Http::pool(fn ($pool) =>
            collect($itens)->map(fn ($item) =>
                $pool->as($item['peit_prod_id'])->withHeaders([
                    'Token' => $this->api_key,
                    'Content-Type' => 'application/json',
                ])->timeout(60)
                ->connectTimeout(30)
                ->get($this->url . '/Produto/' . $item['peit_prod_id'])
            )
        );

        $array_produtos = [];

        foreach ($responses as $id => $response) {
            if ($response instanceof \Illuminate\Http\Client\Response) {
                // Requisição bem-sucedida ou com falha (mas não uma exceção de conexão)
                if ($response->successful()) {
                    $produto = $response->json();
                    $item = collect($itens)->firstWhere('peit_prod_id', $id);
                    $array_produtos[] = [
                        'codigo' => $produto['prod_id'],
                        'nome' => $produto['prod_descricao'],
                        'referencia' => $produto['prod_codigo'],
                        'item' => $item['peit_id'],
                    ];
                } else {
                    Log::error("Erro ao buscar produto ID {$id}: {$response->status()}");
                }
            } else {
                // Caso a resposta seja uma exceção (exemplo: timeout ou falha de conexão)
                Log::error("Exceção ao buscar produto ID {$id}: {$response->getMessage()}");
            }
        }
        return $array_produtos;
    }


    public function atualizaPedCliente($request) {


        $pedido = session('pedido')['pedi_id'];
        $numero_nf = session('xmlArray')['NFe']['infNFe']['ide']['nNF'];
        $data_fatura = session('xmlArray')['NFe']['infNFe']['ide']['dhEmi'];

        $response = HTTP::withHeaders([
            'Token' => $this->api_key,
            'Content-Type' => 'application/json'
        ])->put($this->url .  '/Pedido'.'/'.$pedido, [
            "pedi_data_fatura" => $data_fatura,
            "pedi_nf" => $numero_nf,
            "pedi_pest_id" => 5


        ]);
    }


    public function atualizaProdutos($request) {

        $pedido_sv = $this->getPedido($request['ped_id']);
        $produtos = $pedido_sv['produtos'];

        $xml_produtos = session('xmlArray')['NFe']['infNFe']['det'];
        if (!isset($xml_produtos[0])) {
            $xml_produtos = [$xml_produtos];
        }

        // Pega o fator multiplicador no campo de observação
        $fator_mult = intval(preg_replace('/[a-zA-Z]/', '', substr($request->obs, -4)));
        $produtos_xml = $request->xml_produtos;
        $lista_referencias = [];

        $requests = [];

        // Construção das requisições com base no XML
        foreach ($produtos_xml as $produto) {
            $ref_produto = $produto['xml_prod_cod'];
            $lista_referencias[] = $ref_produto;

            foreach ($produtos as $prod) {
                if ($ref_produto == $prod['referencia']) {
                    $vlr_produto = null;

                    foreach ($xml_produtos as $xml_produto) {
                        if ($xml_produto['prod']['cProd'] == $ref_produto) {
                            $unidade_compra = $xml_produto['prod']['uCom'];
                            $valor_compra = $xml_produto['prod']['vUnCom'];

                            if (strlen($unidade_compra) > 2) {
                                $unidade_compra = substr($unidade_compra, 2);
                                $vlr_produto = ($valor_compra / $unidade_compra) * $fator_mult;
                            } else {
                                $vlr_produto = str_replace(',', '.', $produto['xml_prod_vlr']);
                                $vlr_produto = substr($vlr_produto, 3);
                            }
                            break;
                        }
                    }

                    // dd($vlr_produto, $fator_mult, $unidade_compra);

                    if (isset($produto['xml_prod_ipi'])) {
                        $ipi_produto = str_replace(',', '.', $produto['xml_prod_ipi']);
                        $ipi_produto = substr($ipi_produto, 3);
                    }

                    $requests[] = [
                        'url' => $this->url . '/PedidoItem/' . $prod['item'],
                        'data' => [
                            "peit_preco" => floatval($vlr_produto),
                            "peit_qtde_faturada" => intval($produto['xml_prod_qtde']),
                            // "peit_ipi" => floatval($ipi_produto),
                        ],
                    ];
                }
            }
        }

        // Adicionar requisições para zerar produtos não encontrados no XML
        foreach ($produtos as $prod) {
            if (!in_array($prod['referencia'], $lista_referencias)) {
                $requests[] = [
                    'url' => $this->url . '/PedidoItem/' . $prod['item'],
                    'data' => [
                        "peit_preco" => 0,
                    ],
                ];
            }
        }

        // Envio das requisições em paralelo usando Http::pool
        $responses = Http::pool(fn ($pool) =>
            collect($requests)->map(fn ($req) =>
                $pool->as($req['url'])->withHeaders([
                    'Token' => $this->api_key,
                    'Content-Type' => 'application/json',
                ])->put($req['url'], $req['data'])
            )
        );

        // Processar respostas para log de erros
        foreach ($responses as $url => $response) {
            if (!$response->successful()) {
                Log::error("Erro ao atualizar item via API: {$url}, Status: {$response->status()}, Body: {$response->body()}");
            }
        }

        return ('Itens do Pedido atualizado com sucesso!');

    }


    public function atualizaPedComissao($request) {

        // Extrai o fator multiplicador
        $fator_mult = substr($request->obs, -4);
        $fator_mult = intval(preg_replace('/[a-zA-Z]/', '', $fator_mult));

        // Recupera as comissões do pedido
        $comissoes_sv = Http::withHeaders([
            'Token' => $this->api_key,
            'Content-Type' => 'application/json',
        ])
        ->get($this->url . '/PedidoComissao?pefa_pedi_id=' . $request->ped_id)
        ->json();

        // Apaga as comissões existentes utilizando pool
        Http::pool(fn ($pool) =>
            collect($comissoes_sv)->map(fn ($comissao) =>
                $pool->delete($this->url . '/PedidoComissao/' . $comissao['pefa_id'])
            )
        );

        // Processa o valor da nota fiscal
        $vlr_nf = array_key_last($request['xml_total']);
        $data_fatura = session('xmlArray')['NFe']['infNFe']['ide']['dhEmi'];

        $valor_previsto = str_replace(',', '.', strval($request['xml_total'][$vlr_nf]['xml_vlr_nf']));
        $valor_previsto = substr(str_replace('.', '', substr($valor_previsto, 3)), 0, -2) . '.' . substr($valor_previsto, -2);

        $valor_faturado = (floatval($valor_previsto) / count($request->xml_duplicatas));

        // Se tiver IPI, ajusta o valor previsto
        if (!empty($request['xml_total'][$vlr_nf]['xml_ipi_total'])) {
            $ipi_previsto = str_replace(',', '.', strval($request['xml_total'][$vlr_nf]['xml_ipi_total']));
            $ipi_previsto = substr(str_replace('.', '', $ipi_previsto), 0, -2) . '.' . substr($ipi_previsto, -2);
            $valor_previsto += floatval($ipi_previsto);
        }

        $valor_previsto = round($valor_previsto / count($request->xml_duplicatas), 2);
        $valor_total_produtos = $valor_previsto;
        $numero_nf = session('xmlArray')['NFe']['infNFe']['ide']['nNF'];

        // Recupera as duplicatas do XML
        $duplicatas_xml = $request->xml_duplicatas;

        // Processa duplicatas utilizando pool
        $requests = collect($duplicatas_xml)->flatMap(function ($duplicata) use (
            $fator_mult, $valor_faturado, $valor_total_produtos, $data_fatura, $numero_nf, $request
        ) {
            $data_dup = explode('/', $duplicata['xml_dup_venc']);
            $data_dup = $data_dup[2] . '-' . $data_dup[1] . '-' . $data_dup[0] . 'T00:00:00';

            $datas_condicao = explode('/', session('pedido')['pedi_condicao']);
            $data_final = substr(end($datas_condicao), 0, 2);
            array_pop($datas_condicao);
            $datas_condicao[] = $data_final;

            $requests = [];
            if ($fator_mult <= 2) {
                $fator = 1;
                $valor_faturado *= 0.7;
                $valor_total_produtos *= 0.7;

                for ($i = 0; $i < $fator_mult; $i++) {
                    $data_liquidez = date('Y-m-d', strtotime($data_dup . ' + ' . $datas_condicao[$i] . ' days')) . 'T00:00:00';

                    $requests[] = [
                        "pefa_pedi_id" => $request->ped_id,
                        "pefa_valor" => $valor_faturado,
                        "pefa_valor_recebido" => $valor_total_produtos,
                        "pefa_data" => $data_liquidez,
                        "pefa_data_agrupamento" => $data_fatura,
                        "pefa_nota_fiscal" => $numero_nf,
                        "pefa_status" => "NC",
                    ];
                }
            } else {
                $fator = 2;
                for ($i = 1; $i <= $fator; $i++) {
                    $data_liquidez = date('Y-m-d', strtotime($data_dup . ' + ' . ($datas_condicao[$i] + 30) . ' days')) . 'T00:00:00';

                    $requests[] = [
                        "pefa_pedi_id" => $request->ped_id,
                        "pefa_valor" => $valor_faturado * $i,
                        "pefa_valor_recebido" => $valor_total_produtos,
                        "pefa_data" => $data_liquidez,
                        "pefa_data_agrupamento" => $data_fatura,
                        "pefa_nota_fiscal" => $numero_nf,
                        "pefa_status" => "NC",
                    ];
                }
            }
            return $requests;
        });

        // Realiza as requisições em pool para criar as duplicatas
        Http::pool(fn ($pool) =>
            collect($requests)->map(fn ($data) =>
                $pool->post($this->url . '/PedidoComissao', $data)
            )
        );
        return 'Dados atualizados com sucesso!';
    }

}
