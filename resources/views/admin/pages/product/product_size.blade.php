@extends('admin.layout.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

        @if(session('sweet_alert'))
            <script>
                Swal.fire({
                    icon: '{{ session('sweet_alert.type') }}',
                    title: '{{ session('sweet_alert.title') }}',
                    text: '{{ session('sweet_alert.text') }}',
                });
            </script>
        @endif
            <div class="row">
                <div class="col">
                    <div class="d-flex flex-row-reverse bd-highlight">
                        <button type="button" class="btn btn-sm btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#myModal">Add Size</button>
                        <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <form action="{{route('product_size.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myModalLabel">Add Size</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                        </div>
                                        <div class="modal-body">
                                            <div>
                                                <input type="number" name="product_id" value="{{$id}}" hidden>
                                            </div>
                                            <div>
                                                <label for="basiInput" class="form-label">Size Name</label>
                                                <select class="form-control" name="size_id" id="size_id">
                                                    <option value="">{{ _('--Select Size--') }}</option>
                                                    @foreach ($sizes as $size)
                                                        <option value="{{ $size->id }}">{{ $size->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div>
                                                <label for="basiInput" class="form-label">Price</label>
                                                <input type="number" class="form-control" name="price" required>
                                            </div>
                                            <div>
                                                <label for="basiInput" class="form-label">Status</label>
                                                <select name="status" id="" class="form-control">
                                                    @foreach (getStatus() as $key => $status)
                                                        <option value="{{$key}}" {{$key == 1 ? 'selected' : ''}}>{{$status}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div>
                                                <label for="basiInput" class="form-label">Image</label>
                                                <input type="file" name="image" class="form-control">
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
                            <h4 class="card-title mb-0 flex-grow-1">Product Size List</h4>
                        </div>

                        <div class="card-body">
                            <table class="table table-stripedw-100">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Size Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">image</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($productSizes as $productSize)
                                    <tr>
                                        <th scope="row">{{$loop->index+1}}</th>
                                        <td>{{$productSize->name}}</td>
                                        <td>{{$productSize->price}}</td>
                                        <td>{{$productSize->status == 1 ? "Active" : "Deactive"}}</td>
                                        <td><img src="{{asset('frontend/product_images/'.$productSize->image)}}" alt="" style="width:40px; height: 40px;"></td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" title="Edit" data-bs-toggle="modal" data-bs-target="#size{{$productSize->id}}">
                                                <i class="bx bx-edit"></i>
                                            </button>
                                            |<button type="button" data-bs-toggle="modal" data-bs-target="#delete{{ $productSize->id }}" class="btn btn-sm btn-danger waves-effect waves-light">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                            <div class="btn-group material-shadow">
                                                <button class="btn btn-primary btn-sm  material-shadow-none" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <i class="las la-angle-double-down"></i>
                                                </button>
                                                <div class="dropdown-menu" data-popper-placement="top-start" data-popper-reference-hidden="" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(0px, -30px);">
                                                    <a class="dropdown-item" href="{{route('product_nutritions',$productSize->id)}}">Product Nutritions</a>
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

                                            <div id="size{{$productSize->id}}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                <form action="{{ route('product_size.update', $productSize->id) }}" method="POST" enctype="multipart/form-data">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myModalLabel">Edit Size</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div>
                                                                    <input type="number" name="product_id" value="{{$id}}" hidden>
                                                                </div>
                                                                <div>
                                                                    <label for="basiInput" class="form-label">Size Name</label>
                                                                    <select class="form-control" name="size_id" id="size_id">
                                                                        <option value="">{{ _('--Select Size--') }}</option>
                                                                        @foreach ($sizes as $size)
                                                                            <option value="{{ $size->id }}" {{ $productSize->size_id == $size->id ? 'selected' : '' }}>{{ $size->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div>
                                                                    <label for="basiInput" class="form-label">Price</label>
                                                                    <input type="number" class="form-control" name="price" value="{{$productSize->price}}" required>
                                                                </div>
                                                                <div>
                                                                    <label for="basiInput" class="form-label">Status</label>
                                                                    <select name="status" id="" class="form-control">
                                                                        @foreach (getStatus() as $key => $status)
                                                                            <option value="{{$key}}" {{$productSize->status == 1 ? 'selected' : ''}}>{{$status}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div>
                                                                    <label for="basiInput" class="form-label">Image</label>
                                                                    <input type="file" class="form-control" name="image">
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
@endsection
