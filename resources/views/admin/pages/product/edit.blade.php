@extends('admin.layout.app')

@section('content')

<style>
    .preview-image {
        max-width: 100%;
        height: auto;
        margin-bottom: 10px;
    }
</style>
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
                                    <div class="col-xxl-4 col-md-6 mb-3">
                                        <label for="name" class="form-label">Product Name</label>
                                        <input type="text" class="form-control" id="name" value="{{ $product->name }}" name="name" placeholder="Enter product name" required>
                                    </div>   
                                    <div class="col-xxl-3 col-md-6 mb-3">
                                        <label for="name" class="form-label">Category</label>
                                        <select class="form-select mb-3" name="category">
                                            @foreach ($categories as $item)                                               
                                                <option {{ $product->category_id == $item->id ?'selected':'' }} value="{{ $item->id }}">{{ $item->name }}</option>   
                                            @endforeach                                                                                                                                                                           
                                        </select>
                                    </div>                                   
                                    <!-- <div class="col-xxl-3 col-md-6 mb-3">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="text" class="form-control" id="price" name="price" placeholder="Enter product price" value="{{ $product->price  }}" required>
                                    </div> -->                                                                   
                                    <div class="col-xxl-4 col-md-6 mb-3">
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
                                    <div class="col-xxl-3 col-md-6 mb-3 d-inline">
                                        <label for="image" class="form-label">Image(366x366)</label>
                                        <input type="file" class="form-control" id="image" name="images" onchange="previewImages(event)">
                                        <div class="mt-2 d-inline" id="image-preview-container">                                       
                                            <ul class="list-group list-group-horizontal">
                                                {{-- @foreach ($productImages as $item) --}}
                                                <li class="list-group-item"><img width="60px" height="60px" src="{{ asset('frontend/product_images/' . $product->image) }}" alt="Product Image"></li>
                                                {{-- @endforeach                                           --}}
                                            </ul>  
                                        </div>
                                            
                                    </div> 
                                                                
                                </div>
                                <button type="submit" class="btn btn-primary float-end">Submit</button>
                            </form>

                            <div class="mt-5">
                                <div class="row mt-5">
                                    <div class="col">
                                        <div class="d-flex flex-row-reverse bd-highlight">
                                            <a href="{{ route('product_size.create', $id) }}" class="btn btn-sm btn-primary d-none">Add Size</a>
                    
                                        </div>
                                        <div class="d-flex flex-row-reverse bd-highlight">
                                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#sizeModal">Add Size</button>
                                            <div id="sizeModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                <form action="{{route('product_size.store')}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myModalLabel">Assign Product Topings</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div>
                                                                    <input type="number" name="product_id" value="{{$id}}" hidden>
                                                                </div>
                                
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <label for="basiInput" class="form-label">Size Name</label>
                                                                        <select class="form-control" name="size_id" id="size_id">
                                                                            <option value="">{{ _('--Select Size--') }}</option>
                                                                            @foreach ($sizes as $size)
                                                                                <option value="{{ $size->id }}">{{ $size->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label for="basiInput" class="form-label">Price</label>
                                                                        <input type="number" placeholder="Price" class="form-control" name="price" step="0.00001" required>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label for="basiInput" class="form-label">Offer Price</label>
                                                                        <input type="number" placeholder="Offer Price" class="form-control" step="0.00001" name="offer_price" >
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label for="basiInput" class="form-label">Offer From</label>
                                                                        <input type="date" class="form-control" name="offer_from" >
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label for="basiInput" class="form-label">Offer To</label>
                                                                        <input type="date" class="form-control" name="offer_to" >
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label for="basiInput" class="form-label">Quantity</label>
                                                                        <input type="number" placeholder="Stock Qty" class="form-control" step="0.00001" name="quantity" >
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label for="basiInput" class="form-label">Image</label>
                                                                        <input type="file" name="image" class="form-control" onchange="previewImages(event)">
                                                                        <div class="mt-2" id="image-preview-container"></div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label for="basiInput" class="form-label">Status</label>
                                                                        <select name="status" id="" class="form-control">
                                                                            @foreach (getStatus() as $key => $status)
                                                                                <option value="{{$key}}" {{$key == 1 ? 'selected' : ''}}>{{$status}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                
                                                                    <div class="col-12">
                                                                        <label for="description" class="form-label">Description</label>
                                                                        <textarea class="form-control" id="editor" name="description" placeholder="Enter product description" rows="3">{{ old('description')}}</textarea>
                                                                    </div>
                                                                </div>                                           
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary ">Save</button>
                                                            </div>
                    
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                    
                                        <div class="card pt-0">
                                            <div class="card-header align-items-center d-flex">
                                                <h4 class="card-title mb-0 flex-grow-1">Product Size List</h4>
                                            </div>
                    
                                            <div class="card-body">
                                                <table class="table table-stripedw-100">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Id</th>
                                                            <th scope="col">image</th>
                                                            <th scope="col">Size Name</th>
                                                            <th scope="col">Price</th>
                                                            <th scope="col">Offer Price</th>
                                                            <th scope="col">Offer From</th>
                                                            <th scope="col">Offer To</th>
                                                            <th scope="col">Quantity</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Description</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($productSizes as $productSize)
                                                        <tr>
                                                            <th scope="row">{{$loop->index+1}}</th>
                                                            <td><img src="{{asset('frontend/product_images/'.$productSize->image)}}" alt="" style="width:40px; height: 40px;"></td>
                                                            <td>{{$productSize->name}}</td>
                                                            <td>{{$productSize->price}}</td>
                                                            <td>{{$productSize->offer_price}}</td>
                                                            <td>{{$productSize->offer_from}}</td>
                                                            <td>{{$productSize->offer_to}}</td>
                                                            <td>{{$productSize->quantity}}</td>
                                                            <td>{{$productSize->status == 1 ? "Active" : "Deactive"}}</td>
                                                            <td stype="padding: 5px;">{!!  $productSize->description !!}</td>
                                                            <td>
                                                                <button class="btn btn-sm btn-primary" title="Edit" data-bs-toggle="modal" data-bs-target="#editSize{{$productSize->id}}">
                                                                    <i class="bx bx-edit"></i>
                                                                </button>
                                                                |<button type="button" data-bs-toggle="modal" data-bs-target="#delete{{ $productSize->id }}" class="btn btn-sm btn-danger waves-effect waves-light">
                                                                    <i class="ri-delete-bin-line"></i>
                                                                </button>
                                                                <div class="btn-group material-shadow d-none">
                                                                    <button class="btn btn-primary btn-sm  material-shadow-none" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                    <i class="las la-angle-double-down"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu" data-popper-placement="top-start" data-popper-reference-hidden="" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(0px, -30px);">
                                                                        <a class="dropdown-item" href="javascript:void(0)">Product Nutritions</a>
                                                                    </div>
                                                                </div>
                    
                                                                <!-- Default Modals -->
                                                                <div id="delete{{ $productSize->id }}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="myModalLabel">Delete</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                            Are you sure you want to delete this Size:
                                                                            <strong
                                                                                style="color: darkorange">{{ $productSize->name }}</strong>
                                                                            ?
                                                                            </div>
                                                                            <div class="modal-footer">
                    
                                                                                <form
                                                                                    action="{{ route('productSize.destroy',$productSize->id) }}"
                                                                                    method="post">
                                                                                    @csrf
                                                                                    @method('delete')
                                                                                    <input type="hidden" name="deleteProductToping" value="1">
                                                                                    <button type="submit" class="btn btn-default">Delete</button>
                    
                                                                                </form>
                                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                            </div>
                    
                                                                        </div><!-- /.modal-content -->
                                                                    </div><!-- /.modal-dialog -->
                                                                </div><!-- /.modal -->


                                                                <div id="editSize{{$productSize->id}}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                                    <form action="{{ route('product_size.update', $productSize->id) }}" method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PATCH')
                                                                        <div class="modal-dialog modal-xl">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="myModalLabel">Add Product Size</h5>
                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <div>
                                                                                        <input type="number" name="product_id" value="{{$productSize->product_id}}" hidden>
                                                                                    </div>
                                                    
                                                                                    <div class="row">
                                                                                        <div class="col-6">
                                                                                            <label for="basiInput" class="form-label">Size Name</label>
                                                                                            <select class="form-control" name="size_id" id="size_id">
                                                                                                <option value="">{{ _('--Select Size--') }}</option>
                                                                                                @foreach ($sizes as $size)
                                                                                                    <option value="{{ $size->id }}" {{ $productSize->size_id == $size->id ? 'selected' : '' }}>{{ $size->name }}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-6">
                                                                                            <label for="basiInput" class="form-label">Price</label>
                                                                                            <input type="number" class="form-control" name="price" value="{{ $productSize->price }}" step="0.00001" required>
                                                                                        </div>
                                                                                        <div class="col-6">
                                                                                            <label for="basiInput" class="form-label">Offer Price</label>
                                                                                            <input type="number" class="form-control" name="offer_price" step="0.00001" value={{ $productSize->offer_price }}>
                                                                                        </div>
                                                                                        <div class="col-6">
                                                                                            <label for="basiInput" class="form-label">Offer From</label>
                                                                                            <input type="date" class="form-control" name="offer_from" value={{ $productSize->offer_from }}>
                                                                                        </div>
                                                                                        <div class="col-6">
                                                                                            <label for="basiInput" class="form-label">Offer To</label>
                                                                                            <input type="date" class="form-control" name="offer_to" value={{ $productSize->offer_to }}>
                                                                                        </div>
                                                                                        <div class="col-6">
                                                                                            <label for="basiInput" class="form-label">Quantity</label>
                                                                                            <input type="number" class="form-control" name="quantity" step="0.00001" value="{{ $productSize->quantity }}">
                                                                                        </div>
                                                                                        <div class="col-6">
                                                                                            <label for="basiInput" class="form-label">Image</label>
                                                                                            <input type="file" name="image" class="form-control" onchange="previewImages(event)">
                                                                                            <div class="mt-2" id="image-preview-container"></div>
                                                                                            <ul>                                         
                                                                                                <ul class="list-group list-group-horizontal">
                                                                                                    {{-- @foreach ($productImages as $item) --}}
                                                                                                    <li class="list-group-item"><img width="60px" height="60px" src="{{ asset('frontend/product_images/' . $productSize->image) }}" alt="Product Image"></li>
                                                                                                    {{-- @endforeach                                           --}}
                                                                                                </ul>                                       
                                                                                            </ul>
                                                                                        </div>
                                                                                        <div class="col-6">
                                                                                            <label for="basiInput" class="form-label">Status</label>
                                                                                            <select name="status" id="" class="form-control">
                                                                                                @foreach (getStatus() as $key => $status)
                                                                                                    <option value="{{$key}}" {{ $productSize->status == $key ? 'selected' : '' }}>{{$status}}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-12">
                                                                                            <label for="description" class="form-label">Description</label>
                                                                                            <textarea class="form-control" id="editor" name="description" placeholder="Enter product description" rows="3">{!! $productSize->description !!}</textarea>
                                                                                        </div>
                                                                                        
                                                                                    </div>                                        
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                                    <button type="submit" class="btn btn-primary ">update</button>
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
                                <div class="row">
                                    <div class="col">
                                        <div class="d-flex flex-row-reverse bd-highlight">
                                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Assign Product Topings</button>
                                            <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                <form action="{{route('product_toping.store')}}" method="post">
                                                    @csrf
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myModalLabel">Assign Product Topings</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div>
                                                                    <input type="number" name="product_id" value="{{$id}}" hidden>
                                                                </div>
                                                                <div>
                                                                    <label for="basiInput" class="form-label">Toping</label>
                                                                    <select class="form-select mb-3 select2" name="toping">
                                                                        <option selected>--Select Toping--</option>
                                                                        @foreach ($topings as $item)
                                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>   
                                                                        @endforeach                                                                                                                                                                           
                                                                    </select>
                                                                </div>                                          
                                                                <div>
                                                                    <label for="basiInput" class="form-label">Status</label>
                                                                    <select name="status" id="" class="form-control">
                                                                        @foreach (getStatus() as $key => $status) 
                                                                            <option value="{{$key}}" {{$key == 1 ? 'selected' : ''}}>{{$status}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>                                            
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary ">Save</button>
                                                            </div>
                    
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                    
                                        <div class="card">
                                            <div class="card-header align-items-center d-flex">
                                                <h4 class="card-title mb-0 flex-grow-1">Product Topings List</h4>
                                            </div>
                    
                                            <div class="card-body">
                                                <table class="table table-stripedw-100">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Id</th>
                                                            <th scope="col">Image</th>
                                                            <th scope="col">Price</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($productTopings as $item)
                                                        <tr>
                                                            <th scope="row">{{$loop->index+1}}</th>
                                                            <td><img width="60px" height="60px" src="{{ asset('frontend/toping_images/' . $item->image) }}" alt="Toping Image">  </td>
                                                            <td>{{$item->price}}</td>
                                                            <td>{{$item->status == 1 ? "Active" : "Deactive"}}</td>
                                                            <td>
                                                                <button class="btn btn-sm btn-primary" title="Edit" data-bs-toggle="modal" data-bs-target="#ctegory{{$item->id}}">
                                                                    <i class="bx bx-edit"></i>
                                                                </button> | <button type="button" data-bs-toggle="modal" data-bs-target="#myModal{{ $item->id }}" class="btn btn-sm btn-danger waves-effect waves-light"><i class="ri-delete-bin-line"></i></button>
                                                                </button>
                                                                <!-- Default Modals -->
                                                                <div id="myModal{{ $item->id }}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="myModalLabel">Delete</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                            Are you sure you want to delete this Toping:
                                                                            <strong
                                                                                style="color: darkorange">{{ $item->name }}</strong>
                                                                            ?
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                            
                                                                                <form
                                                                                    action="{{ route('topings.destroy',$item->topId) }}"
                                                                                    method="post">
                                                                                    @csrf
                                                                                    @method('delete')
                                                                                    <input type="hidden" name="deleteProductToping" value="1">
                                                                                    <input type="hidden" name="product_id" value=" {{$id}} ">
                                                                                    <button type="submit" class="btn btn-default">Delete</button>
                                                                                    
                                                                                </form>
                                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                            </div>
                    
                                                                        </div><!-- /.modal-content -->
                                                                    </div><!-- /.modal-dialog -->
                                                                </div><!-- /.modal -->  
                                                                <div id="ctegory{{$item->id}}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                                <form action="{{ route('categories.update', $item->id) }}" method="POST">
                                                                        @method('PUT')
                                                                        @csrf
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="myModalLabel">Edit Category</h5>
                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <div>
                                                                                        <label for="basiInput" class="form-label">Toping</label>
                                                                                        <select class="form-select mb-3 select2" name="toping">
                                                                                            <option selected>--Select Toping--</option>
                                                                                            @foreach ($topings as $toping)
                                                                                                <option {{ $toping->id == $item->toping_id?'selected':'' }} value="{{ $toping->id }}">{{ $toping->name }}</option>   
                                                                                            @endforeach                                                                                                                                                                           
                                                                                        </select>
                                                                                    </div>
                                                                                    <div>
                                                                                        <label for="basiInput" class="form-label">Status</label>
                                                                                        <select name="status" id="" class="form-control">
                                                                                            @foreach (getStatus() as $key => $status) 
                                                                                                <option value="{{$key}}" {{$item->status == 1 ? 'selected' : ''}}>{{$status}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                                    <button type="submit" class="btn btn-primary ">Save</button>
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
<script>
    function previewImages(event) {
        var previewContainer = document.getElementById('image-preview-container');
        previewContainer.innerHTML = '';

        var files = event.target.files;

        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var reader = new FileReader();

            reader.onload = function(e) {
                var imgElement = document.createElement('img');
                imgElement.src = e.target.result;
                imgElement.classList.add('preview-image');
                previewContainer.appendChild(imgElement);
            };

            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
@endsection