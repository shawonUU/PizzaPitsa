<?php

use App\Models\Admin\Product;
use App\Models\Admin\ProductImage;
use App\Models\User;

function getProductImage($id)
{
  return ProductImage::where('product_id', $id)->get();
}
function getStatus()
{
  return [
    0 => 'Inactive',
    1 => 'Active',
  ];
}

function getAmountType()
{
  return [
    1 => 'Percentage',
    0 => 'Direct',
  ];
}

function getUser($id)
{
  return User::where('id', $id)->pluck('name')->first();
}

function orderStatuses()
{
  return [
    '0' => 'Pending',
    '1' => 'Processing',
    '2' => 'Shipped',
    '3' => 'Out for Delivery',
    '4' => 'Delivered',
    '5' => 'Canceled',
    '7' => 'Refunded',
    '8' => 'On Hold',
    '9' => 'Backordered',
    '10' => 'Returned'
  ];
}
