@extends('admin.layout.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            @if ($errors->any())
            <div class="alert alert-danger" id="validation-error-alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

            <script>
                // Set a timeout to hide the alert after 2000 milliseconds (2 seconds)
                setTimeout(function () {
                    document.getElementById('validation-error-alert').style.display = 'none';
                }, 3000);
            </script>
        @endif
            <div class="row">
                <div class="col">
                    <div class="card p-3">
                        <form action="{{route('location.store')}}" method="post">
                            @csrf
                            <div class="row">                                                              
                                <div class="col-12 col-md-6 col-lg-3">                                        
                                    <label for="discount" class="form-label">Longitude</label>
                                    <input type="text" class="form-control" id="code" name="longitude" placeholder="Longitude" required>
                                </div>                                                    
                                <div class="col-12 col-md-6 col-lg-3">                                        
                                    <label for="discount" class="form-label">Latitude</label>
                                    <input type="text" class="form-control" id="code" name="latitude" placeholder="Latitude" required>
                                </div>                              
                                <div class="col-12 col-md-6 col-lg-4">
                                    <label for="basiInput" class="form-label">Status</label>
                                    <select name="status" id="" class="form-control">
                                        @foreach (getStatus() as $key => $status) 
                                            <option value="{{$key}}" {{$key == 1 ? 'selected' : ''}}>{{$status}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="d-flex flex-row-reverse bd-highlight">
                                    <button type="submit" class="btn btn-primary mt-1">Add Location</button>
                                </div>
                            </div>
                        </form>

                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Location List</h4>
                        </div>

                        <div class="card-body">
                            <table class="table table-stripedw-100">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>  
                                        <th scope="col">Longitude</th>                                    
                                        <th scope="col">Latitude</th>                                    
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($coupons as $coupon)
                                    <tr>
                                        <th scope="row">{{$loop->index+1}}</th>
                                        <td>{{$coupon->longitude}}</td>                                                                                                                 
                                        <td>{!! $coupon->latitude !!}</td>                                      
                                        <td>{{getStatus()[$coupon->status]}}</td>
                                        <td>
                                            <button onclick="handleEditor({{ $coupon->id }})" class="btn btn-sm btn-primary" title="Edit" data-bs-toggle="modal" data-bs-target="#ctegory{{$coupon->id}}">
                                                <i class="bx bx-edit"></i>
                                            </button>
                                            <div id="ctegory{{$coupon->id}}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <form action="{{ route('location.update', $coupon->id) }}" method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            
                                                            <div class="modal-body">
                                                                <div class="col-12 col-md-6 col-lg-12">                                        
                                                                    <label for="discount" class="form-label">Longitude</label>
                                                                    <input type="text" class="form-control" value="{{ $coupon->longitude }}" id="code" name="longitude" placeholder="Longitude" required>
                                                                </div>                                                    
                                                                <div class="col-12 col-md-6 col-lg-12">                                        
                                                                    <label for="discount" class="form-label">Latitude</label>
                                                                    <input type="text" class="form-control" value="{{ $coupon->latitude }}" id="code" name="latitude" placeholder="Latitude" required>
                                                                </div>                                         
                                                                <div class="col-12 col-md-6 col-lg-12">
                                                                    <label for="basiInput" class="form-label">Status</label>
                                                                    <select name="status" id="" class="form-control">
                                                                        @foreach (getStatus() as $key => $status) 
                                                                            <option value="{{$key}}" {{$coupon->status == 1 ? 'selected' : ''}}>{{$status}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="modal-footer">                                                                
                                                                <button type="submit" class="btn btn-primary ">Save</button>
                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </form>
                                            </div>


                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @section('script')
    <script>
        ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });    
    </script>
    <script>
        function handleEditor(id) {          
            ClassicEditor
            .create(document.querySelector('#ueditor'+id))
            .catch(error => {
                console.error(error);
            });
        }   
    </script>
    @endsection
@endsection