<?php


namespace App\Services;

use App\Busquedas;
use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\True_;
use PhpParser\Node\Stmt\DeclareDeclare;
use Symfony\Component\DomCrawler\Crawler;

const CANTIDAD_DE_ELEMENTOS_POR_PAGINA_MERCADO = 50;
const EMPRESA_MERCADO= 3;

class ScrapingMercado extends BaseScraping
{

    protected $param;
    protected $busquedasQueryService;

    public function __construct($param)
    {
        parent::__construct();
        $this->param = $param;
        $this->busquedasQueryService = new BusquedasQueryService($param);

    }

    public function search($parameters,$categoria){

        $parametros_sin_formatear = strtolower($parameters);
        $busqueda = $this->busquedasQueryService->getBusquedaReciente(strtolower($parameters),EMPRESA_MERCADO);

        if ($busqueda->count() > 0){
            return  true;
        }


        $pre = $this->formatPreParameters($parameters);
        $parameters = $this->formatParameters($parameters);

        $url = "https://listado.mercadolibre.com.ar/{$pre}#D[A:{$parameters}]";

        $crawler = $this->goutteClient->request('GET',$url);

        $pages = $this->getCantidadDePaginas($crawler);

         $this->getContenido($pages,$pre,$parametros_sin_formatear,$categoria);

        return $this->busquedasQueryService->getBusquedaReciente($parameters,EMPRESA_MERCADO);
    }

    private function formatParameters($parameters){
        $string="";
        $format =  preg_split('/\s+/', $parameters);
        $count = count($format);

        for ($i=0;$i <= $count-1;$i++){
            if (isset($format[$i+1])){
                $string .= $format[$i]."%";
            }else{
                $string .=$format[$i];
            }
        }
        return $string;
    }

    private function formatPreParameters($parameters){
        $string="";
        $format =  preg_split('/\s+/', $parameters);
        $count = count($format);

        for ($i=0;$i <= $count-1;$i++){
            if (isset($format[$i+1])){
                $string .= $format[$i]."-";
            }else{
                $string .=$format[$i];
            }
        }
        return $string;
    }

    private function getCantidadDePaginas(Crawler $crawler){

        $elements =$crawler->filter(".ui-search-search-result__quantity-results")->each(function (Crawler $node) {

                    $offset = str_replace("resultados","",$node->text());
                    $offset = str_replace(".","",$offset);
                    $offset = intval($offset);
                    return $offset;
                });
         if (isset($elements[0])){

             $pages = (int) ceil(intval($elements[0]) / CANTIDAD_DE_ELEMENTOS_POR_PAGINA);
         }else{
             $pages = 0;
         }

         return $pages;

    }


    private function getContenido($pages,$parameters,$parametros_sin_formatear,$categoria){

        $data = [];
         $desde = 1;

        for ($i=0;$i <= 2;$i++){
            $uri = "https://listado.mercadolibre.com.ar/{$parameters}_Desde_{$desde}";
            $desde = $desde + 50;

            $crawler = $this->goutteClient->request('GET',$uri);

                $data[$i] = $crawler->filter('.ui-search-layout__item')->each(function (Crawler $node) {

                        $div_item = $node->filter('.ui-search-result__image');

                        $src = $node->filter('.slick-slide');
                        $src = $src->filter("img")->attr("data-src");
                        $href = $div_item->filter("a")->attr("href");
                        $price = $node->filter(".price-tag-fraction")->html();
                        $price = str_replace(".","",$price);

                        $contenido = $node->filter(".ui-search-item__title")->text();
                        $title = $node->filter(".ui-search-item__title")->text();
                        $marca = null;

                    $brand = 'https://http2.mlstatic.com/frontend-assets/ui-navigation/5.10.2/mercadolibre/logo__large_plus.png';
                    $this->busquedasQueryService->saveBusquedaLive(intval($price),$contenido,$title,$src,$href,EMPRESA_MERCADO,$this->param);
//                    $this->saveBusquedaLive(intval($price),$contenido,$title,$src,$href,$brand,EMPRESA_MERCADO,$this->param);

                        return [
                            'precio'    =>intval($price),
                            'contenido' => $contenido,
                            "titulo"    => $title,
                            'src'       => $src,
                            'href'      => $href,
                            'brand'     => 'https://http2.mlstatic.com/frontend-assets/ui-navigation/5.10.2/mercadolibre/logo__large_plus.png',
                            'empresa'   => "Mercado Libre",
                            'marca'     => $marca
                        ];
            });

        }




//       $this->saveBusqueda($data,$parametros_sin_formatear,$categoria);

        return true;
    }

//    public function saveBusquedaLive($precio,$contenido,$titulo,$src,$href,$brand,$empresa,$busqueda){
//
//        $busqueda = new Busquedas();
//
//        $busqueda->precio = $precio;
//        $busqueda->contenido = $contenido;
//        $busqueda->titulo = $titulo;
//        $busqueda->src = $src;
//        $busqueda->href = $href;
//        $busqueda->brand = $brand;
//        $busqueda->empresa = $empresa;
//        $busqueda->busqueda = $this->param;
//        $busqueda->cantidad_busquedas = 1;
//        $busqueda->categoria = "tecnologia";
//        $busqueda->save();
//
//
//    }


//    public function saveBusqueda($data,$parameters,$categoria){
//
//        foreach ($data as $info){
//
//            foreach ($info as $item){
//
//                $busqueda = new Busquedas();
//
//                $busqueda->precio = $item["precio"];
//                $busqueda->contenido = $item["contenido"];
//                $busqueda->titulo = $item["titulo"];
//                $busqueda->src = $item["src"];
//                $busqueda->href = $item["href"];
//                $busqueda->brand = $item["brand"];
//                $busqueda->empresa = $item["empresa"];
//                $busqueda->busqueda = strtolower($parameters);
//                $busqueda->cantidad_busquedas = 1;
//                $busqueda->categoria = $categoria;
//                $busqueda->marca = $item["marca"];
//
//                $busqueda->save();
//            }
//        }
//
//    }

//    public function getBusquedaReciente($parameters,$empresa_id){
//
//        $busqueda = DB::table("Busquedas AS bu")
//            ->join('categoria AS cat', 'bu.categoria_id', '=', 'cat.id')
//            ->join('empresa AS emp', 'bu.empresa_id', '=', 'emp.id')
//            ->where("bu.busqueda",$parameters)
//            ->where("bu.empresa_id",$empresa_id)
//            ->orderBy("precio","asc")
//            ->paginate(5)
//            ->appends ( array (
//                'search' => $parameters
//            ) );
//        return $busqueda;
//    }

}
