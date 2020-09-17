<?php


namespace App\Services;

use App\Busquedas;
use Illuminate\Support\Facades\DB;
use Symfony\Component\DomCrawler\Crawler;

const CANTIDAD_DE_ELEMENTOS_POR_PAGINA_F = 48;
const EMPRESA_ = "Fravega";



class ScrapingFrav extends BaseScraping
{
//    protected $parameter;
//
//    public function __construct($parameter)
//    {
//        $this->parameter = $parameter;
//        $this->search($parameter);
//    }

    public function search($parameters){

        $parametros_sin_formatear = strtolower($parameters);

        $busqueda = $this->getBusquedaReciente(strtolower($parameters));

//        if ($busqueda->count() > 0){
//            return  true;
//        }
      //  dd($busqueda);
//        dd($busqueda->count());

//        foreach ($busqueda as $x){
//           $x->cantidad_busquedas = $x->cantidad_busquedas +1;
//
//        }
//        die();
//        dd($busqueda);


        $parameters = $this->formatParameters($parameters);

       // $url = "https://www.garbarino.com/q/{$parameters}/srch?q={$parameters}";
        $url = "https://www.fravega.com/l/?keyword={$parameters}";
        $crawler = $this->goutteClient->request('GET',$url);

        $pages = $this->getCantidadDePaginas($crawler);

         $this->getContenido($pages,$parameters,$parametros_sin_formatear);

        return $this->getBusquedaReciente($parameters);
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

        $elements = $crawler->filter(".listingDesktopstyled__TotalResult-wzwlr8-2")->each(function (Crawler $node) {
                    $offset = $node->filter("span")->html();
                    $offset = intval($offset);

                    return $offset;
                });

        $pages = (int) ceil(intval($elements[0]) / 15);

         return $pages;

    }


