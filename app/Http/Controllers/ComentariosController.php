<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\DeclareDeclare;

class ComentariosController extends Controller
{
    public function getComentarios(Request $request){


        $product_id = $request->get("id_product");
        $categoria = $request->get("categoria");
        $result = DB::table("Busquedas")
            ->join("Comentarios","Busquedas.id","=","Comentarios.producto_id")
            ->where("Comentarios.producto_id",$product_id)
            ->paginate(16)
            ;

        if ($result->total() == 0){

        $result = DB::table("Busquedas")
            ->where("id",$product_id)
            ->first();

            $comment = false;
            $valoracion = 0;
            $titulo = $result->titulo;
            $src = $result->src;
            $empresa = $result->empresa;
            $avg = 0;
        }else{

            $comment = true;
            $valoracion = $result->items()[0]->valoracion;
            $titulo = $result->items()[0]->titulo;
            $src = $result->items()[0]->src;
            $empresa = $result->items()[0]->empresa;

            $avg = $this->valoracionAvg($result->items());

        }

        $empresas = $this->busquedasQueryService->getEmpresas($categoria);

        $data = [
            'titulo'    => $titulo,
            'src'       => $src,
            'empresa'   => $empresa,
            'result'    => $result,
            'search'    => $request->get("search"),
            'categoria' => $categoria,
            'valoracion' => $valoracion,
            'comment'       => $comment,
            'producto_id'   => $product_id,
            'avg'   => $avg,
            'empresas'  => $empresas


        ];


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
