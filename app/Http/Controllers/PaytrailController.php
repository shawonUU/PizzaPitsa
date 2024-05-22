<?php

namespace App\Http\Controllers;

use Exception;
// use GuzzleHttp\Client;
use Paytrail\SDK\Client;
use Illuminate\Http\Request;
use Paytrail\SDK\Model\Customer;
use Paytrail\SDK\Model\CallbackUrl;
use Paytrail\SDK\Request\PaymentRequest;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use App\Mail\PlaceOrderMail;

class PaytrailController extends Controller
{
    public function createPayment(Request $request, $newOrderNumber=null)
    {
        $result = getRootURL();
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
        $successUrl = 'https://pizzapitsa.fi/success?order_id='.$newOrderNumber;
        $cancelledUrl = 'https://pizzapitsa.fi/success?order_id='.$newOrderNumber;

        
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
        $order = Order::where('order_number', $request->order_id)->first();
        $order->is_order_valid = 1;
        $order->update();

        // print_r($request->all());
        // return;
        $data = $request->all();

        $user = auth()->user();
        Mail::to($user->email)->send(new PlaceOrderMail($request->order_id, $data));

        return redirect("/dashboard")->with('clear-cart', true);
        
    }
    public function cancel(Request $request){
        return redirect("/");
    }
    public function pending(Request $request){

    }
    public function notification(Request $request){

    }
}