<?php

namespace App\Http\Services\XmlService;

use Illuminate\Http\Request;
use App\Models\XML\XmlIde;
use App\Models\XML\XmlEmit;
use App\Models\XML\XmlDest;
use App\Models\XML\XmlDet;
use App\Models\XML\XmlTotal;
use App\Models\XML\XmlTransp;
use App\Models\XML\XmlCobr;
use App\Models\XML\XmlPag;


class XmlService
{
    public function xmlToArray(Request $request)
    {
        $xml = $request->file('xml');
        $xml = simplexml_load_file($xml);
        $json = json_encode($xml);
        $xmlArray = json_decode($json,true);

        session()->put('xmlArray', $xmlArray);

        // dd(session('xmlArray')['NFe']['infNFe']['ide']['dhEmi']);

        $this->saveXmlIde($xmlArray);
        $this->saveXmlEmit($xmlArray);
        $this->saveXmlDest($xmlArray);
        $this->saveXmlDet($xmlArray);
        $this->saveXmlTotal($xmlArray);
        $this->saveXmlTransp($xmlArray);
        $this->saveXmlCobr($xmlArray);
        $this->saveXmlPagl($xmlArray);

        $savedXmlIde = XmlIde::where('c_nf', intval($xmlArray['NFe']['infNFe']['ide']['cNF']))->first();
        $savedXmlEmit = XmlEmit::where('id_nf', $savedXmlIde->id)->first();
        $savedXmlDest = XmlDest::where('id_nf', $savedXmlIde->id)->first();
        $savedXmlDet = XmlDet::where('id_nf', $savedXmlIde->id)->get();
        $savedXmlTotal = XmlTotal::where('id_nf', $savedXmlIde->id)->first();
        $saveXmlTransp = XmlTransp::where('id_nf', $savedXmlIde->id)->first();
        $saveXmlCobr = XmlCobr::where('id_nf', $savedXmlIde->id)->get();
        $saveXmlPag = XmlPag::where('id_nf', $savedXmlIde->id)->get();


        $savedArray = ['savedXmlIde' => $savedXmlIde,
                       'savedXmlEmit' =>$savedXmlEmit,
                       'savedXmlDest' => $savedXmlDest,
                       'savedXmlDet' => $savedXmlDet,
                       'savedXmlTotal' => $savedXmlTotal,
                       'saveXmlTransp' => $saveXmlTransp,
                       'saveXmlCobr' => $saveXmlCobr,
                       'saveXmlPag' => $saveXmlPag

                      ];

        return $savedArray;

    }

    public function saveXmlIde($xmlArray)
    {
        // verifica se a nota fiscal já existe
        $xmlIde = XmlIde::firstOrCreate([
            'c_uf' => $xmlArray['NFe']['infNFe']['ide']['cUF'],
            'c_nf' => $xmlArray['NFe']['infNFe']['ide']['cNF'],
            'n_nf' => $xmlArray['NFe']['infNFe']['ide']['nNF']
        ]);

        return $xmlIde;

    }

    public function saveXmlEmit($xmlArray)
    {
        $xmlEmit = XmlEmit::firstOrCreate([
            'cnpj' => $xmlArray['NFe']['infNFe']['emit']['CNPJ'],
            'nome' => $xmlArray['NFe']['infNFe']['emit']['xNome'],
            'municipio' => $xmlArray['NFe']['infNFe']['emit']['enderEmit']['xMun'],
            'uf' => $xmlArray['NFe']['infNFe']['emit']['enderEmit']['UF'],
            'cep' => $xmlArray['NFe']['infNFe']['emit']['enderEmit']['CEP'],
            'c_pais' => $xmlArray['NFe']['infNFe']['emit']['enderEmit']['cPais'],
            'x_pais' => $xmlArray['NFe']['infNFe']['emit']['enderEmit']['xPais'],
            'insc_est' => $xmlArray['NFe']['infNFe']['emit']['IE'],
            'id_nf' => $this->saveXmlIde($xmlArray)->id
        ]);

        return $xmlEmit;
    }

    public function saveXmlDest($xmlArray)
    {
        $xmlDest = XmlDest::firstOrCreate([
            'cnpj' => $xmlArray['NFe']['infNFe']['dest']['CNPJ'],
            'nome' => $xmlArray['NFe']['infNFe']['dest']['xNome'],
            'logradouro' => $xmlArray['NFe']['infNFe']['dest']['enderDest']['xLgr'],
            'numero' => $xmlArray['NFe']['infNFe']['dest']['enderDest']['nro'],
            'bairro' => $xmlArray['NFe']['infNFe']['dest']['enderDest']['xBairro'],
            'municipio' => $xmlArray['NFe']['infNFe']['dest']['enderDest']['xMun'],
            'uf' => $xmlArray['NFe']['infNFe']['dest']['enderDest']['UF'],
            'cep' => $xmlArray['NFe']['infNFe']['dest']['enderDest']['CEP'],
            'indIEDest' => $xmlArray['NFe']['infNFe']['dest']['indIEDest'],
            'insc_est' => $xmlArray['NFe']['infNFe']['dest']['IE'],
            'id_nf' => $this->saveXmlIde($xmlArray)->id
        ]);

        return $xmlDest;
    }

