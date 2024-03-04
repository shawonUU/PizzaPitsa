@extends('admin.layout.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
      {{-- <div class="row">
             <div class="col-lg-12">
                 <div class="card">
                     @if(session('sweet_alert'))
                         
                     <script>
                             Swal.fire({
                                 icon: '{{ session('sweet_alert.type') }}', title: '{{ session('sweet_alert.title') }}', text: '{{ session('sweet_alert.text') }}', }); </script> @endif <div class="card-header align-items-center d-flex">
        <h4 class="card-title mb-0 flex-grow-1">Topings</h4>
        <div class="flex-shrink-0">
          <div class="form-check form-switch form-switch-right form-switch-md">
            <a href="{{ route('topings.create') }}" class="btn btn-info">Create Toping</a>
          </div>
        </div>
      </div>
      <!-- end card header -->
      <div class="card-body">
        <div class="live-preview">
          <div class="row gy-4">
            <table class="table" id="dataTbl">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Order Number</th>
                  <th>Order By</th>
                  <th>Order Type</th>
                  <th>Total amount</th>
                  <th>Paid amount</th>
                  <th>Adress</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody> @foreach ($orders as $item) <tr>
                  <th>{{ $loop->index+1 }}</th>
                  <td>{{ $item->order_number }}</td>
                  <td>{{ getUser($item->customer_id) }}</td>
                  <td>{{ $item->type =='2'?'Pickup/Dine in':'Delivery' }}</td>
                  <td>{{ $item->total_amount }}</td>
                  <td>{{ $item->paid_amount }}</td>
                  <td>{{ $item->delivery_address_id }}</td>
                  <td>
                    <select class="form-select rounded-pill mb-3" onchange="updateStatus('{{ $item->order_number }}',this.value)"> @foreach (orderStatuses() as $value => $text) <option {{ $value == $item->order_status ? 'selected' : '' }} value="{{ $value }}">{{ $text }}</option> @endforeach </select>
                  </td>
                  <td>
                    <a class="btn btn-info" href="{{ route('order.details',$item->order_number) }}">Details</a>
                  </td>
                </tr> @endforeach </tbody>
            </table>
          </div>
          <!--end row-->
        </div>
      </div>
    </div>
  </div>
  <!--end col-->
  </div>
  </div>
  <!-- container-fluid --> --}} 
  <div class="aiz-main-content">
    <div class="">
      <div class="card">
        <div class="card-header">
          <h1 class="h2 fs-16 mb-0">Order Details of <span style="color:blue">#{{ $orderDetails->order_number }}</span></h1>
        </div>
        @if(session('sweet_alert'))
            <script>
                Swal.fire({
                    icon: '{{ session('sweet_alert.type') }}',
                    title: '{{ session('sweet_alert.title') }}',
                    text: '{{ session('sweet_alert.text') }}',
                });
            </script>
        @endif
        <div class="card-body">
          <div class="row ">            
            <!--Assign Delivery Boy-->
            <div class="col-md-3">
              <label for="assign_deliver_boy">Assign Deliver Boy</label>             
                <select class="form-select mb-3" aria-label="Default select example">
                    <option selected="">Select your Status </option>
                    <option value="1">Declined Payment</option>
                    <option value="2">Delivery Error</option>
                    <option value="3">Wrong Amount</option>
                </select>                     
            </div>
            <div class="col-md-3">
              <label for="update_payment_status">Payment Status</label>             
                <select class="form-control" data-minimum-results-for-search="Infinity" id="update_payment_status" tabindex="-98">
                  <option value="unpaid" selected=""> Unpaid </option>
                  <option value="paid"> Paid </option>
                </select>                          
            </div>
            <div class="col-md-3">
              <label for="update_delivery_status">Order Status</label>             
                <select class="form-control" data-minimum-results-for-search="Infinity" onchange="updateStatus('{{ $orderDetails->order_number }}',this.value)" id="update_delivery_status" tabindex="-98">
                  @foreach (orderStatuses() as $value => $text)
                      <option {{ $value == $orderDetails->order_status ? 'selected' : '' }} value="{{ $value }}">{{ $text }}</option>                                            
                  @endforeach    
                </select>                         
            </div>          
          </div>          
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
                      {{ $orderDetails->typem == '1' ?'Home Delivery':'Dine in or Pickup' }}                                     
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
           
          </div>
          {{-- <div class="clearfix float-right">
            <table class="table">
              <tbody>
                <tr>
                  <td>
                    <strong class="text-muted">Sub Total :</strong>
                  </td>
                  <td> $47.500 </td>
                </tr>
                <tr>
                  <td>
                    <strong class="text-muted">Tax :</strong>
                  </td>
                  <td> $0.950 </td>
                </tr>
                <tr>
                  <td>
                    <strong class="text-muted">Shipping :</strong>
                  </td>
                  <td> $0.000 </td>
                </tr>
                <tr>
                  <td>
                    <strong class="text-muted">Coupon :</strong>
                  </td>
                  <td> $0.000 </td>
                </tr>
                <tr>
                  <td>
                    <strong class="text-muted">Total :</strong>
                  </td>
                  <td class="text-muted h5"> $48.450 </td>
                </tr>
              </tbody>
            </table>
            <div class="no-print text-right">
              <a href="https://demo.activeitzone.com/ecommerce/invoice/79" type="button" class="btn btn-icon btn-light">
                <i class="las la-print"></i>
              </a>
            </div>
          </div> --}}

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
                  <td> 47.500{{ getCurrency() }} </td>
                </tr>
                <tr>
                  <td>
                    <strong class="text-muted">Tax :</strong>
                  </td>
                  <td> 0.950{{ getCurrency() }} </td>
                </tr>
                <tr>
                  <td>
                    <strong class="text-muted">Shipping :</strong>
                  </td>
                  <td> 0.000{{ getCurrency() }} </td>
                </tr>
                <tr>
                  <td>
                    <strong class="text-muted">Coupon :</strong>
                  </td>
                  <td> 0.000{{ getCurrency() }} </td>
                </tr>
                <tr>
                  <td>
                    <strong class="text-muted">Total :</strong>
                  </td>
                  <td class="text-muted h5"> 48.450{{ getCurrency() }} </td>
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

@section('script')
  <script>
    function updateStatus(orderId, newStatus){
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        
        // Set CSRF token in the request headers
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });
        
        $.ajax({
            url: '/admin/update-status',
            method: 'POST',
            data: {
                orderId: orderId,
                newStatus: newStatus
            },
            success: function(response) {
                // Handle success response
                console.log(response);
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error('Error updating status:', error);
            }
        });     
    }
  </script>
@endsection
@endsection




