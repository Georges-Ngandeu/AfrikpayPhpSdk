<?php

namespace App;

trait Utility {
    public function print_response($response){
        $bodyResponse = $response->getBody()->getContents();
        $decodedBody = json_decode($bodyResponse);
        print_r($decodedBody);
        //print_r($response);
    }

    public function hash($service){
        $provider = 'mtn_mobilemoney_cm';
        $reference = '677777777';
        $amount = '175';
        $apiKey = 'b2b0c952269cd5c38903433759369ac7';

        switch($service){
            case 'ecommerce_collect':
                return md5($provider.$reference.$amount.$apiKey);
                break;
        }
    }
}