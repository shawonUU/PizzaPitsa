
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            background-color: #ee6e2d;
            color: #ffffff;
            padding: 10px;
            /* text-align: center; */
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        .header h1 {
            margin: 0;
        }
        .order-details {
            padding: 20px;
            border-bottom: 1px solid #dddddd;
        }
        .order-details h2 {
            margin-top: 0;
        }
        .order-details p {
            margin: 5px 0;
        }
        .order-summary {
            padding: 20px;
        }
        .order-summary h2 {
            margin-top: 0;
        }
        .order-summary table {
            width: 100%;
            border-collapse: collapse;
        }
        .order-summary table, .order-summary th, .order-summary td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }
        .footer {
            background-color: #f4f4f4;
            color: #555555;
            padding: 10px;
            text-align: center;
            font-size: 12px;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }
        .footer p {
            margin: 5px 0;
        }
        .footer a {
            color: #007BFF;
            text-decoration: none;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }
        .col-6 {
            flex: 0 0 50%;
            max-width: 50%;
            /* padding-right: 15px;
            padding-left: 15px; */
        }
        .col-6 > div {
            background-color: lightgray;
            padding: 20px;
            margin: 5px 0;
            text-align: center;
        }
        /* .table-responsive{display:block;width:100%;overflow-x:auto;-webkit-overflow-scrolling:touch}
        .table-responsive>.table-bordered{border:0} */
        
    </style>
