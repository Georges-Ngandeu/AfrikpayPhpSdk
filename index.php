<?php

require __DIR__.'/vendor/autoload.php';

use App\Ecommerce;
use App\Airtime;
use App\Bill;
use App\Account;

//some example usage of the package

/*********************ecommerce api examples****************/

//collect example
// $ecommerce = new Ecommerce(
//     'AFC6617',
//     '661671d0bd7bef499e7d80879c27d95e',
//     '7777',
//     'http://34.86.5.170:8086/api/ecommerce/collect/',
//     'http://34.86.5.170:8086/api/ecommerce/payout/',
//     'http://34.86.5.170:8086/api/ecommerce/deposit/',
//     'http://34.86.5.170:8086/api/ecommerce/changekey/',
//     'http://34.86.5.170:8086/api/ecommerce/transaction/status/'
// );

// $response = $ecommerce->collect(
//     'mtn_mobilemoney_cm',
//     '677777777',
//     400);
// $ecommerce->print_response($response);

// $response = $ecommerce->collect(
//     'orange_money_cm',
//     '699999999',
//     400,
//     '0000',
//     '123azerty');
// $ecommerce->print_response($response);

//payout example
// $response = $ecommerce->payout(
//     'mtn_mobilemoney_cm',
//     '677777777',
//     300);
// $ecommerce->print_response($response);

// $response = $ecommerce->payout(
//     'orange_money_cm',
//     '699999999',
//     500);
// $ecommerce->print_response($response);

//balance deposit example
// $response = $ecommerce->deposit();
// $ecommerce->print_response($response);

//transaction status example
// $response = $ecommerce->transactionStatus('123azerty');
// $ecommerce->print_response($response);

//ecommerce hash
// $hash = $ecommerce->hash('ecommerce_collect');
// print_r($hash);

/*********************airtime api examples****************/

//airtime example
// $airtime = new Airtime(
//     '3620724907638658',
//     '3620724907638658',
//     'e825e83873eafffff315fc3f22db2d59',
//     'afrikpay',
//     'http://34.86.5.170:8086/api/airtime/v2/',
//     'http://34.86.5.170:8086/api/airtime/status/v2/'
// );

//airtime status
// $response = $airtime->makeAirtime(
//     'mtn',
//     '677777777',
//     1000,
//     'cash',
//     'xyz123'
// );
// $airtime->print_response($response);

// $response = $airtime->airtimeStatus(
//     'xyz123'
// );
// $airtime->print_response($response);

/*********************bill api examples****************/

//bill example
// $bill = new Bill(
//     '3620724907638658',
//     '3620724907638658',
//     'e825e83873eafffff315fc3f22db2d59',
//     'afrikpay',
//     'http://34.86.5.170:8086/api/bill/v2/',
//     'http://34.86.5.170:8086/api/bill/getamount/',
//     'http://34.86.5.170:8086/api/bill/status/v2/'
// );

// $response = $bill->payBill(
//     'camwater',
//     '111111111111111',
//     2000,
//     'cash',
//     '16589'
// );
// $bill->print_response($response);

// $response = $bill->payBill(
//     'canal',
//     '11111111111111',
//     13500,
//     'cash',
//     '165899'
// );
// $bill->print_response($response);

// $response = $bill->getBillAmount(
//     'canal',
//     '11111111111111'
// );
// $bill->print_response($response);

// $response = $bill->getBillStatus(
//     '165899'
// );
// $bill->print_response($response);

/*********************account api examples****************/
// $account = new Account(
//     '3620724907638658',
//     '3620724907638658',
//     'e825e83873eafffff315fc3f22db2d59',
//     'http://34.86.5.170:8086/api/account/agent/balance/v2/',
//     'http://34.86.5.170:8086/api/account/agent/balance/v2/',
//     'http://34.86.5.170:8086/api/account/developer/changekey/'
// );

// $response = $account->balance();
// $account->print_response($response);