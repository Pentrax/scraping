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
            return view('base',compact("search"));
    }

//    /**
//     * The attributes that are mass assignable.
//     *
//     * @var array
//     */
    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }


    public function search(Request $request){

        $search = $request->input("search");

        $scraping = new ScrapingFactory();
        $result = $scraping->scraping($search);


        return view('show.list', compact('result',"search"))->with($search);

    }

    public function filter(Request  $request){

        $search = $request->get("search");
        $empresa = "Fravega";

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
