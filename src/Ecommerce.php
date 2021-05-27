<?php

namespace App;

class Ecommerce {

    use Utility; 
    
    private $store; 
    private $apiKey;
    private $collectUrl; 
    private $payoutUrl; 
    private $depositUrl; 
    private $changeKeyUrl; 
    private $transactionStatusUrl; 
    private $secretCode; 
    private $acceptUrl;
    private $cancelUrl;
    private $declineUrl;
    private $notifyUrl;
    
    public function __construct(
        $store,
        $apiKey,
        $secretCode = '',
        $collectUrl = 'http://35.204.26.22:8086/api/ecommerce/collect/',
        $payoutUrl = 'http://35.204.26.22:8086/api/ecommerce/payout/',
        $depositUrl = 'http://35.204.26.22:8086/api/ecommerce/deposit/',
        $changeKeyUrl = 'http://35.204.26.22:8086/api/ecommerce/changekey/',
        $transactionStatusUrl = 'http://35.204.26.22:8086/api/ecommerce/transaction/status/',
        $acceptUrl = '',
        $cancelUrl = '',
        $declineUrl = '',
        $notifyUrl = ''
        ) {
        
        $this->store = $store;
        $this->apiKey = $apiKey;
        $this->secretCode = $secretCode;
        $this->collectUrl = $collectUrl;
        $this->payoutUrl = $payoutUrl;
        $this->depositUrl = $depositUrl;
        $this->changeKeyUrl = $changeKeyUrl;
        $this->transactionStatusUrl = $transactionStatusUrl;
        $this->acceptUrl = $acceptUrl;
        $this->cancelUrl = $cancelUrl;
        $this->declineUrl = $declineUrl;
        $this->notifyUrl = $notifyUrl;
    }

    public function __toString(){
        return (string) $this->store;
    }

    public function collect(
        $provider,
        $reference,
        $amount,
        $code = '',
        $purchaseRef = '',
        $description = '') {

        switch ($provider) {
            case 'mtn_mobilemoney_cm':
                $response = $this->makePayment(
                    $provider,
                    $reference,
                    $amount,
                    $code,
                    $purchaseRef,
                    $description
                );
                return $response;
                break;
            case 'orange_money_cm':
                $response = $this->makePayment(
                    $provider,
                    $reference,
                    $amount,
                    $code,
                    $purchaseRef,
                    $description
                );
                return $response;
                break;
            case 'express_union_mobilemoney':
                $response = $this->makePayment(
                    $provider,
                    '237'.$reference,
                    $amount,
                    $code,
                    $purchaseRef,
                    $description
                );
                return $response;
                break;
            case 'afrikpay':
                $response = $this->makePayment(
                    $provider,
                    '237'.$reference,
                    $amount,
                    $code,
                    $purchaseRef,
                    $description
                );
                return $response;
                break;
            default:
                echo "Provider must be correctly define";
            }
    }

    public function payout(
        $provider,
        $reference,
        $amount,
        $purchaseRef = '',
        $description = '') {

        switch ($provider) {
            case 'mtn_mobilemoney_cm':
                $response = $this->makePayout(
                    $provider,
                    $reference,
                    $amount,
                    $purchaseRef,
                    $description
                );
                return $response;
                break;
            case 'orange_money_cm':
                $response = $this->makePayout(
                    $provider,
                    $reference,
                    $amount,
                    $purchaseRef,
                    $description
                );
                return $response;
                break;
            case 'express_union_mobilemoney':
                $response = $this->makePayout(
                    $provider,
                    '237'.$reference,
                    $amount,
                    $purchaseRef,
                    $description
                );
                return $response;
                break;
            case 'afrikpay':
                $response = $this->makePayout(
                    $provider,
                    '237'.$reference,
                    $amount,
                    $purchaseRef,
                    $description
                );
                return $response;
                break;
            default:
                echo "Provider must be correctly define";
            }
    }

    public function deposit(){
        $client = new \GuzzleHttp\Client();
        $hash = md5($this->store.$this->apiKey);
        $response = $client->request('POST', $this->depositUrl, [
            'json' => [
                'store'=> $this->store,
                'hash' => $hash
            ]
        ]);
        
        // $guzzleClient = new \GuzzleHttp\Client();
        // $myGuzzleClient = new MyGuzzleClient($guzzleClient);
        // $httpRequestAdapter = new HttpRequestAdapter($myGuzzleClient);
        // $hash = md5($this->store.$this->apiKey);
        // $response = $httpRequestAdapter->fireRequest('POST', $this->depositUrl, [
        //     'json' => [
        //         'store'=> $this->store,
        //         'hash' => $hash
        //     ]
        // ]);

        return $response;
    }

    public function changeKey(){
        $client = new \GuzzleHttp\Client();
        $hash = md5($this->store.$this->apiKey);
        $response = $client->request('POST', $this->changeKeyUrl, [
            'json' => [
                'store'=> $this->store,
                'hash' => $hash
            ]
        ]);

        return $response;
    }

    public function transactionStatus($purchaseRef){
        $client = new \GuzzleHttp\Client();
        $hash = md5($purchaseRef.$this->apiKey);
        $response = $client->request('POST', $this->transactionStatusUrl, [
            'json' => [
                'purchaseref'=> $purchaseRef,
                'store'=> $this->store,
                'hash' => $hash
            ]
        ]);

        return $response;
    }

    public function makePayment(
        $provider,
        $reference,
        $amount,
        $code = '',
        $purchaseRef = '',
        $description = ''
    ) {
        $client = new \GuzzleHttp\Client();
        $hash = md5($provider.$reference.$amount.$this->apiKey);
        $response = $client->request('POST', $this->collectUrl, [
            'json' => [
                'provider' => $provider,
                'reference' => $reference,
                'amount' => $amount,
                'description' => $description,
                'purchaseref' => $purchaseRef,
                'store'=> $this->store,
                'hash' => $hash,
                'code'=> $code,
                'notifurl' => $this->notifyUrl,
                'accepturl' => $this->acceptUrl,
                'cancelurl' => $this->cancelUrl,
                'declineurl' => $this->declineUrl
            ]
        ]);

        return $response;
    }

    public function makePayout(
        $provider,
        $reference,
        $amount,
        $purchaseRef = '',
        $description = ''
    ) {
        $client = new \GuzzleHttp\Client();
        $hash = md5($provider.$reference.$amount.$this->apiKey);
        $password = md5($this->secretCode);
        $response = $client->request('POST', $this->payoutUrl, [
            'json' => [
                'provider' => $provider,
                'reference' => $reference,
                'amount' => $amount,
                'description' => $description,
                'purchaseref' => $purchaseRef,
                'store'=> $this->store,
                'hash' => $hash,
                'password'=> $password
            ]
        ]);

        return $response;
    }
}