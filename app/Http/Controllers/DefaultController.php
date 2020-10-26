<?php

namespace App\Http\Controllers;

use App\Services\BusquedasQueryService;
use App\Services\ScrapingFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DefaultController extends Controller
{
    protected $data_search;

    public function __construct(){
        $this->busquedasQueryService = new BusquedasQueryService();

    }

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
                'categoria' => '',
                'empresas' => ''
            ];
            return view('base',compact("data"));
    }


    public function search(Request $request){


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
        $empresas = $this->busquedasQueryService->getEmpresas($categoria);

        $data = [
            'categoria' => $categoria,
            'result'    => $result,
            'search'    => $search,
            'empresas'  => $empresas
        ];

        return view('show.list', compact('data'));

    }



}
