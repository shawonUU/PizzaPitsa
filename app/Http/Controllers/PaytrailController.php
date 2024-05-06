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
    public function createPayment(Request $request)
    {

        if(true){
            // Paytrail test credentials
            $merchantId = 1077442;
            $merchantPass = '06d6fe111d8fc325f50ba97379f34693fdb964e0b8617ce4f8f5af5c836ffdc1928e5f78ee9b64f3';

            
            $platformName = 'CustomPlatform-WebShopName';
            $amount = 1000; // Amount is in cents, 15.00 €
            $stamp = microtime(); // Use any unique value
            $reference = 'testPayment';
            $currency = 'EUR';
            $language = 'FI';
            $email = 'foobar@nomail.com';
            //$groups = ['creditcard'];
            // $successUrl = '';
            // $cancelledUrl = '';
            $successUrl = '127.0.0.1:8000/success';
            $cancelledUrl = '127.0.0.1:8000/cancel';

            
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


        if(false){
            $ACCOUNT = '1077442';
            $SECRET = '06d6fe111d8fc325f50ba97379f34693fdb964e0b8617ce4f8f5af5c836ffdc1928e5f78ee9b64f3';
        
            $headers = [
                'checkout-account' => $ACCOUNT,
                'checkout-algorithm' => 'sha256',
                'checkout-method' => 'POST',
                'checkout-timestamp' => '2023-07-06T10:01:31.904Z',
            ];
        
            $body = [
                'orderNumber' => '12345',
                'amount' => 100.00,
                'currency' => 'EUR',
                'locale' => 'fi_FI',
                'returnUrl' => 'http://127.0.0.1:8000/success',
                'cancelUrl' => 'http://127.0.0.1:8000/failure',
                'notificationUrl' => 'http://127.0.0.1:8000/pending',
            ];
        
            $headers['checkout-nonce'] = uniqid(); // Generating a unique ID for nonce
        
            // Calculate HMAC
            $hmacPayload = implode("\n", array_map(
                function ($key) use ($headers) {
                    return $key . ':' . $headers[$key];
                },
                array_keys($headers)
            ));
            $hmacPayload .= "\n" . json_encode($body);
            $hmac = hash_hmac('sha256', $hmacPayload, $SECRET);
        
            // Include HMAC in headers
            $headers['checkout-signature'] = $hmac;
        
            // Debugging - Output headers for verification
            echo "Headers: \n";
            print_r($headers);
        
            // Debugging - Output body for verification
            echo "Body: \n";
            print_r($body);
        
            // Send request
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://services.paytrail.com/');
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array_merge(['Content-Type: application/json; charset=utf-8'], array_map(
                function ($key, $value) {
                    return $key . ': ' . $value;
                },
                array_keys($headers),
                $headers
            )));
        
            $response = curl_exec($ch);
        
            $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            if ($code == 200 && !(curl_errno($ch))) {
                curl_close($ch);
            } else {
                curl_close($ch);
                echo "FAILED TO CONNECT WITH Paytrail API";
                exit;
            }
        }

        if(false){

                // Set Paytrail API endpoint and credentials
                $url = 'https://payment.paytrail.com/api-payment/create';
                $merchantId = 1077442;
                $merchantSecret = '06d6fe111d8fc325f50ba97379f34693fdb964e0b8617ce4f8f5af5c836ffdc1928e5f78ee9b64f3';

                // Prepare the payload
                $payload = [
                    'orderNumber' => uniqid(),
                    'currency' => 'EUR',
                    'locale' => 'fi_FI',
                    'urlSet' => [
                        'success' => 'http://127.0.0.1:8000/success',
                        'failure' => 'http://127.0.0.1:8000/failure',
                        'pending' => 'http://127.0.0.1:8000/pending',
                    ],
                    'orderDetails' => [
                        [
                            'title' => 'Order',
                            'amount' => 500,
                            'price' => 10,
                            'vat' => 0,
                            'discount' => 0,
                            'type' => 1,
                        ],
                    ],
                ];

                // Calculate the hash
                $hash = strtoupper(md5($merchantId . '|' . http_build_query($payload) . '|' . $merchantSecret));

                // Add hash to the payload
                $payload['hash'] = $hash;

                // Send request to Paytrail API
                $client = new Client();
                $response = $client->post($url, [
                    'json' => $payload,
                ]);

                // Parse response
                $responseBody = json_decode($response->getBody(), true);

                // Redirect user to payment URL
                return redirect()->away($responseBody['url']);
        }


        if(false){
            $merchantId = 1077442;
            $apiKey = '06d6fe111d8fc325f50ba97379f34693fdb964e0b8617ce4f8f5af5c836ffdc1928e5f78ee9b64f3';
            
            $client = new Client([
                'base_uri' => 'https://api.checkout.fi'
            ]);
            
            try {
                $response = $client->request('POST', '/payments', [
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'X-Verkkomaksut-Api-Version' => 1,
                        'Authorization' => 'Basic ' . base64_encode("$merchantId:$apiKey")
                    ],
                    'json' => [
                        'orderNumber' => '123456',
                        'currency' => 'EUR',
                        'locale' => 'fi_FI',
                        'urlSet' => [
                            'success' => 'http://127.0.0.1:8000/success',
                            'failure' => 'http://127.0.0.1:8000/failure',
                            'pending' => 'http://127.0.0.1:8000/pending',
                            'notification' => 'http://127.0.0.1:8000/notification'
                        ],
                        'orderDetails' => [
                            [
                                'title' => 'Product 1',
                                'amount' => 1,
                                'price' => 10,
                                'vat' => 24
                            ],
                        ]
                    ]
                ]);
            
                $body = $response->getBody();
                echo $body;
            } catch (Exception $e) {
                echo 'Client Exception: ' . $e->getMessage();
            }
        }



        if(false){
                    // Set Paytrail test credentials
                    $merchantId = 1077442;
                    $merchantPass = '06d6fe111d8fc325f50ba97379f34693fdb964e0b8617ce4f8f5af5c836ffdc1928e5f78ee9b64f3';
                    $platformName = 'Pizza Pitsa';
                    
                    // Set payment details
                    $amount = 1500; // Amount is in cents, 15.00 €
                    $stamp = microtime(); // Use any unique value
                    $reference = 'testPayment';
                    $currency = 'EUR';
                    $language = 'FI';
                    $email = 'foobar@nomail.com';
                    $successUrl = 'http://127.0.0.1:8000//success';
                    $cancelledUrl = 'http://127.0.0.1:8000/cancel';

                    // Create customer with minimum values
                    $customer = (new Customer())->setEmail($email);

                    // Set minimum required callback urls
                    $redirectUrls = (new CallbackUrl())->setSuccess($successUrl)->setCancel($cancelledUrl);

                    // Instantiate Paytrail Client
                    $client = new Client($merchantId, $merchantPass, $platformName);

                    // Create payment request with values
                    $paymentRequest = new PaymentRequest();
                    // Set minimum required values
                    $paymentRequest->setAmount($amount)->setStamp($stamp)->setReference($reference)->setCurrency($currency)->setLanguage($language)->setCustomer($customer)->setRedirectUrls($redirectUrls);

                    // Wrap payment creation to try catch block. In case failed payment, response contains error message.
                    try {
                        $payment = $client->createPayment($paymentRequest);
                        return response()->json($payment->getHref());
                    } catch (\Exception $e) {
                        return response()->json(['error' => $e->getMessage()], 500);
                    }
        }
    }

    public function success(Request $request){

    }
    public function cancel(Request $request){

    }
    public function pending(Request $request){

    }
    public function notification(Request $request){

    }
}