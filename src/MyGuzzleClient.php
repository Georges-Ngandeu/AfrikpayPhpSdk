<?php

namespace App;

use GuzzleHttp\Client;

class MyGuzzleClient implements HttpClientInterface {

    public function __construct(Client $client) {
        $this->client = $client;
    }
   
    public function makeRequest($method, $url, $data) {
        return $this->client->request($method, $url, $data);
    }
}