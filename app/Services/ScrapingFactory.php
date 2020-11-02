<?php


namespace App\Services;


use Illuminate\Support\Facades\DB;

class ScrapingFactory
{


    public function scraping($parametrs,$categoria){


            switch ($categoria){
                case "tecnologia":
                    $tecnologia = new ScrapingTecnologia($parametrs);
                    return $tecnologia->scraping($parametrs,$categoria);
                    break;
                default:
                    return false;
            }

    }



}
