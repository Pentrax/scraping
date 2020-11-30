<?php


namespace App\Services;


use Illuminate\Support\Facades\DB;

class ScrapingTecnologia
{

        public function __construct($parameter)
    {

        $this->garbarino = new ScrapingGarb($parameter);
        $this->fravega = new ScrapingFrav($parameter);
        $this->mercado = new ScrapingMercado($parameter);
//        $this->musimundo = new ScrapingMusimundo($parameter);

    }

    public function scraping($parametrs,$categoria){
//         $this->musimundo->search($parametrs);
        $this->fravega->search($parametrs);
        $this->garbarino->search($parametrs,$categoria);
        $this->mercado->search($parametrs,$categoria);

        return $this->getBusqueda($parametrs,$categoria);

    }


    private function getBusqueda($parameters,$categoria){

        $busqueda = DB::table("Busquedas AS bu")
//            ->select([
//                'bu.id',
//                'bu.precio',
//                'bu.contenido',
//                'bu.href',
//                'bu.src',
//                'bu.titulo',
//                'bu.busqueda',
//                'bu.user_id',
//                'cat.id',
//                'cat.categoria',
//
//
//            ])
            ->join('categoria AS cat', 'bu.categoria_id', '=', 'cat.id')
            ->join('empresa AS emp', 'bu.empresa_id', '=', 'emp.id')
            ->leftJoin('favoritos AS fav','bu.id','=','fav.busqueda_id')
            ->where("bu.busqueda",$parameters)
            ->where("cat.categoria",$categoria)
            ->select('*','bu.id as bu_id','fav.busqueda_id as fav_bu')
            ->orderBy("precio","asc")
            ->paginate(16)
            ->appends ( array (
                'search' => $parameters,
                'categoria' => $categoria
            ) );

        return $busqueda;
    }

}
