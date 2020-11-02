<?php


namespace App\Services;


use App\Busquedas;
use Illuminate\Support\Facades\DB;

class BusquedasQueryService
{
    protected $busqueda;

    public function __construct($param = "")
    {
        $this->busqueda = $param;


    }

    public function getResult($search,$empresa_filter,$empresa,$orden ="asc",$categoria){

        if ($orden && $orden == "menor"){
            $orden = "asc";
        }
        if ($orden && $orden == "mayor"){
            $orden = "desc";
        }

        $result = DB::table("Busquedas AS bu")
            ->join('categoria AS cat', 'bu.categoria_id', '=', 'cat.id')
            ->join('empresa AS emp', 'bu.empresa_id', '=', 'emp.id')
            ->where("bu.busqueda",$search)
            ->whereIn("emp.empresa",$empresa_filter)
//            ->where('categoria',$categoria)
            ->orderBy("bu.precio",$orden)
            ->paginate(16)
            ->appends ( array (
                'search' => $search,
                "empresa" => $empresa,
                'categoria' => $categoria
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
        $busqueda = DB::table("Busquedas AS bu")
            ->join('categoria AS cat', 'bu.categoria_id', '=', 'cat.id')
            ->join('empresa AS emp', 'bu.empresa_id', '=', 'emp.id')
            ->where("bu.busqueda",$parameters)
            ->where("cat.categoria",$categoria)
            ->orderBy("bu.precio",$orden)
            ->paginate(16)
            ->appends ( array (
                'search' => $parameters,
                'categoria' => $categoria
            ) );

        return $busqueda;
    }

    public function getEmpresas($categoria){

        return DB::table("empresa")->where("categoria",$categoria)->get();

    }

    public function saveBusquedaLive($precio,$contenido,$titulo,$src,$href,$empresa_id,$busqueda){

        $busqueda = new Busquedas();

        $busqueda->precio = $precio;
        $busqueda->contenido = $contenido;
        $busqueda->titulo = $titulo;
        $busqueda->src = $src;
        $busqueda->href = $href;
        $busqueda->empresa_id = $empresa_id;
        $busqueda->busqueda =  $this->busqueda;
        $busqueda->categoria_id = 1;

        $busqueda->save();
    }

    public function getBusquedaReciente($parameters,$empresa_id){

        $busqueda = DB::table("Busquedas AS bu")
            ->join('categoria AS cat', 'bu.categoria_id', '=', 'cat.id')
            ->join('empresa AS emp', 'bu.empresa_id', '=', 'emp.id')
            ->where("bu.busqueda",$parameters)
            ->where("bu.empresa_id",$empresa_id)
            ->orderBy("precio","asc")
            ->paginate(5)
            ->appends ( array (
                'search' => $parameters
            ) );
        return $busqueda;
    }

    public function saveBusqueda($data,$parameters){

        foreach ($data as $info){

            foreach ($info as $item){

                $busqueda = new Busquedas();

                $busqueda->precio = $item["precio"];
                $busqueda->contenido = $item["contenido"];
                $busqueda->titulo = $item["titulo"];
                $busqueda->src = $item["src"];
                $busqueda->href = $item["href"];
                $busqueda->brand = $item["brand"];
                $busqueda->empresa = $item["empresa"];
                $busqueda->busqueda = strtolower($parameters);
                $busqueda->cantidad_busquedas = 1;

                $busqueda->save();
            }
        }

    }

    public function getFavoritos($user_id){

        $fav = DB::table('favoritos AS fv')
            ->join('Busquedas AS bu', 'fv.busqueda_id', '=', 'bu.id')
            ->where('fv.usuario_id',$user_id)
            ->paginate(5)
            ->appends ( array (
                'search' => $user_id
            ) );

        return $fav;
    }

}
