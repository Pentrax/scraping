<?php


namespace App\Services;

use App\Busquedas;
use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Support\Facades\DB;
use Symfony\Component\DomCrawler\Crawler;

const CANTIDAD_DE_ELEMENTOS_POR_PAGINA = 48;
const EMPRESA = "Garbarino";

class ScrapingGarb extends BaseScraping
{
    public function search($parameters){

        $data = array();

        $busqueda = DB::table("Busquedas")->where("busqueda",$parameters)->orderBy("precio","desc")->get();

        if ($busqueda->count() > 0){
            return  $busqueda;
        }

//        dd($busqueda->count());

//        foreach ($busqueda as $x){
//           $x->cantidad_busquedas = $x->cantidad_busquedas +1;
//
//        }
//        die();
//        dd($busqueda);


        $parameters = $this->formatParameters($parameters);

        $url = "https://www.garbarino.com/q/{$parameters}/srch?q={$parameters}";

        $crawler = $this->goutteClient->request('GET',$url);

        $pages = $this->getCantidadDePaginas($crawler);

        $data = $this->getContenido($pages,$parameters,$busqueda);

        return $data;
    }

    private function formatParameters($parameters){
        $string="";
        $format =  preg_split('/\s+/', $parameters);
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

    private function getCantidadDePaginas(Crawler $crawler){

        $elements =$crawler->filter(".breadcrumb-content")->each(function (Crawler $node) {
                    $offset = str_replace("(","",$node->filter("span")->html());
                    $offset = str_replace(")","",$offset);
                    $offset = str_replace(" resultados","",$offset);
                    $offset = intval($offset);
                    return $offset;
                });

        $pages = (int) ceil(intval($elements[0]) / CANTIDAD_DE_ELEMENTOS_POR_PAGINA);

         return $pages;

    }


    private function getContenido($pages,$parameters,$busqueda){

        $data = [];

        for ($i=1;$i <= $pages;$i++){
            $uri = "https://www.garbarino.com/q/{$parameters}/srch?page={$i}&q";

            $crawler = $this->goutteClient->request('GET',$uri);
            $data[$i] = $crawler->filter('.itemBox')->each(function ( $node) {

                $div_item = $node->filter('.itemBox--carousel');
                $src = $div_item->filter('img')->attr('src');
                $href = "https://www.garbarino.com/".$div_item->filter('a')->attr('href');
                $price = $node->filter(".value-item");
                $price = str_replace("$","",$price->text());
                $price = floatval($price);
                $title = $node->filter(".itemBox--title");

                //  dd($node->text(),$href,$src,$div_item->html(),$price->html(),$title->html(),$node->html());

                return [
                    'precio' => number_format($price,2),
                    'contenido'=> preg_replace('/\W\w+\s*(\W*)$/', '$1',  $node->text()),
                    "titulo" => $title->text(),
                    'src' => $src,
                    'href' => $href,
                    'brand' => '//dj4i04i24axgu.cloudfront.net/normi/statics/0.2.120/garbarino/images/logo-garbarino.svg',
                    'empresa' => EMPRESA
                ];
            });
        }
        //dd(if()$busqueda);
        if($busqueda->count() == 0){

            $this->saveBusqueda($data,$parameters);
        }

        return $data;
    }


    public function saveBusqueda($data,$parameters){

        foreach ($data as $info){

            foreach ($info as $item){

                $busqueda = new Busquedas();

                $busqueda->precio = $item["precio"];
                $busqueda->contenido = $item["contenido"];
                $busqueda->titulo = $item["titulo"];
                $busqueda->src = $item["src"];
                $busqueda->href = $item["href"];
                $busqueda->brand = $item["brand"];
                $busqueda->empresa = $item["empresa"];
                $busqueda->busqueda = $parameters;
                $busqueda->cantidad_busquedas = 1;

                $busqueda->save();
            }
        }

    }

}
