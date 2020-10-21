<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilterController extends Controller
{

    public function filter(Request  $request){

        $search = $request->get("search");
        $empresa = $request->get("empresa");
        $categoria = $request->get("categoria");

        $request->session()->push("emp",$empresa);
        $empresa_filter = $request->session()->get("emp");
        $empresa_filter = array_unique($empresa_filter);


//        dd($empresa_filter);
//        $request->session()->remove("Fravega");
//        $request->session()->remove("Garbarino");
//        $request->session()->remove("Mercado Libre");
//        dd($request->session()->all());
        if (is_null($search) or empty($search)){
            return view('base',compact("search"));
        }

        $result = $this->getResult($search,$empresa_filter,$empresa);

        $data = [
            'result'    => $result,
            'categoria' => $categoria,
            'filter'    => $empresa_filter,
            'search'    => $search
        ];
        return view('show.list', compact("data","search"));

    }

    public function removeFilter(Request $request){
        $search = $request->get("search");
        $empresa = $request->get("empresa");
        $categoria = $request->get("categoria");

        $empresa_filter = $request->session()->get("emp");

        foreach ($empresa_filter as $clave => $valor){

            if ($valor == $empresa){
                unset($empresa_filter[$clave]);
            }
        }

        $request->session()->remove("emp");

        foreach ($empresa_filter as $clave => $valor){
            $request->session()->push("emp",$valor);
        }

        $result = $this->getResult($search,$empresa_filter,$empresa);
        if ($result->total() == 0){
            $result = $this->getBusqueda($search,$categoria);
        }

        $data = [
            'result'    => $result,
            'categoria' => $categoria,
            'filter'    => $empresa_filter,
            'search'    => $search
        ];
        return view('show.list', compact("data","search"));
    }


    private function getResult($search,$empresa_filter,$empresa){

        $result = DB::table("Busquedas")
            ->where("busqueda",$search)
            ->whereIn("empresa",$empresa_filter)
//            ->where('categoria',$categoria)
            ->orderBy("precio","asc")
            ->paginate(16)
            ->appends ( array (
                'search' => $search,
                "empresa" => $empresa
            ) );

        return $result;
    }


    private function getBusqueda($parameters,$categoria){

        $busqueda = DB::table("Busquedas")
            ->where("busqueda",$parameters)
            ->where("categoria",$categoria)
            ->orderBy("precio","asc")
            ->paginate(16)
            ->appends ( array (
                'search' => $parameters,
                'categoria' => $categoria
            ) );

        return $busqueda;
    }


}
