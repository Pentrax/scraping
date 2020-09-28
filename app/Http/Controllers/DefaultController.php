<?php

namespace App\Http\Controllers;

use App\Services\ScrapingFactory;
use App\Services\ScrapingFrav;
use Illuminate\Http\Request;
use App\Services\ScrapingGarb;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class DefaultController extends Controller
{
    protected $data_search;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    function index(Request $request){
            $search = "";
//            dd($search);
            return view('base',compact("search"));
    }


    public function search(Request $request){

        $search = $request->input("search");
        $categoria = $request->radio;
        $scraping = new ScrapingFactory();
        $result = $scraping->scraping($search,$categoria);


        return view('show.list', compact('result',"search"))->with($search);

    }

    public function filter(Request  $request){

        $search = $request->get("search");
        $empresa = $request->get("empresa");


        if (is_null($search) or empty($search)){
            return view('base',compact("search"));
        }

        $result = DB::table("Busquedas")
            ->where("busqueda",$search)
            ->where("empresa",$empresa)
            ->orderBy("precio","asc")
            ->paginate(16)
            ->appends ( array (
                'search' => $search,
                "empresa" => $empresa
            ) );


         return view('show.list', compact("result","search"));

    }

}
