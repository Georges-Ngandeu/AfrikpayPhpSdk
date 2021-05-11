<?php

namespace App;

class Bill {

    use Utility; 

    private $agentId; 
    private $agentPlatform; 
    private $apiKey; 
    private $agentPassword; 
    private $billUrl; 
    private $billAmountUrl; 
    private $billStatusUrl; 
    
    public function __construct(
        $agentId, 
        $agentPlatform, 
        $apiKey,
        $agentPassword = '',
        $billUrl = 'http://35.204.26.22:8086/api/bill/v2/',
        $billAmountUrl = 'http://35.204.26.22:8086/api/bill/getamount/',
        $billStatusUrl = 'http://35.204.26.22:8086/api/bill/status/v2/'
    ){
        $this->agentId= $agentId;
        $this->agentPlatform = $agentPlatform;
        $this->billUrl = $billUrl;
        $this->agentPassword = $agentPassword;
        $this->billAmountUrl = $billAmountUrl;
        $this->billStatusUrl = $billStatusUrl;
        $this->apiKey = $apiKey;
    }

    public function __toString(){
        return (string) $this->agentId." + ".$this->agentPlatform;
    }

    /**
     * When making payment here is the format
     *   biller: canal, camwater, eneoprepay, eneopostpay, uds
     *   billid: 14, 12, 12
     */
    public function payBill(
        $biller,
        $billid,
        $amount,
        $mode,
        $processingNumber = ''
    ) {
        $client = new \GuzzleHttp\Client();
        $hash = md5($biller.$billid.$amount.$this->apiKey);
        $agentPassword = md5($this->agentPassword);
        $response = $client->request('POST', $this->billUrl, [
            'json' => [
                'biller' => $biller,
                'billid' => $billid,
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

    public function getBillAmount(
        $biller,
        $billid
    ){
        $client = new \GuzzleHttp\Client();
        $hash = md5($biller.$billid.$this->apiKey);
        $agentPassword = md5($this->agentPassword);
        $response = $client->request('POST', $this->billAmountUrl, [
            'json' => [
                'biller' => $biller,
                'billid' => $billid,
                'agentid' => $this->agentId,
                'hash'=> $hash
            ]
        ]);

        return $response;
    }

    public function getBillStatus(
        $processingNumber = ''
    ){
        $client = new \GuzzleHttp\Client();
        $hash = md5($processingNumber.$this->apiKey);
        $response = $client->request('POST', $this->billStatusUrl, [
            'json' => [
                'agentid' => $this->agentId,
                'agentplatform'=> $this->agentPlatform,
                'processingnumber'=> $processingNumber,
                'hash'=> $hash,
            ]
        ]);

        return $response;
    }
}