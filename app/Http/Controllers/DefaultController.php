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
use Symfony\Component\Console\Input\Input;

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

            $data['search'] = "";
            $data = [
                'search' => '',
                'categoria' => ''
            ];
            return view('base',compact("data"));
    }


    public function search(Request $request){
//        dd($request->all());
        $request->session()->remove("emp");
        $request->session()->remove("orden");
        $search = $request->input("search");
        $categoria = $request->radio;

        if (is_null($categoria)){
            $req = $request->all();
            $categoria = $req['categoria'];
        }

        $scraping = new ScrapingFactory();
        $result = $scraping->scraping($search,$categoria);
//        dd($result);
        $data = [
            'categoria'=> $categoria,
            'result' => $result,
            'search' => $search
        ];
//        dd($data,$search);
        return view('show.list', compact('data'));

    }



}
