<?php

namespace App\Http\Controllers\Pedido;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\PedidoService\PedidoService;
use App\Http\Services\XmlService\XmlService;

class PedidoController extends Controller
{
    private $pedidoService;

    public function __construct(PedidoService $pedidoService) {
        $this->pedidoService = $pedidoService;
    }


    public function importaDados(Request $request) {

        $pedido_sv = $this->pedidoService->getpedido($request->pedido_sv);

        $fornecedor = $pedido_sv['nome_fornecedor'];
        $cliente = $pedido_sv['nome_cliente'];
        $produtos = $pedido_sv['produtos'];

        $pedido_sv = json_decode(json_encode($pedido_sv['response']));

        $xmlService = new XmlService();
        $savedArray = $xmlService->xmlToArray($request);

        $savedXmlIde = $savedArray['savedXmlIde'];
        $savedXmlEmit = $savedArray['savedXmlEmit'];
        $savedXmlDest = $savedArray['savedXmlDest'];
        $savedXmlDet = $savedArray['savedXmlDet'];
        $savedXmlTotal = $savedArray['savedXmlTotal'];
        $saveXmlTransp = $savedArray['saveXmlTransp'];
        $saveXmlCobr = $savedArray['saveXmlCobr'];
        $saveXmlPag = $savedArray['saveXmlPag'];


        return view('xml.importa_dados', compact('pedido_sv', 'produtos', 'fornecedor', 'cliente', 'savedXmlIde', 'savedXmlEmit', 'savedXmlDest', 'savedXmlDet',
                    'savedXmlTotal', 'saveXmlTransp', 'saveXmlCobr', 'saveXmlPag'));
    }


    public function getPedido(Request $request) {
        $pedido = $request->pedido;

        $response = $this->pedidoService->getPedido($pedido);

        return response()->json($response);
    }


    public function atualizaDados(Request $request) {

        $pedido_cliente = $this->pedidoService->atualizaPedCliente($request);

        $itens = $this->pedidoService->atualizaProdutos($request);

        $duplicatas = $this->pedidoService->atualizaPedComissao($request);


        return response(['message' => 'Dados atualizados com sucesso!']);
    }


}
