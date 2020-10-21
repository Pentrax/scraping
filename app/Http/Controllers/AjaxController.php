<?php

namespace App\Http\Controllers;

use App\Comentarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;

class AjaxController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        if(Auth::check()){

          $user_id = Auth::user()->id;
        }else{
            $user_id = null;
        }
        $data["user_id"] = $user_id;
        $data["valoracion"] = 3;
//        dd($data);
        $comentarios = new Comentarios();
        $comentarios->producto_id = $data['producto_id'];
        $comentarios->titulo = $data["titulo"];
        $comentarios->comentario = $data["comentario"];
        $comentarios->user_id = $user_id;
        $comentarios->valoracion = $data["valoracion"];
//        $comentarios->fillable($data);
        $comentarios->save();

        return response()->json(['success'=>'Ajax request submitted successfully']);
    }
}
