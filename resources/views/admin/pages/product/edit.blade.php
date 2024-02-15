@extends('admin.layout.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">          
            <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header align-items-center d-flex">
                      <h4 class="card-title mb-0 flex-grow-1">Edit Product</h4>
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
                                    }, 2000);
                                </script>
                            @endif
                            <form action="{{ route('products.update',$product->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-xxl-3 col-md-6 mb-3">
                                        <label for="name" class="form-label">Product Name</label>
                                        <input type="text" class="form-control" id="name" value="{{ $product->name }}" name="name" placeholder="Enter product name" required>
                                    </div>   
                                    <div class="col-xxl-3 col-md-6 mb-3">
                                        <label for="name" class="form-label">Category</label>
                                        <select class="form-select mb-3" name="category">
                                            @foreach ($categories as $item)
                                                <option selected>--Select Category--</option>
                                                <option {{ $product->category_id == $item->id ?'selected':'' }} value="{{ $item->id }}">{{ $item->name }}</option>   
                                            @endforeach                                                                                                                                                                           
                                        </select>
                                    </div>                                   
                                    <!-- <div class="col-xxl-3 col-md-6 mb-3">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="text" class="form-control" id="price" name="price" placeholder="Enter product price" value="{{ $product->price  }}" required>
                                    </div> -->
                                    <div class="col-xxl-3 col-md-6 mb-3">
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <input type="text" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity  }}" placeholder="Enter product quantity" required>
                                    </div>                                  
                                    <div class="col-xxl-3 col-md-6 mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select mb-3" name="status">
                                            <option  {{ $product->status=='1'?'selected':''  }} selected="" value="1">Actve</option>                                            
                                            <option  {{ $product->status=='0'?'selected':''  }} value="0">InActve</option>                                            
                                        </select>
                                    </div> 
                                    <div class="col-xxl-12 col-md-12 mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" id="editor" name="description" placeholder="Enter product description" rows="3">{!! $product->description !!}</textarea>
                                    </div>                                                                                                      
                                    <div class="col-xxl-3 col-md-6 mb-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" multiple class="form-control" id="image" name="images[]">
                                    </div> 
                                    <ul>                                         
                                        <ul class="list-group list-group-horizontal">
                                            @foreach ($productImages as $item)
                                            <li class="list-group-item"><img width="60px" height="60px" src="{{ asset('frontend/product_images/' . $item->image) }}" alt="Product Image"></li>
                                            @endforeach                                          
                                        </ul>                                       
                                    </ul>                                  
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