<?php

namespace App\Gateway;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class Devtest
{
    protected $client;
    protected $method;
    protected $uri;

    public function __construct($url, $uri, $method)
    {
        $this->method = $method;
        $this->uri    = $uri;
        $this->client =  new Client([
            'base_uri' => $url,
            'timeout' => 60,
        ]);
    }

    public function getCountries(){
        if($this->client){
            try {
                $response = $this->client->request($this->method, $this->uri,
                    [
                        'headers' => [
                            'Content-Type' => 'application/json',
                            'Accept' => 'application/json',
                    ]]);

                $data = json_decode($response->getBody()->getContents());
                return $data;
            } catch (\Exception $e) {
                Log::warn($e->getMessage());
                return false;
            }
        } else {
            return 'connection could not established';
        }
    }

    public function getStatistics($code){

        if($this->client){
            try {
                $response = $this->client->request($this->method, $this->uri,
                    ['form_params' => ["code" => $code],
                    ]);

                $data = json_decode($response->getBody()->getContents());
                return $data;

            } catch (\Exception $e) {
                return $e;
            }
        } else {
            return 'connection could not established';
        }
    }

}
