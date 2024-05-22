@if(false)

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div class="page-content">
        <div class="container-fluid">
        <div class="aiz-main-content">
            <div class="">
            <div class="card">
                <div class="card-header">
                <h1 class="h2 fs-16 mb-0">Order Details of <span style="color:blue">#{{ $orderDetails->order_number }}</span></h1>
                </div>
                
                <div class="card-body">         
                <div class="row gutters-5">
                    <div class="col-6">
                        <strong>Address Info</strong>
                        <hr>
                        <address>                                 
                        <div class="d-flex justify-content-between">
                            <div>
                            <strong class="text-main"> Name: {{ $orderDetails->name }}</strong>
                            </div>
                            <div>
                            
                            </div>
                            <div>
                            <button class="btn btn-info"  data-bs-toggle="modal" data-bs-target="#myModal"><i class="ri-ball-pen-line" style="color: #fff"></i></button>
                            <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <form action="{{route('address.update')}}" method="post">
                                    @csrf
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <input type="hidden" name="addressId" value="{{ $orderDetails->AddId }}">
                                                <h5 class="modal-title" id="myModalLabel">Edit Address</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                            </div>
                                            <div class="modal-body">
                                                <div>
                                                    <label for="basiInput" class="form-label">Selected Address</label>
                                                    <input type="text" class="form-control" value="{{ $orderDetails->selectedAddress }}" id="selectedAddress" name="selectedAddress" placeholder="Selected Address" required>
                                                </div>                                        
                                                <div>
                                                <label for="basiInput" class="form-label">Entrance</label>
                                                <input type="text" class="form-control" value="{{ $orderDetails->entrance }}" id="entrance" name="entrance" placeholder="Entrance" required>
                                                </div>
                                                <div>
                                                <label for="basiInput" class="form-label">Door Code</label>
                                                <input type="text" class="form-control" value="{{ $orderDetails->door_code }}" id="door_code" name="door_code" placeholder="Door Code" required>
                                                </div>
                                                <div>
                                                <label for="basiInput" class="form-label">Floor</label>
                                                <input type="text" class="form-control" value="{{ $orderDetails->floor }}" id="floor" name="floor" placeholder="Floor" required>
                                                </div>
                                                <div>
                                                <label for="basiInput" class="form-label">Apartment</label>
                                                <input type="text" class="form-control" value="{{ $orderDetails->apartment }}" id="apartment" name="apartment" placeholder="Apartment" required>
                                                </div>
                                                <div>
                                                <label for="basiInput" class="form-label">Comments</label>
                                                <input type="text" class="form-control" value="{{ $orderDetails->comment }}" id="Comment" name="comment" placeholder="Comment" required>
                                                </div>                                     
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary ">Update</button>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>                
                        <br> Email: {{ $orderDetails->email }}<br> 
                        Selected Address: {{ $orderDetails->selectedAddress }}<br> 
                        Entrance: {{ $orderDetails->entrance }}<br> 
                        Door Code: {{ $orderDetails->door_code }}<br> 
                        Floor: {{ $orderDetails->floor }}<br> 
                        Apartment: {{ $orderDetails->apartment }}<br> 
                        Comment: {{ $orderDetails->comment }}<br> 
                    </address>
                    </div>
                    <div class="col-md-4">
                    <strong>Order Info</strong>
                    <hr>
                    <table>
                        <tbody>
                        <tr>
                            <td class="text-main text-bold">Order #</td>
                            <td class="text-info text-bold text-right">{{ $orderDetails->order_number }}</td>
                        </tr>
                        <tr>
                            <td class="text-main text-bold">Order status</td>
                            @foreach (orderStatuses() as $value => $text)
                            <td class="text-main text-bold">                       
                            {{ $value == $orderDetails->order_status ? $text : '' }}                                       
                            </td>
                            @endforeach 
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
                            <td class="text-right">48.450{{ getCurrency() }}</td>
                        </tr>
                        <tr>
                            <td class="text-main text-bold">Payment method</td>
                            <td class="text-right"> Cash On Delivery</td>
                        </tr>                 
                        </tbody>
                    </table>
                    </div>
                </div>
                <hr class="new-section-sm bord-no">

                <div class="row">
                    <div class="col-lg-12 table-responsive">
                    <table class="table-bordered aiz-table invoice-summary table footable footable-1 breakpoint-xl" style="">
                        <thead>
                        <tr class="bg-trans-dark footable-header">
                            <th data-breakpoints="lg" class="min-col footable-first-visible" style="display: table-cell;">#</th>
                            <th width="10%" style="display: table-cell;">Photo</th>
                            <th class="text-uppercase" style="display: table-cell;">Name</th>                  
                            <th data-breakpoints="lg" class="min-col text-uppercase text-center" style="display: table-cell;">Qty</th>
                            <th data-breakpoints="lg" class="min-col text-uppercase text-center" style="display: table-cell;">Price</th>
                            <th data-breakpoints="lg" class="min-col text-uppercase text-center footable-last-visible"
                            style="display: table-cell;">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $item)
                        <tr>
                            <td class="footable-first-visible" style="display: table-cell;">1</td>
                            <td style="display: table-cell;">                     
                                <img height="50" src="{{ asset('frontend/product_images/' . $item->image) }}">                     
                            </td>
                            <td style="display: table-cell;">
                            <strong> {{ $item->proName }}</strong>
                            <br>
                            <small>Size:  {{ $item->sizeName }} </small>
                            <br>
                            <small>Toppings: {{ $item->topingNames }}</small>
                            <br>                  
                            </td>                   
                            <td class="text-center" style="display: table-cell;"> {{ $item->quantity }} </td>
                            <td class="text-center" style="display: table-cell;"> {{ $item->price }}{{ getCurrency() }}</td>
                            <td class="text-center footable-last-visible" style="display: table-cell;"> {{ $item->total_price }}{{ getCurrency() }} </td>
                            <td>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#myModal{{ $item->id }}" class="btn btn-sm btn-info waves-effect waves-light"><i class="ri-ball-pen-line"></i></button>
                            </td> 
                            <!-- Default Modals -->
                            <div id="myModal{{ $item->id }}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myModalLabel">Delete</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                        </div>
                                        <div class="modal-body">
                                        Update Qty of
                                        <strong
                                            style="color: darkorange">{{ $item->proName }}({{ $item->sizeName }})</strong>
                                        ?
                                        </div>
                                        <div class="modal-footer">

                                            <form
                                                action="{{ route('orders.update') }}"
                                                method="post">
                                                @csrf                                    
                                                <input type="hidden" value="{{ $item->order_number }}" name="order_id">                
                                                <input type="hidden" value="{{ $item->product_id }}" name="product_id">                
                                                <input type="text" name="qty" class="form-control" value="{{ $item->quantity }}" id="">
                                                <button type="submit" class="btn btn-info">Update</button>

                                            </form>
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                        </div>

                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal --> 
                        </tr>
                        @endforeach
                        
                        </tbody>
                    </table>
                    </div>
                </div>
                <div class="clearfix float-right" style="width: 300px; float:right">
                    <table class="table">
                    <tbody>
                        <tr>
                        <td>
                            <strong class="text-muted">Sub Total :</strong>
                        </td>
                        <td> {{ $order->total_amount }}{{ getCurrency() }} </td>
                        </tr>
                        <tr>
                        <td>
                            <strong class="text-muted">Tax :</strong>
                        </td>
                        <td> 0.950{{ getCurrency() }} </td>
                        </tr>
                        @if($order->delivery_charge)
                        <tr>
                        <td>
                            <strong class="text-muted">Shipping :</strong>
                        </td>
                        <td> {{ $order->delivery_charge }}{{ getCurrency() }} </td>
                        </tr>
                        @endif
                        @if($order->discount)
                        <tr>
                        <td>
                            <strong class="text-muted">Coupon :</strong>
                        </td>
                        <td> {{ $order->discount }}{{ getCurrency() }} </td>
                        </tr>
                        @endif
                        <tr>
                        <td>
                            <strong class="text-muted">Total :</strong>
                        </td>
                        <td class="text-muted h5"> {{ $order->paid_amount }}{{ getCurrency() }} </td>
                        </tr>
                    </tbody>
                    </table>
                    <div class="no-print text-right">
                    <a href="https://demo.activeitzone.com/ecommerce/invoice/79" type="button" class="btn btn-icon btn-light">
                        <i class="las la-print"></i>
                    </a>
                    </div>
                </div>
                </div>
            </div>
            </div>  
        </div>
    </div>
    
