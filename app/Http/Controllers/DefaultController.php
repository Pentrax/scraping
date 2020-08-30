<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;
class DefaultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    function index(){

        $goutteClient = new Client();
        $guzzleClient = new GuzzleClient(
            array(
                'timeout' => 60,
                'verify' => false,
            )
        );

        $data = array();

        $goutteClient->setClient($guzzleClient);

        $crawler = $goutteClient->request('GET','https://www.garbarino.com/q/tv+4k/srch?q=tv+4k');

        $data = $crawler->filter('.itemBox')->each(function ( $node) {

            $div_item = $node->filter('.itemBox--carousel');
            //$img = $div_item->filter('img')->attr('src');
            $src = $div_item->filter('img')->attr('src');
            $href = "https://www.garbarino.com/".$div_item->filter('a')->attr('href');
            $price = $node->filter(".value-item");
            $title = $node->filter(".itemBox--title");

            // dd($node->text(),$href,$src,$div_item->html(),$price->html(),$title->html(),$node->html());

            return [
                'price' => $price->text(),
                'content'=> preg_replace('/\W\w+\s*(\W*)$/', '$1',  $node->text()),
                "title" => $title->text(),
                'src' => $src,
                'href' => $href
            ];
        });

        return view('show.garbarino_list', compact('data'));
    }
}