</head>
<body>
    @php
        //dd($orderDetails);
    @endphp
    <div class="container">
        <div class="header">
            <img style="width: 100px;" src="{{asset('frontend/assets/images/logo/2%20pizza%20logo-02.png')}}" alt="">
            <h4 style="margin:0px; text-align: center;">Order Confirmation</h4>
        </div>
        <div class="order-details">
            <h2>Thank you for your order!</h2>

            <div class="row">
                    <div class="col-6 table-responsive">
                        <strong>Order Info</strong>
                        <hr>
                        <table class="class">
                            <tbody>
                            <tr>
                                <td class="text-main text-bold">Order </td>
                                <td class="text-info text-bold text-right">#{{ $orderDetails->order_number }}</td>
                            </tr>
                            <tr>
                                <td class="text-main text-bold">Order status</td>
                                <td class="text-main text-bold">                       
                                {{ orderStatuses()[$orderDetails->order_status] }}                                       
                                </td>
                            </tr>
                            <tr>
                                <td class="text-main text-bold">Order Type</td>
                                <td class="text-main text-bold">                       
                                {{ $orderDetails->type == '1' ?'Home Delivery':'Dine in or Pickup' }}                                     
                                </td>                    
                            </tr>
                            
                            <tr>
                                <td class="text-main text-bold">Order date </td>
                                <td class="text-right">{{ \Carbon\Carbon::parse($orderDetails->created_at)->format('F j, Y \a\t g:i A') }}</td>
                            </tr>
                            <tr>
                                <td class="text-main text-bold"> Total amount </td>
                                <td class="text-right">{{ $orderDetails->paid_amount }} {{ getCurrency() }}</td>
                            </tr>
                            <tr>
                                <td class="text-main text-bold">Payment Type</td>
                                <td class="text-right"> {{$orderDetails->payment_type == 2 ? 'Online Pay' : 'Cash On Delivery'}}</td>
                            </tr>
                            <tr>
                                <td class="text-main text-bold">Payment Status</td>
                                <td class="text-right"> {{$orderDetails->payment_type == 2 ? 'Paid' : 'Not Paid'}}</td>
                            </tr>
                            @if($orderDetails->payment_type == 2 && isset($data['checkout-transaction-id']))
                                <tr>
                                    <td class="text-main text-bold">Transation Id</td>
                                    <td class="text-right"> {{$data['checkout-transaction-id']}}</td>
                                </tr>
                            @endif                 
                            </tbody>
                        </table>
                    </div>
                    <div class="col-6 table-responsive">
                        @if( $orderDetails->type==1)
                        <strong>Delivery Info</strong>
                        @endif
                        @if( $orderDetails->type==2)
                        <strong>Customer Info</strong>
                        @endif
                        <hr>

                        <table class="class">
                            <tr>
                                <td>Name:</td>
                                <td>{{ $orderDetails->name }}</td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td>{{ $orderDetails->email }}</td>
                            </tr>
                            @if( $orderDetails->type==1)
                            <tr>
                                <td>Address:</td>
                                <td>{{ $orderDetails->selectedAddress }}</td>
                            </tr>
                            <tr>
                                <td>Entrance:</td>
                                <td>{{ $orderDetails->entrance }}</td>
                            </tr>
                            <tr>
                                <td>Door Code:</td>
                                <td>{{ $orderDetails->door_code }}</td>
                            </tr>
                            <tr>
                                <td>Floor: </td>
                                <td>{{ $orderDetails->floor }}</td>
                            </tr>
                            <tr>
                                <td>Apartment: </td>
                                <td>{{ $orderDetails->apartment }}</td>
                            </tr>
                            <tr>
                                <td> Comment: </td>
                                <td>{{ $orderDetails->comment }}</td>
                            </tr>
                            @endif
                        </table>

                    </div>
                </div>

        </div>
        <div class="order-summary">
            <h2>Order Summary</h2>
            <div class="">
            <div class="table-responsive">
              <table class="table" style="">
                <thead>
                  <tr class="">
                    <th data-breakpoints="lg" class="" style="display: table-cell;">#</th>
                    <th width="10%" style="display: table-cell;">Photo</th>
                    <th class="" style="display: table-cell;">Name</th>                  
                    <th data-breakpoints="lg" class="" style="display: table-cell;">Qty</th>
                    <th data-breakpoints="lg" class="" style="display: table-cell;">Price</th>
                    <th data-breakpoints="lg" class="" style="display: table-cell;">T.P Price</th>
                    <th data-breakpoints="lg" class="" style="display: none;">O. Price</th>
                    <th data-breakpoints="lg" class="" style="display: table-cell;">T. Price</th>
                    <th data-breakpoints="lg" class="" style="display: table-cell;">Price</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($products as $item)
                <tr>
                    <td class="" style="display: table-cell;">1</td>
                    <td style="display: table-cell;">                     
                        <img height="50" src="{{ asset('frontend/product_images/' . $item->image) }}">                     
                    </td>
                    <td style="display: table-cell;">
                        <strong> {{ $item->proName }}</strong>
                        <br>
                        <small>Size:  {{ $item->sizeName }} </small>
                        <br>
                        <small>Toppings: {{ $item->optionNames }}</small>
                        <br>
                        <small>Options: {{ $item->topingNames }}</small>
                        <br>
                        <small>Tags: {{ $item->tagNames }}</small>
                      <br>                  
                    </td>                   
                    <td class="" style="display: table-cell;"> {{ $item->quantity }} </td>
                    <td class="" style="display: table-cell;"> {{ $item->price }}{{ getCurrency() }}</td>
                    <td class="" style="display: table-cell;"> {{ $item->price  * $item->quantity }}{{ getCurrency() }} </td>`
                    <td class="" style="display: none;"> {{ $item->option_price }}{{ getCurrency() }} </td>
                    <td class="" style="display: table-cell;"> {{ ($item->toping_price * 1) + ($item->option_price * 1) }}{{ getCurrency() }} </td>
                    <td class="" style="display: table-cell;"> {{ ($item->price  * $item->quantity) + $item->option_price + $item->toping_price }}{{ getCurrency() }} </td>
                  </tr>
                @endforeach
                @if($orderDetails->delivery_charge > 0 || $orderDetails->discount > 0)
                <tr>
                    <td colspan="8" style="text-align:right;">Sub Total</td>
                    <td>{{$orderDetails->paid_amount + $orderDetails->discount - $orderDetails->delivery_charge}}</td>
                </tr>
                @endif
                @if($order->delivery_charge)
                <tr>
                  <td colspan="8" style="text-align:right;">Shipping :</td>
                  <td> {{ $order->delivery_charge }}{{ getCurrency() }} </td>
                </tr>
                @endif
                @if($order->discount)
                <tr>
                  <td colspan="8" style="text-align:right;">Coupon :</td>
                  <td> {{ $order->discount }}{{ getCurrency() }} </td>
                </tr>
                @endif
                @if($order->paid_amount)
                <tr>
                  <td colspan="8" style="text-align:right;">Total :</td>
                  <td> {{ $order->paid_amount }}{{ getCurrency() }} </td>
                </tr>
                @endif
                 
                </tbody>
              </table>
            </div>
          </div>
        </div><br><br><br><br><br><br><br><br><br>
        <div class="footer" style="display:block;">
            <p>If you have any questions, please contact us at <a href="mailto:info@pizzapitsa.fi">info@pizzapitsa.fi</a></p>
            <p>&copy; 2024 Pizzapitsa. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
