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
                                        <label for="image" class="form-label">Image(366x366)</label>
                                        <input type="file" class="form-control" id="image" name="images" onchange="previewImages(event)">
                                        <div class="mt-2" id="image-preview-container"></div>
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
                                    <div>    
                                    <div class="row">
                                        <h4>Product Option</h4><br><br>
                                        
                                        <div id="optionItemContainer">
                                            <!-- Existing option item -->
                                            <div class="row mt-2" id="item1" data-item="1">
                                                <div class="col-xxl-3 col-md-6 mb-3">
                                                    <label for="name" class="form-label">Title</label>
                                                    <select class="form-select mb-3" name="newTitles[]" id="title1">
                                                        <option selected>--Select Title--</option>
                                                        @foreach ($optionTitles as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-xxl-3 col-md-6 mb-3">
                                                    <label for="name" class="form-label">Select (Multiple) Topping</label>
                                                    <select class="form-select mb-3 select2" name="newToppings1[]" multiple="multiple" id="topping1">
                                                        @foreach ($toppings as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-xxl-3 col-md-6 mb-3">
                                                    <label for="name" class="form-label">Type</label>
                                                    <select class="form-select mb-3" name="newTypes[]" id="type1">
                                                        <option selected>--Select Type--</option>
                                                        <option value="checkbox">Checkbox</option>
                                                        <option value="Radio">Radio</option>
                                                    </select>
                                                </div>
                                                <div class="col-2">
                                                    <button class="btn btn-danger" onclick="removeOptionItem('item1')">X</button>
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="item-end">
                                            <button type="button" class="btn btn-sm btn-primary" onclick="addNewItemOption()">Add new</button>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <h4>Product Tags</h4><br><br>
                                        <div style="max-width: 500px;">
                                            <div class="row">
                                                <div class="col-6"><h5>Tag</h5></div>
                                                <div class="col-4"><h5>Removeable?</h5></div>
                                                <div class="col-2"><h5>Action</h5></div>
                                            </div>
                                            <div id="itemContainer">
                                                <div class="row" id="item1" data-item="1">
                                                    <div class="col-6">
                                                        <input type="text" name="tags[]" id="itemSize1" placeholder="Tag name" class="form-control itemSize">
                                                    </div>
                                                    <div class="col-4">
                                                        <input type="hidden" name="removeable[0]" value="0">
                                                        <input type="checkbox" name="removeable[0]" id="itemPrice1" value="1" class="form-check-input itemPrice">
                                                    </div>
                                                    <div class="col-2">
                                                        <button class="btn btn-danger" type="button" onclick="removeItem('item1')">X</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-2 item-end">
                                                <button type="button" class="btn btn-sm btn-primary" onclick="addNewItem()">Add new</button>
                                            </div>
                                        </div>
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
<script>
    var G_ITEM_NUMBER = 1;
    function addNewItem(){
        G_ITEM_NUMBER++;
    
        var html = `
            <div class="row mt-2" id="item${G_ITEM_NUMBER}" data-item="${G_ITEM_NUMBER}">
                <div class="col-6">
                    <input type="text" name="tags[]" id="itemSize${G_ITEM_NUMBER}" placeholder="Tag name" class="form-control itemSize">
                </div>
                <div class="col-4">
                    <input type="hidden" name="removeable[${G_ITEM_NUMBER-1}]" value="0">
                    <input type="checkbox" name="removeable[${G_ITEM_NUMBER-1}]" id="itemPrice${G_ITEM_NUMBER}" value="1" class="form-check-input itemPrice">
                </div>
                <div class="col-2">
                    <button type="button" class="btn btn-danger" onclick="removeItem('item${G_ITEM_NUMBER}')">X</button>
                </div>
            </div>
        `;

        document.getElementById("itemContainer").insertAdjacentHTML('beforeend', html);
    }
    function removeItem(id){
        document.getElementById(id).remove();
        // rearrangeSize();
    }
    // function rearrangeSize(){
    //     return;
    //     var eles = document.getElementsByClassName("itemSize");
    //     for(i=0; i<eles.length; i++){

    //     }
    // }
    var O_ITEM_NUMBER = 1;

    function addNewItemOption() {
        O_ITEM_NUMBER++;
        var html = `
            <div class="row mt-2" id="item${O_ITEM_NUMBER}" data-item="${O_ITEM_NUMBER}">
                <div class="col-xxl-3 col-md-6 mb-3">
                    <select class="form-select mb-3" name="newTitles[]" id="title${O_ITEM_NUMBER}">
                        <option selected>--Select Title--</option>
                        @foreach ($optionTitles as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xxl-3 col-md-6 mb-3">
                    <select class="form-select select2 mb-3" name="newToppings${O_ITEM_NUMBER}[]" multiple="multiple" id="topping${O_ITEM_NUMBER}">
                        @foreach ($toppings as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xxl-3 col-md-6 mb-3">
                    <select class="form-select mb-3" name="newTypes[]" id="type${O_ITEM_NUMBER}">
                        <option selected>--Select Type--</option>
                        <option value="checkbox">Checkbox</option>
                        <option value="Radio">Radio</option>
                    </select>
                </div>
                <div class="col-2">
                    <button type="button" class="btn btn-danger" onclick="removeOptionItem('item${O_ITEM_NUMBER}')">X</button>
                </div>
            </div>
        `;

        document.getElementById("optionItemContainer").insertAdjacentHTML('beforeend', html);   
        $(document).ready(function() {
            $('.select2').select2();
        }); 
    }

    function removeOptionItem(id) {
        document.getElementById(id).remove();
        // No need to rearrange as we're using unique IDs
    }
    $(document).ready(function() {
            $('.select2').select2();
        });
</script>
@endsection
@endsection
