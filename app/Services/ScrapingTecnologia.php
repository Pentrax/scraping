<?php


namespace App\Services;


use Illuminate\Support\Facades\DB;

class ScrapingTecnologia
{

        public function __construct()
    {

        $this->garbarino = new ScrapingGarb();
        $this->fravega = new ScrapingFrav();
        $this->mercado = new ScrapingMercado();

    }

    public function scraping($parametrs,$categoria){

            $this->mercado->search($parametrs,$categoria);
            $this->garbarino->search($parametrs,$categoria);
            $this->fravega->search($parametrs);

        return $this->getBusqueda($parametrs);

    }


    private function getBusqueda($parameters){

        $busqueda = DB::table("Busquedas")
            ->where("busqueda",$parameters)
            ->orderBy("precio","asc")
            ->paginate(16)
            ->appends ( array (
                'search' => $parameters
            ) );

        return $busqueda;
    }

}
