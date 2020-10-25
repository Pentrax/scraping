<?php


namespace App\Services;


use Illuminate\Support\Facades\DB;

class BusquedasQueryService
{
    public function getResult($search,$empresa_filter,$empresa,$orden ="asc"){

        if ($orden && $orden == "menor"){
            $orden = "asc";
        }
        if ($orden && $orden == "mayor"){
            $orden = "desc";
        }

        $result = DB::table("Busquedas")
            ->where("busqueda",$search)
            ->whereIn("empresa",$empresa_filter)
//            ->where('categoria',$categoria)
            ->orderBy("precio",$orden)
            ->paginate(16)
            ->appends ( array (
                'search' => $search,
                "empresa" => $empresa
            ) );

        return $result;
    }


    public function getBusqueda($parameters,$categoria,$orden = "asc"){

        if ($orden && $orden == "menor"){
            $orden = "asc";
        }
        if ($orden && $orden == "mayor"){
            $orden = "desc";
        }
        $busqueda = DB::table("Busquedas")
            ->where("busqueda",$parameters)
            ->where("categoria",$categoria)
            ->orderBy("precio",$orden)
            ->paginate(16)
            ->appends ( array (
                'search' => $parameters,
                'categoria' => $categoria
            ) );

        return $busqueda;
    }
}