    private function getContenido($pages,$parameters,$parametros_sin_formatear){

        $data = [];

        for ($i=1;$i <= $pages;$i++){
            //$uri = "https://www.garbarino.com/q/{$parameters}/srch?page={$i}&q";
            $uri = "https://www.fravega.com/l/?keyword={$parameters}&page={$i}";
            $crawler = $this->goutteClient->request('GET',$uri);
            $data[$i] = $crawler->filter('.ProductCard__Card-sc-1w5guu7-2')->each(function (Crawler $node) {

                //dd($node->filter(".PieceTitle-sc-1eg7yvt-0")->text());
                $src = $node->filter('img')->attr('src');
                $href = "https://www.fravega.com".$node->filter('a')->attr('href');
                $div_price = $node->filter(".PiecePricing__PiecePriceWrapper-acjwpt-0");
                $price = $div_price->filter("span");
                $price = str_replace("$","",$price->text());
                $price = trim($price);
                $price = str_replace(".","",$price);

                $title = $node->filter(".PieceTitle-sc-1eg7yvt-0")->text();
                $contenido = preg_replace('/\W\w+\s*(\W*)$/', '$1',  $node->text());
                $contenido = str_replace("Rectangle","",$contenido);

                /** VER EL TEMA DEL PRECIO DEL PRODUCTO Y EL DESCUENTO */
                /** AGREGAR UNA TABLA NUEVA ESTADISTICAS */
                dd($contenido);
//                  dd($node->text(),$href,$src,$div_item->html(),$price->html(),$title->html(),$node->html());

                return [
                    'precio' =>intval($price),
                    'contenido'=> preg_replace('/\W\w+\s*(\W*)$/', '$1',  $node->text()),
                    "titulo" => $title,
                    'src' => $src,
                    'href' => $href,
                    'brand' => '<svg class="showOnDesktop SearchBar__LogoDesktopImgStyled-xgngsx-4 jMRYTr" viewBox="0 0 163 25"><g fill="none" fill-rule="evenodd"><path d="M16.27 13.286s.14-.907-.917-.907h-7.71c-1.06 0-.892-.89-.892-.89l.331-1.784s.094-.922 1.16-.922h8.747c.765 0 .908-.89.908-.89l.331-1.484s.143-.916-.916-.916H4.12c-1.064 0-1.16.904-1.16.904L.009 21.567s-.165.89.898.89h2.942c.767 0 .909-.89.909-.89l.967-4.953s.098-.92 1.157-.92h8.195c.766 0 .906-.892.906-.892l.288-1.516zm63.14 5.864c-1.065 0-.903-.905-.903-.905l.354-1.887s.093-.92 1.155-.92h8.644c.768 0 .906-.892.906-.892l.284-1.52s.14-.903-.916-.903h-8.156c-1.064 0-.898-.892-.898-.892l.287-1.526s.096-.922 1.16-.922H90.5c.767 0 .91-.89.91-.89l.33-1.484s.141-.916-.914-.916h-13.62c-1.06 0-1.155.904-1.155.904l-2.952 15.17s-.166.89.897.89h14.403c.766 0 .906-.89.906-.89l.332-1.487s.14-.93-.915-.93h-9.312zm24.658-6.918c-1.06 0-1.155.93-1.155.93l-.278 1.512s-.165.906.9.906h2.723s.801-.03.62.843l-.246 1.26s-.123 1.082-.815 1.274c0 0-1.762.582-4.55.582-2.786 0-6.259-1.143-6.259-4.94 0-3.797 4.934-6.22 8.526-6.22 0 0 3.069-.05 5.006 1.234 0 0 .566.465 1.13.117l2.529-1.61s1.064-.514.258-1.118c0 0-2.406-1.934-8.334-1.934-5.927 0-13.317 2.773-14.073 9.742 0 0-1.204 7.923 10.817 8.063 0 0 4.13.023 8.406-1.213 0 0 1.46-.375 1.65-1.538l1.3-6.828s.234-1.062-.968-1.062h-7.187zM60.095 22.444c-.816 0-1.081-.867-1.081-.867L52.93 6.398s-.423-.91.476-.91h3.587s.991-.024 1.347.955l3.778 9.999s.284.956.968 0l7.106-10.045s.66-.908 1.607-.908h3.024s1.272.024.564.93L64.004 21.592s-.586.852-1.601.852h-2.308zm74.111-.9l-6.096-15.15c-.369-.93-1.291-.91-1.291-.91h-2.177c-.832 0-1.54.91-1.54.91l-12.038 15.173c-.802 1 .518.887.518.887h3.284s.869.017 1.541-.877l1.562-2.097s.476-.75 1.344-.75h7.65s.866-.018 1.185.892l.727 1.955s.263.857 1.08.857h3.558s1.08.105.693-.89zm-8.644-5.994h-3.506c-1.17 0-.653-.752-.653-.752l2.477-3.426c1.062-1.502 1.434 0 1.434 0l1.137 3.426c.297.874-.89.752-.89.752zM46.22 5.493c-.767.096-1.392.901-1.392.901L33.866 20.197c-.831 1.031-1.489 0-1.489 0l-2.372-3.74c-.727-1.134.824-1.64.824-1.64 1.784-.58 4.224-1.972 4.277-5.175.068-4.526-8.043-4.149-8.043-4.149h-7.04c-1.064 0-1.156.904-1.156.904l-2.953 15.17s-.167.89.898.89h2.936c.772 0 .914-.89.914-.89l.978-5.092s.094-.907 1.157-.907h.85c.69 0 1.063.848 1.063.848l2.905 5.127s.401.91 1.274.91h7.703s.867.018 1.54-.876l1.559-2.097s.479-.75 1.348-.75h7.651s.866-.018 1.183.892l.727 1.955s.264.857 1.079.857h3.56s1.082.105.69-.89l-6.091-15.15c-.372-.93-1.29-.91-1.29-.91h-.151l-2.177.01zm1.07 10.057h-3.506c-1.17 0-.656-.752-.656-.752l2.48-3.426c1.062-1.502 1.43 0 1.43 0l1.137 3.426c.3.874-.885.752-.885.752zm-20.916-3.2l-2.828.03c-1.06 0-.897-.89-.897-.89l.373-1.906s.094-.92 1.155-.92h2.41s2.619-.14 3.242.733c0 0 .406.42.229 1.206-.182.815-.976 1.676-3.684 1.748zM51.715 0H49.45v.007c-.802.051-1.267.718-1.267.718L46.5 2.902c-.601.773.484.794.484.794h2.266v-.008c.802-.052 1.265-.722 1.265-.722L52.198.794C52.8.022 51.715 0 51.715 0z" fill="#000"></path><path d="M144.936 23.99c8.621-2.264 17.672-5.833 17.755-10.852 0 0 1.173-6.606-17.253-10.184 0 0-3.385-.7-4.061.042-.627.685 1.98 1.609 1.98 1.609 4.942 1.945 10.432 4.96 10.572 8.784 0 0 1.206 4.774-10.497 9.357 0 0-2.433.868-2.113 1.576.24.524 2.668-.111 3.617-.333" fill="#409"></path><path d="M142.84 21.947c4.998-1.944 9.746-4.727 9.761-8.308 0 0 .764-4.293-9.647-8.435-.323-.11-1.662-.556-2.295.112-.525.555 1.006 1.588 1.006 1.588 2.004 1.63 3.93 3.87 3.862 6.46-.063 2.328-1.868 4.425-4.34 6.186 0 0-2.329 1.527-1.764 2.416.651 1.034 2.493.291 3.416-.02" fill="#D30098"></path></g></svg>',
                    'empresa' => EMPRESA_
                ];
            });
        }



       $this->saveBusqueda($data,$parametros_sin_formatear);

        return true;
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
                $busqueda->busqueda = strtolower($parameters);
                $busqueda->cantidad_busquedas = 1;

                $busqueda->save();
            }
        }

    }

    public function getBusquedaReciente($parameters){

        $busqueda = DB::table("Busquedas")
            ->where("busqueda",$parameters)
            ->where("empresa","Fravega")
            ->orderBy("precio","asc")
            ->paginate(5)
            ->appends ( array (
                'search' => $parameters
            ) );

        return $busqueda;
    }

}