</body>
</html>

@endif

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
        
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>
                <img style="width: 100px;" src="http://127.0.0.1:8000/frontend/assets/images/logo/2%20pizza%20logo-02.png" alt="">
                <span style="width: 100%; text-align: center; margin-left: 120px;">Order Confirmation</span>
            </h1>
        </div>
        <div class="order-details">
            <h2>Thank you for your order!</h2>

            <div class="row">
                    <div class="col-6">
                        <strong>Order Info</strong>
                        <hr>
                        <table>
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
                                <td class="text-right">48.450{{ getCurrency() }}</td>
                            </tr>
                            <tr>
                                <td class="text-main text-bold">Payment Type</td>
                                <td class="text-right"> {{$orderDetails->payment_type == 1 ? 'Online Pay' : 'Cash On Delivery'}}</td>
                            </tr>
                            <tr>
                                <td class="text-main text-bold">Payment Status</td>
                                <td class="text-right"> {{$orderDetails->payment_type == 1 ? 'Paied' : 'Not Paied'}}</td>
                            </tr>
                            @if($orderDetails->payment_type == 1 && isset($data['checkout-transaction-id']))
                                <tr>
                                    <td class="text-main text-bold">Transation Id</td>
                                    <td class="text-right"> {{$data['checkout-transaction-id']}}</td>
                                </tr>
                            @endif                 
                            </tbody>
                        </table>
                    </div>
                    <div class="col-6">
                        @if( $orderDetails->type==1)
                        <strong>Delivery Info</strong>
                        @endif
                        @if( $orderDetails->type==2)
                        <strong>Customer Info</strong>
                        @endif
                        <hr>

                        <table>
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
            <div class="">
              <table class="" style="">
                <thead>
                  <tr class="">
                    <th data-breakpoints="lg" class="" style="display: table-cell;">#</th>
                    <th width="10%" style="display: table-cell;">Photo</th>
                    <th class="" style="display: table-cell;">Name</th>                  
                    <th data-breakpoints="lg" class="" style="display: table-cell;">Qty</th>
                    <th data-breakpoints="lg" class="" style="display: table-cell;">Price</th>
                    <th data-breakpoints="lg" class=""
                      style="display: table-cell;">Total</th>
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
                      <small>Toppings: {{ $item->topingNames }}</small>
                      <br>                  
                    </td>                   
                    <td class="" style="display: table-cell;"> {{ $item->quantity }} </td>
                    <td class="" style="display: table-cell;"> {{ $item->price }}{{ getCurrency() }}</td>
                    <td class="" style="display: table-cell;"> {{ $item->total_price }}{{ getCurrency() }} </td>
                    <td>
                      <button type="button" data-bs-toggle="modal" data-bs-target="#myModal{{ $item->id }}" class="btn btn-sm btn-info waves-effect waves-light"><i class="ri-ball-pen-line"></i></button>
                    </td> 
                       <!-- Default Modals -->
                       <div id="myModal{{ $item->id }}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="">
                            <div class="">
                                <div class="">
                                    <h5 class="" id="myModalLabel">Delete</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                </div>
                                <div class="">
                                  Update Qty of
                                  <strong
                                      style="color: darkorange">{{ $item->proName }}({{ $item->sizeName }})</strong>
                                  ?
                                </div>
                                <div class="">

                                    <form
                                        action="{{ route('orders.update') }}"
                                        method="post">
                                        @csrf                                    
                                        <input type="hidden" value="{{ $item->order_number }}" name="order_id">                
                                        <input type="hidden" value="{{ $item->product_id }}" name="product_id">                
                                        <input type="text" name="qty" class="form-control" value="{{ $item->quantity }}" id="">
                                        <button type="submit" class="">Update</button>

                                    </form>
                                    <button type="button" class="" data-bs-dismiss="modal">Close</button>
                                </div>

                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal --> 
                  </tr>
                @endforeach
                 
                </tbody>
              </table>
            </div>
          </div>
          <div class="" style="width: 300px; float:right">
            <table class="table">
              <tbody>
                <tr>
                  <td>
                    <strong >Sub Total :</strong>
                  </td>
                  <td> {{ $order->total_amount }}{{ getCurrency() }} </td>
                </tr>
                <tr>
                  <td>
                    <strong>Tax :</strong>
                  </td>
                  <td> 0.950{{ getCurrency() }} </td>
                </tr>
                @if($order->delivery_charge)
                <tr>
                  <td>
                    <strong >Shipping :</strong>
                  </td>
                  <td> {{ $order->delivery_charge }}{{ getCurrency() }} </td>
                </tr>
                @endif
                @if($order->discount)
                <tr>
                  <td>
                    <strong >Coupon :</strong>
                  </td>
                  <td> {{ $order->discount }}{{ getCurrency() }} </td>
                </tr>
                @endif
                <tr>
                  <td>
                    <strong >Total :</strong>
                  </td>
                  <td > {{ $order->paid_amount }}{{ getCurrency() }} </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div><br><br><br><br><br><br><br><br><br>
        <div class="footer" style="display:block;">
            <p>If you have any questions, please contact us at <a href="mailto:info@pizzapitsa.fi">info@pizzapitsa.fi</a></p>
            <p>&copy; 2024 Pizzapitsa. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
