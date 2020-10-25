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

        $this->fravega->search($parametrs);
        $this->garbarino->search($parametrs,$categoria);
        $this->mercado->search($parametrs,$categoria);

        return $this->getBusqueda($parametrs,$categoria);

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
