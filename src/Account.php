<?php

namespace App;

class Account {

    use Utility; 

    private $agentId; 
    private $agentPlatform;
    private $apiKey; 
    private $transactionStatusUrl;
    private $balanceUrl;
    private $changeKeyUrl;
    
    public function __construct(
        $agentId,
        $agentPlatform,
        $apiKey,
        $transactionStatusUrl = 'http://35.204.26.22:8086/api/account/agent/balance/v2/',
        $balanceUrl = 'http://35.204.26.22:8086/api/account/agent/balance/v2/',
        $changeKeyUrl = 'http://35.204.26.22:8086/api/account/developer/changekey/'
        ) {
        $this->agentId = $agentId;
        $this->agentPlatform = $agentPlatform;
        $this->apiKey = $apiKey;
        $this->transactionStatusUrl = $transactionStatusUrl;
        $this->balanceUrl = $balanceUrl;
        $this->changeKeyUrl = $changeKeyUrl;
    }

    public function __toString(){
        
    }

    public function balance(){
        $client = new \GuzzleHttp\Client();
        $hash = md5($this->agentId.$this->apiKey);
        $response = $client->request('POST', $this->balanceUrl, [
            'json' => [
                'agentid' => $this->agentId,
                'agentplatform'=> $this->agentPlatform,
                'hash'=> $hash,
            ]
        ]);

        return $response;
    }

    public function changeKey(){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', $this->changeKeyUrl, [
            'json' => [
                'agentid' => $this->agentId,
                'apikey'=> $this->agentPlatform,
            ]
        ]);

        return $response;
    }

    public function transactionStatus($transactionId) {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', $this->transactionStatusUrl, [
            'json' => [
                'transactionid' => $transactionId,
            ]
        ]);

        return $response;
    }
}