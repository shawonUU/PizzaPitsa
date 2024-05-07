<?php

namespace App\Http\Controllers;

use Exception;
// use GuzzleHttp\Client;
use Paytrail\SDK\Client;
use Illuminate\Http\Request;
use Paytrail\SDK\Model\Customer;
use Paytrail\SDK\Model\CallbackUrl;
use Paytrail\SDK\Request\PaymentRequest;

class PaytrailController extends Controller
{
    public function createPayment(Request $request, $newOrderNumber=null)
    {
        $currentUrl = $request->url();
        $parsed_url = parse_url($currentUrl);
        $host = $parsed_url['host'];
        $port = $parsed_url['port'];

        $result = $host;
        if ($port !== null) {
            $result = $host . ':' . $port;
        }
        // return $result;
        $auth = auth()->user();


        $merchantId = 1077442;
        $merchantPass = '06d6fe111d8fc325f50ba97379f34693fdb964e0b8617ce4f8f5af5c836ffdc1928e5f78ee9b64f3';

        
        $platformName = 'Pizza-Pitsa';
        $amount = $request->grandTotal*100; // Amount is in cents, 15.00 €
        $stamp = microtime(); // Use any unique value
        $reference = $auth->name.'('.$auth->id.'), Order Id: '.$newOrderNumber;
        $currency = 'EUR';
        $language = 'FI';
        $email = $auth->email;
        //$groups = ['creditcard'];
        $successUrl = $result.'/success?order_id='.$newOrderNumber;
        $cancelledUrl = $result.'/cancel?order_id='.$newOrderNumber;

        
        // Create customer with minimum values
        $customer = (new Customer())
        ->setEmail($email);

        
        // Set minimum required callback urls
        $redirectUrls = (new CallbackUrl())
        ->setSuccess($successUrl)
        ->setCancel($cancelledUrl);

        
        // Instantiate Paytrail Client
        $client = new Client($merchantId, $merchantPass, $platformName);

        
        // Create payment request with values
        $paymentRequest = new PaymentRequest();
        // Set minimum required values
        $paymentRequest->setAmount($amount)
        ->setStamp($stamp)
        ->setReference($reference)
        ->setCurrency($currency)
        ->setLanguage($language)
        ->setCustomer($customer)
        // ->setGroups($groups)
        ->setRedirectUrls($redirectUrls);

        
        // Wrap payment creation to try catch block. In case failed payment, response contains error message.
        try {
            $payment = $client->createPayment($paymentRequest);
        } catch (\Exception $e) {
            echo $e->getMessage();
            die();
        }
        
        $url = $payment->getHref();
        // return redirect($url);
        return $url;

    }

    public function success(Request $request){

    }
    public function cancel(Request $request){
        dd('jj');
    }
    public function pending(Request $request){

    }
    public function notification(Request $request){

    }
}