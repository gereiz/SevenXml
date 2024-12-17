<?php

namespace App\Http\Services\PedidoService;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

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
        $array_produtos = [];


        foreach ($itens as $key => $item) {

            $produto = new Client();
            $response = $produto->request('GET', $this->url . '/Produto'.'/'.$item['peit_prod_id'], [
                'headers' => [
                    'Token' => $this->api_key,
                    'Content-Type' => 'application/json'
                ]
            ]);


            $produto = json_decode($response->getBody()->getContents(), true);


            $array_produtos[] = [
                'codigo' => $produto['prod_id'],
                'nome' => $produto['prod_descricao'],
                'referencia' => $produto['prod_codigo'],
                'item' => $item['peit_id'],

            ];
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

        if(count(session('xmlArray')['NFe']['infNFe']['det']) > 3) {
            $unidade_compra = session('xmlArray')['NFe']['infNFe']['det'][0]['prod']['uCom'];
            $valor_compra = session('xmlArray')['NFe']['infNFe']['det'][0]['prod']['vUnCom'];
        } else {
            $unidade_compra = session('xmlArray')['NFe']['infNFe']['det']['prod']['uCom'];
            $valor_compra = session('xmlArray')['NFe']['infNFe']['det']['prod']['vUnCom'];
        }



        $xml_produtos = (session('xmlArray')['NFe']['infNFe']['det']);


        // Pega o fator multiplicador no campo de obs
        $fator_mult = substr($request->obs, -4);
        // remove letras e espaços do fator multiplicador
        $fator_mult = intval(preg_replace('/[a-zA-Z]/', '', $fator_mult));

        $client = new Client();

        // separa o nome dos produtos e o código
        $produtos_xml = $request->xml_produtos;
        $body = [];

        // Inicializa o array de referências fora do loop externo
        $lista_referencias = [];

        // Verifica se o código do produto do XML é igual ao código do produto do pedido
        foreach($produtos_xml as $produto) {
            $ref_produto = $produto['xml_prod_cod'];

            // Adiciona a referência do produto do XML ao array de referências
            $lista_referencias[] = $ref_produto;

            // Percorre o array de produtos do pedido e verifica se o código do produto do XML é igual ao código do produto do pedido
            foreach($produtos as $prod) {
                if($ref_produto == $prod['referencia']) {

                    if(count($xml_produtos) > 3) {
                        foreach($xml_produtos as $xml_produto) {
                            if($xml_produto['prod']['cProd'] == $ref_produto) {
                                $unidade_compra = $xml_produto['prod']['uCom'];
                                $valor_compra = $xml_produto['prod']['vUnCom'];



                                if(strlen($unidade_compra) > 2) {
                                    $unidade_compra = substr($unidade_compra, 2);
                                    $vlr_produto = ($valor_compra / $unidade_compra) * $fator_mult;
                                } else {
                                    $vlr_produto = str_replace(',', '.', $produto['xml_prod_vlr']);
                                    $vlr_produto = substr($vlr_produto, 3);
                                }
                            }
                        }

                    } else {
                        $primeira_execucao = true; // Variável de controle para a primeira execução

                        foreach($xml_produtos as $xml_produto) {
                            if ($primeira_execucao) {
                                $primeira_execucao = false; // Define como falso após a primeira execução
                                continue; // Pula a iteração atual
                            }

                            if ($xml_produto['cProd'] == $ref_produto) {
                                $unidade_compra = $xml_produto['uCom'];
                                $valor_compra = $xml_produto['vUnCom'];

                                if (strlen($unidade_compra) > 2) {
                                    $unidade_compra = substr($unidade_compra, 2);
                                    $vlr_produto = ($valor_compra / $unidade_compra) * $fator_mult;
                                } else {
                                    $vlr_produto = str_replace(',', '.', $produto['xml_prod_vlr']);
                                    $vlr_produto = substr($vlr_produto, 3);
                                }
                            }
                            break; // Encerra o loop após a primeira exec
                        }

                    }

                    // Transforma o IPI do produto do XML em float, caso exista
                    if(isset($produto['xml_prod_ipi'])) {
                        $ipi_produto = str_replace(',', '.', $produto['xml_prod_ipi']);
                        $ipi_produto = substr($ipi_produto, 3);
                    }

                    // Atualiza o preço do produto no pedido
                    $response = HTTP::withHeaders([
                        'Token' => $this->api_key,
                        'Content-Type' => 'application/json'
                    ])->put($this->url . '/PedidoItem'.'/'. $prod['item'], [ // Atualiza a quantidade do item
                        "peit_preco" => floatval($vlr_produto),
                        "peit_qtde" => intval($produto['xml_prod_qtde']),
                        // "peit_ipi" => floatval($ipi_produto)
                    ]);
                }
            }
        }

        // Após processar todos os produtos XML, verifica produtos do pedido que não têm referência no XML
        foreach($produtos as $prod) {
            if(!in_array($prod['referencia'], $lista_referencias)) {
                // Zera o valor do produto
                $response = HTTP::withHeaders([
                    'Token' => $this->api_key,
                    'Content-Type' => 'application/json'
                ])->put($this->url . '/PedidoItem'.'/'. $prod['item'], [
                    "peit_preco" => 0,
                    // "peit_qtde" => intval($produto['xml_prod_qtde']),
                    // "peit_ipi" => floatval($ipi_produto)
                ]);
            }
        }


        return ('Itens do Pedido atualizado com sucesso!');

    }


    public function atualizaPedComissao($request) {

        // Pega o fator multiplicador no campo de obs
        $fator_mult = substr($request->obs, -4);
        // remove letras e espaços do fator multiplicador
        $fator_mult = intval(preg_replace('/[a-zA-Z]/', '', $fator_mult));


        // Recupera as comissões do pedido
        $comissoes_sv = HTTP::withHeaders([
            'Token' => $this->api_key,
            'Content-Type' => 'application/json'
        ])
        ->get($this->url . '/PedidoComissao'.'/?pefa_pedi_id='.$request->ped_id)
        ->json();


        // apaga as comissões do pedido
        foreach($comissoes_sv as $key => $comissao) {
            $response = HTTP::withHeaders([
                'Token' => $this->api_key,
                'Content-Type' => 'application/json'
            ])->delete($this->url . '/PedidoComissao'.'/'.$comissao['pefa_id']);
        }

        // pega o ultimo item do array $request['xml_total']
        $vlr_nf = array_key_last($request['xml_total']);
        $data_fatura = session('xmlArray')['NFe']['infNFe']['ide']['dhEmi'];


        // transforma o valor previsto em float
        $valor_previsto = str_replace(',', '.', strval($request['xml_total'][$vlr_nf]['xml_vlr_nf']));
        // remove o R$ do valor previsto
        $valor_previsto = substr($valor_previsto, 3);
        // remove os pontos do valor previsto
        $valor_previsto = str_replace('.', '', $valor_previsto);
        // adiciona o ponto nos dois últimos digitos do valor previsto
        $valor_previsto = substr_replace($valor_previsto, '.', -2, 0);

        $valor_faturado = (intval($valor_previsto) / count($request->xml_duplicatas));


        //Se tiver IPI, formata o valor do IPI
        if($request['xml_total'][$vlr_nf]['xml_ipi_total']) {

            // transforma o ipi previsto em float
            $ipi_previsto = str_replace(',', '.', strval($request['xml_total'][$vlr_nf]['xml_ipi_total']));
            // remove o R$ do ipi previsto
            // $ipi_previsto = substr($ipi_previsto, 3);
            // remove os pontos do ipi previsto
            $ipi_previsto = str_replace('.', '', $ipi_previsto);
            // adiciona o ponto nos dois últimos digitos do ipi previsto
            $ipi_previsto = substr_replace($ipi_previsto, '.', -2, 0);

            // soma o valor previsto com o ipi previsto
            $valor_previsto = $valor_previsto + $ipi_previsto;

        }

        // divide o valor previsto pelo número de duplicatas
        $valor_previsto = (intval($valor_previsto) / count($request->xml_duplicatas));
        //arredonda o valor previsto para duas casas decimais
        $valor_previsto = round($valor_previsto, 2);

        $valor_total_produtos = $valor_previsto;

        $numero_nf = session('xmlArray')['NFe']['infNFe']['ide']['nNF'];


        // recuperar as duplicatas do xml
        $duplicatas_xml = $request->xml_duplicatas;


        // percorre as duplicatas do xml
        foreach($duplicatas_xml as $key => $duplicata) {

            // separa em dia mês e ano a data da duplicata do xml
            $data_dup = explode('/', $duplicata['xml_dup_venc']);
            // inverte a data da duplicata do xml
            $data_dup = $data_dup[2].'-'.$data_dup[1].'-'.$data_dup[0];
            // transforma em datetime no formato 2019-07-01T00:00:00
            $data_liquidez = date('Y-m-d', strtotime($data_dup)).'T00:00:00';


            // separa as datas da condição de pagamento do campo session('pedido')['pedi_condicao'] separadas por /
            $datas_condicao = explode('/', session('pedido')['pedi_condicao']);

            //  pega somente os dois primeiros digitos do ultimo item do array
            $data_final = substr($datas_condicao[count($datas_condicao) - 1], 0, 2);

            // remove o ultimo item do array e adiciona o item com os dois primeiros digitos
            array_pop($datas_condicao);
            array_push($datas_condicao, $data_final);

            if($fator_mult <= 2) {
                $fator = 1;
                $valor_faturado = $valor_faturado*0.7;
                $valor_total_produtos = $valor_total_produtos*0.7;

               // adiciona duplicatas multiplidas pelo fator multiplicador
                for($i = 0; $i < $fator_mult; $i++) {

                    // soma a quantidade de dias da condição de pagamento com a data da duplicata
                    $data_liquidez = date('Y-m-d', strtotime($data_liquidez. ' + '.$datas_condicao[$i].' days')).'T00:00:00';


                    $response = HTTP::withHeaders([
                        'Token' => $this->api_key,
                        'Content-Type' => 'application/json'
                    ])->post($this->url . '/PedidoComissao', [
                        "pefa_pedi_id" => $request->ped_id,
                        "pefa_valor" => $valor_faturado,
                        "pefa_valor_recebido" => $valor_total_produtos,
                        "pefa_data" => $data_dup,
                        "pefa_data_agrupamento" => $data_fatura,
                        "pefa_nota_fiscal" => $numero_nf,
                        "pefa_status" => "NC"

                    ]);
                }

            } else {
                $fator = 2;

                for($i = 1; $i <= $fator; $i++) {

                    // soma a quantidade de dias da condição de pagamento com a data da duplicata
                    $data_liquidez = date('Y-m-d', strtotime($data_liquidez. ' + '.$datas_condicao[$i] + 30 .'days')).'T00:00:00';


                    $response = HTTP::withHeaders([
                        'Token' => $this->api_key,
                        'Content-Type' => 'application/json'
                    ])->post($this->url . '/PedidoComissao', [
                        "pefa_pedi_id" => $request->ped_id,
                        "pefa_valor" => $valor_faturado * $i,
                        "pefa_valor_recebido" => $valor_total_produtos,
                        "pefa_data" => date('Y-m-d', strtotime($data_dup. '+ 30 days ')).'T00:00:00',
                        "pefa_data_agrupamento" => $data_fatura,
                        "pefa_nota_fiscal" => $numero_nf,
                        "pefa_status" => "NC"

                    ]);
                }
            }




        }
        return 'Dados atualizados com sucesso!';
    }

}