    public function saveXmlDet($xmlArray)
    {
        $produto_det = $xmlArray['NFe']['infNFe']['det'];

        if(count($produto_det) > 3) {
            // mais de um produto;
            foreach($xmlArray['NFe']['infNFe']['det'] as $det) {

                $produtoNf = XmlDet::where('c_prod', $det['prod']['cProd'])
                                    ->where('id_nf', $this->saveXmlIde($xmlArray)->id)
                                    ->first();
                if(!$produtoNf) {

                    $xmlDet = XmlDet::firstOrCreate([
                        'c_prod' => $det['prod']['cProd'],
                        'produto' => $det['prod']['xProd'],
                        'u_comp' => $det['prod']['uCom'],
                        'q_comp' => $det['prod']['qCom'],
                        'v_un_comp' => $det['prod']['vUnCom'],
                        'v_prod' => $det['prod']['vProd'],
                        'u_trib' => $det['prod']['uTrib'],
                        'q_trib' => $det['prod']['qTrib'],
                        'v_un_trib' => $det['prod']['vUnTrib'],
                        // 'v_ipi' => $det['imposto']['IPI']['IPITrib']['vIPI'],
                        'id_nf' => $this->saveXmlIde($xmlArray)->id
                    ]);

                //     return $xmlDet;

                // } else {
                //     return $produtoNf;
                }

            }

        } else {
            // apenas um produto
            $produtoNf = XmlDet::where('c_prod', $produto_det['prod']['cProd'])
                                    ->where('id_nf', $this->saveXmlIde($xmlArray)->id)
                                    ->first();

                if(!$produtoNf)
                {

                    $xmlDet = XmlDet::firstOrCreate([
                        'c_prod' => $produto_det['prod']['cProd'],
                        'produto' => $produto_det['prod']['xProd'],
                        'u_comp' => $produto_det['prod']['uCom'],
                        'q_comp' => $produto_det['prod']['qCom'],
                        'v_un_comp' => $produto_det['prod']['vUnCom'],
                        'v_prod' => $produto_det['prod']['vProd'],
                        'u_trib' => $produto_det['prod']['uTrib'],
                        'q_trib' => $produto_det['prod']['qTrib'],
                        'v_un_trib' => $produto_det['prod']['vUnTrib'],
                        'v_ipi' => $produto_det['imposto']['IPI']['IPITrib']['vIPI'],
                        'id_nf' => $this->saveXmlIde($xmlArray)->id
                    ]);

                    return $xmlDet;

                } else {
                    return $produtoNf;
                }
        }



    }

    public function saveXmlTotal($xmlArray)
    {
        $xmlTotal = XmlTotal::firstOrCreate([
            'v_prod' => $xmlArray['NFe']['infNFe']['total']['ICMSTot']['vProd'],
            'v_ipi' => $xmlArray['NFe']['infNFe']['total']['ICMSTot']['vIPI'],
            'v_nf' => $xmlArray['NFe']['infNFe']['total']['ICMSTot']['vNF'],
            'id_nf' => $this->saveXmlIde($xmlArray)->id
        ]);

        return $xmlTotal;
    }

    public function saveXmlTransp($xmlArray)
    {
        $xmlTransp = XmlTransp::firstOrCreate([
            'nome' => $xmlArray['NFe']['infNFe']['transp']['transporta']['xNome'],
            'q_vol' => $xmlArray['NFe']['infNFe']['transp']['vol']['qVol'],
            'esp' => $xmlArray['NFe']['infNFe']['transp']['vol']['esp'],
            'peso_liq' => $xmlArray['NFe']['infNFe']['transp']['vol']['pesoL'],
            'peso_bru' => $xmlArray['NFe']['infNFe']['transp']['vol']['pesoB'],
            'id_nf' => $this->saveXmlIde($xmlArray)->id
        ]);
    }

    public function saveXmlCobr($xmlArray)
    {
        foreach($xmlArray['NFe']['infNFe']['cobr']['dup'] as $dup)
        {
            $xmlCobr = XmlCobr::firstOrCreate([
                'n_fat' => $xmlArray['NFe']['infNFe']['cobr']['fat']['nFat'],
                'v_orig' => $xmlArray['NFe']['infNFe']['cobr']['fat']['vOrig'],
                'v_liq' => $xmlArray['NFe']['infNFe']['cobr']['fat']['vLiq'],
                'd_venc' => $dup['dVenc'],
                'v_dup' => $dup['vDup'],
                'id_nf' => $this->saveXmlIde($xmlArray)->id
            ]);

        }

        return $xmlCobr;
    }

    public function saveXmlPagl($xmlArray)
    {
       $pagamento = $xmlArray['NFe']['infNFe']['pag']['detPag'];

        if(count($pagamento) > 3)
        {
            // mais de um pagamento
            foreach($pagamento as $detPag)
            {
                $xmlPagl = XmlPag::firstOrCreate([
                    'v_pag' => $detPag['vPag'],
                    'id_nf' => $this->saveXmlIde($xmlArray)->id
                ]);
            }

        } else{
            // apenas um pagamento
            $xmlPagl = XmlPag::firstOrCreate([
                'v_pag' => $pagamento['vPag'],
                'id_nf' => $this->saveXmlIde($xmlArray)->id
            ]);
        }

    }



}
