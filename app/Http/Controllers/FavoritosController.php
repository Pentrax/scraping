<?php

namespace App\Http\Controllers;

use App\Favoritos;
use App\Services\BusquedasQueryService;
use Illuminate\Http\Request;

class FavoritosController extends Controller
{
    protected $queryService;

    public function __construct()
    {
        $this->queryService = new BusquedasQueryService();

    }

    public function addFavorito(Request $request){


        $fav = new Favoritos();
        $fav->busqueda_id = $request->get('id');
        $fav->usuario_id = $request->get('user');
        $fav->save();

          return response()->json(['success'=>'Ajax request submitted successfully']);

    }

    public function showFavorito(Request $request){
        $req = $request->all();
        $categoria = $req['categoria'];
        $search = $req['search'];
        $user_id = $req['user_id'];

        $fav = $this->queryService->getFavoritos($user_id);

        $data = [
            'categoria' => $categoria,
            'result'    => $fav,
            'search'    => $search
        ];

        return view('show.favoritos', compact('data'));

    }

    public function delete(Request $request){

        $user_id = $request->get('user');
        $id = $request->get('id');

         Favoritos::where('busqueda_id',$id)->where('usuario_id',$user_id)->delete();

        return response()->json(['success'=>'Ajax request submitted successfully']);

    }

}
