<?php

namespace App;

interface HttpRequestInterface {
    public function fireRequest($method, $url, $data);
}