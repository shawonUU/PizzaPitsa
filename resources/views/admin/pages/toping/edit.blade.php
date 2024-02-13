@extends('admin.layout.app')
@section('content')
    <div class="page-content">
        <div class="container-fluid">          
            <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header align-items-center d-flex">
                      <h4 class="card-title mb-0 flex-grow-1">Edit Toping</h4>
                      <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <a href="{{ route('topings.index') }}" class="btn btn-info">Toping List</a>
                        </div>
                      </div>
                    </div>
                    <!-- end card header -->
                    <div class="card-body">
                      <div class="live-preview">
                        <div class="row gy-4">
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
                            <form action="{{ route('topings.update',$toping->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-xxl-3 col-md-6 mb-3">
                                        <label for="name" class="form-label">Toping Name</label>
                                        <input type="text" class="form-control" id="name" value="{{ $toping->name }}" name="name" placeholder="Enter Toping name" required>
                                    </div>                                                                       
                                    <div class="col-xxl-3 col-md-6 mb-3">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="text" class="form-control" id="price" name="price" placeholder="Enter Toping price" value="{{ $toping->price  }}" required>
                                    </div>                                                                      
                                    <div class="col-xxl-3 col-md-6 mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select mb-3" name="status">
                                            <option  {{ $toping->status=='1'?'selected':''  }} selected="" value="1">Actve</option>                                            
                                            <option  {{ $toping->status=='0'?'selected':''  }} value="0">InActve</option>                                            
                                        </select>
                                    </div>                                                                                                                                         
                                    <div class="col-xxl-3 col-md-6 mb-3">
                                        <label for="image" class="form-label">Image URL</label>
                                        <input type="file" multiple class="form-control" id="image" name="images">
                                        <img width="60px" height="60px" src="{{ asset('frontend/toping_images/' . $toping->image) }}" alt="Product Image">
                                    </div>                                                                   
                                </div>
                                <button type="submit" class="btn btn-primary float-end">Submit</button>
                            </form>
                                               
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
    ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
        console.error(error);
    });

</script>
@endsection
@endsection