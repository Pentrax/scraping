<?php

namespace App\Http\Controllers;

use App\Services\ScrapingFactory;
use App\Services\ScrapingFrav;
use Illuminate\Http\Request;
use App\Services\ScrapingGarb;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

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
       // dd($request);
      //  $scrap = new ScrapingGarb();
        //$scrap_2 = new ScrapingFrav();
        $search = $request->input("search");

        $scraping = new ScrapingFactory();
        $paginate = $scraping->scraping($search);

        //$paginate = $scrap_2->search($search);

      //  $paginate = $scrap->search($search);


        return view('show.list', compact('paginate',"search"))->with($search);

    }

}
