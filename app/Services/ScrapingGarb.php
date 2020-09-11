<?php


namespace App\Services;

use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;

class ScrapingGarb extends BaseScraping
{
    public function search($parameters){

        $data = array();

        $parameters = $this->formatParametes($parameters);

        $url = "https://www.garbarino.com/q/{$parameters}/srch?q={$parameters}";
        $crawler = $this->goutteClient->request('GET',$url);
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
                'href' => $href,
                'brand' => '//dj4i04i24axgu.cloudfront.net/normi/statics/0.2.120/garbarino/images/logo-garbarino.svg'
            ];
        });

        return $data;
    }

    private function formatParametes($parameters){
        $string="";
        $format = $data   = preg_split('/\s+/', $parameters);
        $count = count($format);

        for ($i=0;$i <= $count-1;$i++){
            if (isset($format[$i+1])){
                $string .= $format[$i]."+";
            }else{
                $string .=$format[$i];
            }
        }
        return $string;
    }

}
