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

                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Add Product Size</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('product_size.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
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
                                        <input type="number" class="form-control" name="price" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="basiInput" class="form-label">Offer Price</label>
                                        <input type="number" class="form-control" name="offer_price" >
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
                                        <input type="date" class="form-control" name="quantity" >
                                    </div>
                                    <div class="col-6">
                                        <label for="basiInput" class="form-label">Image</label>
                                        <input type="file" name="image" class="form-control">
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
                                    <div class="d-flex justify-content-end">
                                         <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>



                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
<script>
    ClassicEditor.create(document.querySelector('#editor'))
    .catch(error => {
        console.error(error);
    });

    ClassicEditor.create(document.querySelector('.editorUp'))
    .catch(error => {
        console.error(error);
    });


</script>
@endsection
