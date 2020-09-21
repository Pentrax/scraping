<?php


namespace App\Services;


use Illuminate\Support\Facades\DB;

class ScrapingFactory
{

    public function __construct(){

        $this->tecnologia = new ScrapingTecnologia();

    }

    public function scraping($parametrs,$categoria){


            switch ($categoria){
                case "tecnologia":

                    return $this->tecnologia->scraping($parametrs,$categoria);
                    break;
                default:
                    return false;
            }

//            $this->garbarino->search($parametrs,$categoria);
//            $this->fravega->search($parametrs);
//
//        return $this->getBusqueda($parametrs);

    }


//    private function getBusqueda($parameters){
//
//        $busqueda = DB::table("Busquedas")
//            ->where("busqueda",$parameters)
//            ->orderBy("precio","asc")
//            ->paginate(16)
//            ->appends ( array (
//                'search' => $parameters
//            ) );
//        //dd($busqueda);
//        return $busqueda;
//    }

}
