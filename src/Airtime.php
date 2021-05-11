<?php

namespace App;

class Airtime {
    
    use Utility; 

    private $agentId; 
    private $agentPlatform; 
    private $apiKey; 
    private $agentPassword; 
    private $airtimeUrl; 
    private $airtimeStatusUrl; 
    
    public function __construct(
        $agentId,
        $agentPlatform,
        $apiKey,
        $agentPassword = '',
        $airtimeUrl = 'http://35.204.26.22:8086/api/airtime/v2/',
        $airtimeStatusUrl = 'http://35.204.26.22:8086/api/airtime/status/v2/'
    ) {
        $this->agentId = $agentId;
        $this->agentPlatform = $agentPlatform;
        $this->apiKey = $apiKey;
        $this->agentPassword = $agentPassword;
        $this->airtimeUrl = $airtimeUrl;
        $this->airtimeStatusUrl = $airtimeStatusUrl;
    }

    public function __toString(){
        return (string) $this->agentId." + ".$this->agentPlatform;
    }

    public function makeAirtime(
        $operator,
        $reference,
        $amount,
        $mode,
        $processingNumber = ''
    ) {
        $client = new \GuzzleHttp\Client();
        $hash = md5($operator.$reference.$amount.$this->apiKey);
        $agentPassword = md5($this->agentPassword);
        $response = $client->request('POST', $this->airtimeUrl, [
            'json' => [
                'operator' => $operator,
                'reference' => $reference,
                'amount' => $amount,
                'mode' => $mode,
                'agentid' => $this->agentId,
                'agentplatform'=> $this->agentPlatform,
                'agentpwd' => $this->agentPassword,
                'hash'=> $hash,
                'processingnumber'=> $processingNumber,
            ]
        ]);

        return $response;
    }

    public function airtimeStatus(
        $processingNumber  
    ){
        $client = new \GuzzleHttp\Client();
        $hash = md5($processingNumber.$this->apiKey);
        $response = $client->request('POST', $this->airtimeStatusUrl, [
            'json' => [
                'processingnumber'=> $processingNumber,
                'agentplatform'=> $this->agentPlatform,
                'agentid' => $this->agentId,
                'hash'=> $hash,
            ]
        ]);

        return $response;
    }
}