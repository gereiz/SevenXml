<?php

namespace App\Http\Controllers\Xml;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Services\XmlService\XmlService;

class XmlController extends Controller
{

    //retorna pagina index
    public function index()
    {
        return view('xml.index');
    } 


    // recebe o xml, e converte para array
    public function xmlToArray(Request $request)
    {
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

        // dd($saveXmlCobr);

        return view('xml.xml', compact('savedXmlIde', 'savedXmlEmit', 'savedXmlDest', 'savedXmlDet',
                                       'savedXmlTotal', 'saveXmlTransp', 'saveXmlCobr', 'saveXmlPag'
                                    ));
    }


}
