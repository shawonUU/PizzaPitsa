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
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header align-items-center d-flex">
                      <h4 class="card-title mb-0 flex-grow-1">Create Product</h4>
                      <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <a href="{{ route('products.index') }}" class="btn btn-info">Product List</a>
                        </div>
                      </div>
                    </div>
                    <!-- end card header -->
                    <div class="card-body">
                      <div class="live-preview">
                        <div class="row gy-4">
                            <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xxl-3 col-md-6 mb-3">
                                        <label for="name" class="form-label">Product Name</label>
                                        <input type="text" class="form-control" value="{{ old('name') }}" id="name" name="name" placeholder="Enter product name" >
                                    </div>   
                                    <div class="col-xxl-3 col-md-6 mb-3">
                                        <label for="name" class="form-label">Category</label>
                                        <select class="form-select mb-3" name="category">
                                            <option selected>--Select Category--</option>
                                            @foreach ($categories as $item)                                               
                                                <option {{ old('category') == $item->id ? 'selected':''}} value="{{ $item->id }}">{{ $item->name }}</option>   
                                            @endforeach                                                                                                                                                                           
                                        </select>
                                    </div>                                   
                                    <!-- <div class="col-xxl-3 col-md-6 mb-3">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="text" class="form-control" id="price" name="price" placeholder="Enter product price" >
                                    </div> -->
                                    <div class="col-xxl-3 col-md-6 mb-3">
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <input type="text" class="form-control" value="{{ old('quantity') }}" id="quantity" name="quantity" placeholder="Enter product quantity" >
                                    </div>                                  
                                    <div class="col-xxl-3 col-md-6 mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select mb-3" name="status">
                                            <option selected="" value="1">Actve</option>                                            
                                            <option value="0">InActve</option>                                            
                                        </select>
                                    </div> 
                                    <div class="col-xxl-12 col-md-12 mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" id="editor" name="description" placeholder="Enter product description" rows="3">{{ old('description')}}</textarea>
                                    </div>                                                                                                      
                                    <div class="col-xxl-3 col-md-6 mb-3">
                                        <label for="image" class="form-label">Image(366x366)</label>
                                        <input type="file" multiple class="form-control" id="image" name="images">
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