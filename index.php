<?php

require __DIR__.'/vendor/autoload.php';

use App\Ecommerce;

//some example usage of the package

//collect example
// $ecommerce = new Ecommerce('AFC5308', 'b2b0c952269cd5c38903433759369ac7', '', 'http://34.86.5.170:8086/api/ecommerce/collect/');
// $response = $ecommerce->collect('orange_money_cm', '699999999', 200, '0000');
// $ecommerce->print_response($response);

$ecommerce = new Ecommerce('AFC5308', 'b2b0c952269cd5c38903433759369ac7', '', 'http://34.86.5.170:8086/api/ecommerce/collect/');
$response = $ecommerce->collect('mtn_mobilemoney_cm', '677777777', 300);
$ecommerce->print_response($response);

//ecommerce hash
// $ecommerce = new Ecommerce('AFC5308', 'b2b0c952269cd5c38903433759369ac7', '', 'http://34.86.5.170:8086/api/ecommerce/collect/');
// $hash = $ecommerce->hash('ecommerce_collect');
// print_r($hash);

//payout example
// $ecommerce = new Ecommerce('AFC5308', 'b2b0c952269cd5c38903433759369ac7', '5555');
// $response = $ecommerce->payout('mtn_mobilemoney_cm', '677777777', 150);
// print_r($response);

//balance deposit example
// $ecommerce = new Ecommerce(
//     'AFC5308',
//     'b2b0c952269cd5c38903433759369ac7',
//     '5555',
//     'http://34.86.5.170:8086/api/ecommerce/collect/',
//     'http://34.86.5.170:8086/api/ecommerce/payout/',
//     'http://34.86.5.170:8086/api/ecommerce/deposit/',
//     'http://34.86.5.170:8086/api/ecommerce/changekey/',
//     'http://34.86.5.170:8086/api/ecommerce/transaction/status/'
// );
// $response = $ecommerce->deposit();
// print_r($response);

//transaction status example
// $ecommerce = new Ecommerce('AFC5308', 'b2b0c952269cd5c38903433759369ac7', '5555');
// $response = $ecommerce->transactionStatus('azerty');
// print_r($response);
