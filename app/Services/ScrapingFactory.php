<?php


namespace App\Services;


use Illuminate\Support\Facades\DB;

class ScrapingFactory
{

        public function __construct()
    {

        $this->garbarino = new ScrapingGarb();
        $this->fravega = new ScrapingFrav();

    }

    public function scraping($parametrs){

        // $garb = new ScrapingGarb();
          //  $this->garbarino->search($parametrs);
           // $this->fravega->search($parametrs);
       //  $garb->search($parametrs);

//         $frav = new ScrapingFrav();
//         $frav->search($parametrs);

        return $this->getBusqueda($parametrs);

    }


    private function getBusqueda($parameters){

        $busqueda = DB::table("Busquedas")
            ->where("busqueda",$parameters)
            ->orderBy("precio","asc")
            ->paginate(15)
            ->appends ( array (
                'search' => $parameters
            ) );
        //dd($busqueda);
        return $busqueda;
    }

}
