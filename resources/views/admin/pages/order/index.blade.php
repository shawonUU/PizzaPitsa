@extends('admin.layout.app')

@section('content')
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
                                <tbody>
                                @foreach ($orders as $item)
                                <tr>
                                    <th>{{ $loop->index+1 }}</th>                                    
                                    <td>{{ $item->order_number }}</td>                                   
                                    <td>{{ getUser($item->customer_id) }}</td>                                  
                                    <td>{{ $item->type =='2'?'Pickup/Dine in':'Delivery' }}</td>                                  
                                    <td>{{ $item->total_amount }}</td>                                  
                                    <td>{{ $item->paid_amount }}</td>                                                                
                                    <td>{{ $item->delivery_address_id }}</td>                                  
                                    <td>
                                        <select class="form-select rounded-pill mb-3" onchange="updateStatus('{{ $item->order_number }}',this.value)">
                                            @foreach (orderStatuses() as $value => $text)
                                                <option {{ $value == $item->order_status ? 'selected' : '' }} value="{{ $value }}">{{ $text }}</option> 
                                            @endforeach                                                                                 
                                        </select>
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





