<?php

use App\Models\Admin\Product;
use App\Models\Admin\ProductImage;

  function getProductImage ($id) {
    return ProductImage::where('product_id',$id)->get();
  }
function getStatus(){
    return [
        0 => 'Inactive',
        1 => 'Active',
    ];
}

function getAmountType(){
    return [
        1 => 'Percentage',
        0 => 'Direct',
    ];
}

?>