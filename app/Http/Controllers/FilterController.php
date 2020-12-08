<?php

namespace App\Http\Controllers;

use App\Services\BusquedasQueryService;
use App\Services\HelperFormatData;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    protected $busquedasQueryService;
    protected $helperFormat;

    public function __construct(){
        $this->busquedasQueryService = new BusquedasQueryService();
        $this->helperFormat = new HelperFormatData();

    }



    public function filter(Request  $request){

        $search = $request->get("search");
        $empresa = $request->get("empresa");
        $categoria = $request->get("categoria");

        $orden = $request->get("orden");

        $request->session()->push("emp",$empresa);
        $empresa_filter = $request->session()->get("emp");
        $empresa_filter = array_unique($empresa_filter);

        if (is_null($orden) && is_null($request->session()->get('orden'))){

            $orden = "asc";
        }else{
            if (!is_null($orden)){

                $request->session()->put('orden',$orden);
            }
            $orden = $request->session()->get("orden");
        }


        if (is_null($search) or empty($search)){
            return view('base',compact("search"));
        }

        $result = $this->busquedasQueryService->getResult($search,$empresa_filter,$empresa,$orden,$categoria);
        $empresas = $this->busquedasQueryService->getEmpresas($categoria);
        if ($result->total() == 0){
//            dd($orden,$request->session()->get("orden"));
            $data = [
                'result'    => $result,
                'categoria' => $categoria,
                'filter'    => $empresa_filter,
                'search'    => $search,
                'orden'     => ($orden)?$orden:"",
                'empresas'  => $empresas
            ];
            return view('show.sinResultados', compact("data","search"));
//            $result = $this->busquedasQueryService->getBusqueda($search,$categoria,$orden);
        }


        $data = [
            'result'    => $result,
            'categoria' => $categoria,
            'filter'    => $empresa_filter,
            'search'    => $search,
            'orden'     => ($orden)?$orden:"",
            'empresas'  => $empresas
        ];
        return view('show.list', compact("data","search"));

    }

    public function filterPrice(Request $request){

    }

    public function removeFilter(Request $request){
        $search = $request->get("search");
        $empresa = $request->get("empresa");
        $categoria = $request->get("categoria");

        $empresa_filter = $request->session()->get("emp");

        if (!is_null($empresa_filter)){
            $empresa_filter = $this->helperFormat->formatEmpresaFilter($empresa_filter,$empresa);

            $request->session()->remove("emp");

            foreach ($empresa_filter as $clave => $valor){
                $request->session()->push("emp",$valor);
            }
        }else{
            $empresa_filter = [];
        }

        $result = $this->busquedasQueryService->getResult($search,$empresa_filter,$empresa,'asc',$categoria);

        if ($result->total() == 0){
            $result = $this->busquedasQueryService->getBusqueda($search,$categoria);
        }

        $empresas = $this->busquedasQueryService->getEmpresas($categoria);

        $data = [
            'result'    => $result,
            'categoria' => $categoria,
            'filter'    => $empresa_filter,
            'search'    => $search,
            'orden'     => '',
            'empresas'  => $empresas
        ];
        return view('show.list', compact("data","search"));
    }





}
