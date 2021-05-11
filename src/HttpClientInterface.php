<?php

namespace App;

interface HttpClientInterface {
    public function makeRequest($method, $url, $data);
}