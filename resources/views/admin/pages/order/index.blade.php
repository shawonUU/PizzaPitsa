@extends('admin.layout.app')

@section('content')
<style>
  #toaster-container {
    position: fixed;
    bottom: 20px;
    right: 20px;
    max-width: 300px;
    background-color: #333;
    color: #fff;
    padding: 15px;
    border-radius: 5px;
    display: none;
  }
</style>
    <div id="toaster-container"></div>
    <div class="page-content">
        <div class="container-fluid">
          
            <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    @if(session('sweet_alert'))
                        <script>
                            Swal.fire({
                                icon: '{{ session('sweet_alert.type') }}',
                                title: '{{ session('sweet_alert.title') }}',
                                text: '{{ session('sweet_alert.text') }}',
                            });
                        </script>
                    @endif
                    <div class="card-header align-items-center d-flex">
                      <h4 class="card-title mb-0 flex-grow-1">All Orders</h4>
                      <div class="flex-shrink-0">
                        {{-- <div class="form-check form-switch form-switch-right form-switch-md">
                            <a href="{{ route('topings.create') }}" class="btn btn-info">Create Toping</a>
                        </div> --}}
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
                                    <th>Payable Amount</th>                                                                                                     
                                    <th>Payment Status</th>                                                                                                     
                                    {{-- <th>Adress</th> --}}
                                    <th>Status</th>                                   
                                    <th>Action</th>                                   
                                  </tr>
                                </thead>
                                <tbody id="tbodyContainer">
                                @foreach ($orders as $item)
                                <tr>
                                    <th class="orderSl">{{ $loop->index+1 }}</th>                                    
                                    <td>{{ $item->order_number }}</td>                                   
                                    <td>{{ getUser($item->customer_id) }}</td>                                  
                                    <td>{{ $item->type =='2'?'Pickup/Dine in':'Delivery' }}</td>                                  
                                    <td>{{ $item->total_amount }}</td>                                  
                                    <td>{{ $item->paid_amount }}</td>                                                                
                                    <td>{{ $item->is_paid == '0'?'Unpaid':'Paid' }}</td>                                                                
                                    {{-- <td>{{ $item->delivery_address_id }}</td>                                   --}}
                                    <td>
                                      @php                                    
                                          $orderStatuses = orderStatuses();
                                          $status = $orderStatuses[$item->order_status] ?? 'Unknown Status';
                                      @endphp
                                      {{ $status }}
                                    </td> 
                                    <td>
                                        <a class="btn btn-info" href="{{ route('order.details',$item->order_number) }}">Details</a>    
                                    </td>                                                                                                                                                                                                 
                                  </tr>
                                @endforeach
                                </tbody>
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
        <!-- container-fluid -->
    </div>

@section('script')
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
  var pusher = new Pusher('{{ env("PUSHER_APP_KEY") }}', {
      cluster: '{{ env("PUSHER_APP_CLUSTER") }}',
      encrypted: true
  });
  var channel = pusher.subscribe('order');
  channel.bind('place-order', function(data) {
      var oldItem = document.getElementById('tbodyContainer').innerHTML;
      document.getElementById('tbodyContainer').innerHTML = data.order+oldItem;

      var elements = document.getElementsByClassName("orderSl");
      for (var i = 0; i < elements.length; i++) {
        elements[i].innerHTML = i+1;
      }
      showToaster('New order added.');
  });
</script>


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

<script>
  // Function to show the toaster
  function showToaster(message) {
    var toaster = document.createElement('div');
    toaster.id = 'toaster';
    toaster.innerHTML = message;
    document.getElementById('toaster-container').appendChild(toaster);
    document.getElementById('toaster-container').style.display = 'block';
    setTimeout(function () {
      hideToaster();
    }, 3000);
  }
  showToaster('New order added.');
  function hideToaster() {
    var toaster = document.getElementById('toaster');
    toaster.parentNode.removeChild(toaster);
    document.getElementById('toaster-container').style.display = 'none';
  }
</script>
@endsection
@endsection





