<?php


namespace App\Services;


use Illuminate\Support\Facades\DB;

class ScrapingFactory
{

    public function scraping($parametrs){

         $garb = new ScrapingGarb();

         $garb->search($parametrs);

         $frav = new ScrapingFrav();
         $frav->search($parametrs);

        return $this->getBusqueda($parametrs);

    }


    private function getBusqueda($parameters){

        $busqueda = DB::table("Busquedas")
            ->where("busqueda",$parameters)
            ->orderBy("precio","asc")
            ->paginate(5)
            ->appends ( array (
                'search' => $parameters
            ) );

        return $busqueda;
    }

}
