<!-- PROJECT LOGO -->
<br />
<p align="center">
  <a href="https://github.com/Georges-Ngandeu/AfrikpayNodeSdk">
    <img src="afrikpay.png" alt="Logo" width="100%" height="100%">
  </a>

  <h3 align="center">Afrikpay Node Sdk</h3>

  <p align="center">
    Afrikpay api integration with nodejs
    <br />
    <a href="https://github.com/Georges-Ngandeu/AfrikpayNodeSdk"><strong>Explore the docs »</strong></a>
    <br />
    <br />
    <a href="https://github.com/Georges-Ngandeu/AfrikpayNodeSdk">View Demo</a>
    ·
    <a href="https://github.com/Georges-Ngandeu/AfrikpayNodeSdk">Report Bug</a>
    ·
    <a href="https://github.com/Georges-Ngandeu/AfrikpayNodeSdk">Request Feature</a>
  </p>
</p>



<!-- TABLE OF CONTENTS -->
<details open="open">
  <summary><h2 style="display: inline-block">Table of Contents</h2></summary>
  <ol>
    <li><a href="#getting">Getting started</a></li>
    <li><a href="#usage">Ecommerce integration</a></li>
    <li><a href="#usage">Bill integration</a></li>
    <li><a href="#usage">Airtime integration</a></li>
    <li><a href="#usage">Account integration</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#acknowledgements">Acknowledgements</a></li>
  </ol>
</details>


<!-- GETTING STARTED -->
## Getting Started

This node library was created with the purpose of facilitating the integration of our payment api to our partners. It is an ongoing work. Suggestions to ameliorate the api are welcome. 

### Prerequisites:  `composer` must be install on your system

### Installation

   ```sh
composer require afrikpay-tools/afrikpay-tools-php-sdk:dev-master
   ```
<!-- USAGE EXAMPLES -->
## Ecommerce integration

Let's suppose you want to integrate ecommerce payments on you system. Here are the two main steps to get the job done in the development environment.
You can uncomment the code to test the others apis. 
```
require __DIR__.'/vendor/autoload.php';

use App\Ecommerce;

//some example usage of the package

/*********************ecommerce api examples****************/

//collect example
 $ecommerce = new Ecommerce(
    'AFC6617',
    '661671d0bd7bef499e7d80879c27d95e',
    '7777',
    'http://34.86.5.170:8086/api/ecommerce/collect/',
    'http://34.86.5.170:8086/api/ecommerce/payout/',
    'http://34.86.5.170:8086/api/ecommerce/deposit/',
    'http://34.86.5.170:8086/api/ecommerce/changekey/',
    'http://34.86.5.170:8086/api/ecommerce/transaction/status/'
 );

$response = $ecommerce->collect(
  'mtn_mobilemoney_cm',
  '677777777',
  400);
$ecommerce->print_response($response);

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

```
## Bill integration
If you want to integrate bill payments apis on you system, here are the two main steps to get the job done in the development environment. You an uncomment the code to test the others apis.
```
require __DIR__.'/vendor/autoload.php';

use App\Bill;

//bill example
$bill = new Bill(
  '3620724907638658',
  '3620724907638658',
  'e825e83873eafffff315fc3f22db2d59',
  'afrikpay',
  'http://34.86.5.170:8086/api/bill/v2/',
  'http://34.86.5.170:8086/api/bill/getamount/',
  'http://34.86.5.170:8086/api/bill/status/v2/'
);

$response = $bill->payBill(
  'camwater',
  '111111111111111',
  2000,
  'cash',
  '16589'
);
$bill->print_response($response);

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
```
## Airtime integration
If you want to integrate airtime apis on you system, here are the two main steps to get the job done in the development environment. You an uncomment the code to test the others apis.
```
require __DIR__.'/vendor/autoload.php';

use App\Airtime;

//airtime example
$airtime = new Airtime(
  '3620724907638658',
  '3620724907638658',
  'e825e83873eafffff315fc3f22db2d59',
  'afrikpay',
  'http://34.86.5.170:8086/api/airtime/v2/',
  'http://34.86.5.170:8086/api/airtime/status/v2/'
);

//airtime status
$response = $airtime->makeAirtime(
  'mtn',
  '677777777',
  1000,
  'cash',
  'xyz123'
);
$airtime->print_response($response);

// $response = $airtime->airtimeStatus(
//     'xyz123'
// );
// $airtime->print_response($response);
```
## Account integration
If you want to integrate account apis on you system, here are the two main steps to get the job done in the development environment. You an uncomment the code to test the others apis.
```
require __DIR__.'/vendor/autoload.php';

use App\Account;

$account = new Account(
  '3620724907638658',
  '3620724907638658',
  'e825e83873eafffff315fc3f22db2d59',
  'http://34.86.5.170:8086/api/account/agent/balance/v2/',
  'http://34.86.5.170:8086/api/account/agent/balance/v2/',
  'http://34.86.5.170:8086/api/account/developer/changekey/'
);

$response = $account->balance();
$account->print_response($response);
```
## How to switch to production ?
You can explore the src folder to see the default production setup. Just use the appropriate apikey, store code, agentid for production. If you have any problem using the library please contact us, we will be happy to help you. 
<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE` for more information.

<!-- CONTACT -->
## Contact

Project Link: [https://github.com/Georges-Ngandeu/AfrikpayNodeSdk](https://github.com/Georges-Ngandeu/AfrikpayNodeSdk)

<!-- ACKNOWLEDGEMENTS -->
## Acknowledgements

* []()
* []()
* []()

<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/github_username/repo.svg?style=for-the-badge
[contributors-url]: https://github.com/github_username/repo/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/github_username/repo.svg?style=for-the-badge
[forks-url]: https://github.com/github_username/repo/network/members
[stars-shield]: https://img.shields.io/github/stars/github_username/repo.svg?style=for-the-badge
[stars-url]: https://github.com/github_username/repo/stargazers
[issues-shield]: https://img.shields.io/github/issues/github_username/repo.svg?style=for-the-badge
[issues-url]: https://github.com/github_username/repo/issues
[license-shield]: https://img.shields.io/github/license/github_username/repo.svg?style=for-the-badge
[license-url]: https://github.com/github_username/repo/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/github_username