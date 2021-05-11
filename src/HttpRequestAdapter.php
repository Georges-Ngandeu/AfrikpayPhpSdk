<?php

namespace App;

class HttpRequestAdapter implements HttpRequestInterface {

    public function __construct(HttpClientInterface $client){
        $this->client = $client;
    }
   
    public function fireRequest($method, $url, $data) {
        return $this->client->makeRequest($method, $url, $data);
    }
}