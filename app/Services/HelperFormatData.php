<?php


namespace App\Services;


class HelperFormatData
{

    public function formatEmpresaFilter($empresa_filter,$empresa){

        foreach ($empresa_filter as $clave => $valor){

            if ($valor == $empresa){
                unset($empresa_filter[$clave]);
            }
        }
        return $empresa_filter;
    }
}
