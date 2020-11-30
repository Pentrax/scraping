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
        $this->guzzleClient = new GuzzleClient(
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
        $this->goutteClient->setClient($this->guzzleClient);
    }

}
