<?php

use App\Models\Admin\Product;
use App\Models\Admin\ProductImage;

  function getProductImage ($id) {
    return ProductImage::where('product_id',$id)->get();
  }

?>