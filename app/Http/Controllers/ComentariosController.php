<?php

namespace App\Http\Controllers;

use App\Services\BusquedasQueryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\DeclareDeclare;

class ComentariosController extends Controller
{
    public function __construct(){
        $this->busquedasQueryService = new BusquedasQueryService();

    }

    public function getComentarios(Request $request){


        $product_id = $request->get("id_product");
        $categoria = $request->get("categoria");
        $results = DB::table("Busquedas as bu")
            ->join("Comentarios","bu.id","=","Comentarios.producto_id")
            ->join('empresa AS emp', 'bu.empresa_id', '=', 'emp.id')
            ->where("Comentarios.producto_id",$product_id)
            ->paginate(16)
            ;

        $data['search'] = $request->get("search");
        $data['categoria'] = $categoria;
        $data['producto_id'] =  $product_id;

        if ($results->total() == 0){

        $results = DB::table("Busquedas")
            ->where("id",$product_id)
            ->first();

            $comment = false;
            $valoracion = 0;
            $titulo = $results->titulo;
            $src = $results->src;
            $empresa = $results->empresa;
            $avg = 0;
        }else{

            $data['src'] = $results->items()[0]->src;
            $data['titulo'] = $results->items()[0]->titulo;
            $data['comment'] = true;
            $data['result'] =  $results;
            foreach ($results->items() as $result){

                $data[] = [
//                    'titulo'    => $result->titulo,
//                    'src'       => $result->src,
                    'empresa'   => $result->empresa,
//                    'result'    => $results,
//                    'search'    => $request->get("search"),
//                    'categoria' => $categoria,
                    'valoracion' => $result->valoracion,
                    'producto_id'   => $product_id,
//                    'avg'   => $this->valoracionAvg($result),
                    'empresas'  => $this->busquedasQueryService->getEmpresas($categoria)


                ];


            }
//            dd($data);
            $data['avg'] = $this->valoracionAvg($results);


        }


        return view('comentarios', compact("data"));


    }

    private function valoracionAvg($result){

        $avg = 0;
        foreach($result as $value){

            $avg = $avg + $value->valoracion;
        }


        $avg = (int)round($avg/count($result),0,PHP_ROUND_HALF_ODD);
        return $avg;

    }

}
