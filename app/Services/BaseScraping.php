<?php


namespace App\Services;

use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;

class BaseScraping
{
    protected $goutteClient;
    protected $guzzleClient;

    public function __construct()
    {
        $this->goutteClient = new Client();
        $this->guzzleClient = $guzzleClient = new GuzzleClient(
            array(
                'timeout' => 60,
                'verify' => false,
                'cookies' => true,
                'headers' =>  [
                    'Accept'          => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
                    'Accept-Encoding' => 'zip, deflate, sdch',
                    'Accept-Language' => 'en-US,en;q=0.8',
                    'Cache-Control'   => 'max-age=0',
                    'User-Agent'      => 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:47.0)'
                ]
            )
        );
        $this->goutteClient->setClient($guzzleClient);
    }

//    public function search($parameters){
//        $goutteClient = new Client();
//        $guzzleClient = new GuzzleClient(
//            array(
//                'timeout' => 60,
//                'verify' => false,
//                'cookies' => true,
//                'headers' =>  [
//                    'Accept'          => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
//                    'Accept-Encoding' => 'zip, deflate, sdch',
//                    'Accept-Language' => 'en-US,en;q=0.8',
//                    'Cache-Control'   => 'max-age=0',
//                    'User-Agent'      => 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:47.0)'
//                ]
//            )
//        );
//
//        $data = array();
//
//        $goutteClient->setClient($guzzleClient);
//
//        $parameters = $this->formatParametes($parameters);
//
//        $url = "https://www.garbarino.com/q/{$parameters}/srch?q={$parameters}";
//        $crawler = $goutteClient->request('GET',$url);
//        $data = $crawler->filter('.itemBox')->each(function ( $node) {
//
//            $div_item = $node->filter('.itemBox--carousel');
//            //$img = $div_item->filter('img')->attr('src');
//            $src = $div_item->filter('img')->attr('src');
//            $href = "https://www.garbarino.com/".$div_item->filter('a')->attr('href');
//            $price = $node->filter(".value-item");
//            $title = $node->filter(".itemBox--title");
//
//        // dd($node->text(),$href,$src,$div_item->html(),$price->html(),$title->html(),$node->html());
//
//            return [
//                'price' => $price->text(),
//                'content'=> preg_replace('/\W\w+\s*(\W*)$/', '$1',  $node->text()),
//                "title" => $title->text(),
//                'src' => $src,
//                'href' => $href,
//                'brand' => '//dj4i04i24axgu.cloudfront.net/normi/statics/0.2.120/garbarino/images/logo-garbarino.svg'
//            ];
//        });
//
//        return $data;
//    }



}
