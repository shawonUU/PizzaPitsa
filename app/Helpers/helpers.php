<?php

use App\Models\User;
use App\Models\Admin\Product;
use App\Models\Admin\Currency;
use App\Models\Admin\ProductImage;

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
    '1' => 'Pending',
    '2' => 'Processing',
    '3' => 'Shipped',
    '4' => 'Out for Delivery',
    '5' => 'Delivered',
    '6' => 'Canceled',
    '7' => 'Refunded',
    '8' => 'On Hold',
    '9' => 'Backordered',
    '10' => 'Returned'
  ];
}


function currecySymbleType()
{
  return [
    '1' => 'Prefix',
    '2' => 'Suffix',
  ];
}
function getCurrency()
{
  return Currency::where('status', '1')->pluck('symbol')->first();
}
