<?php

use App\Models\User;
use App\Models\Notification;
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


function shceduleTypes()
{
  return [
    'Delivery' => 'Delivery',
    'Dining room and pick-up' => 'Dining room and pick-up',
  ];
}

function userTypes()
{
  return [
    '1' => 'Super Admin',
    '2' => 'Customer',
    '3' => 'Delivery Boy',
  ];
}

function getNotifications(){
    $notifications = Notification::where('status','1')->orderBy('created_at','DESC')->get();
    return $notifications;
}
function unSeenNotifications(){
  $notifications = Notification::where('status','1')->where('isSeen','0')->get();
  return count($notifications);
}

function displayNotificationTime($timestamp) {
  $time_ago = strtotime($timestamp);
  $current_time = time();
  $time_difference = $current_time - $time_ago;
  $minutes = round($time_difference / 60);
  $hours = round($time_difference / 3600);
  $seconds = round($time_difference);

  if ($seconds < 60) {
      if ($seconds <= 1) {
          return "1 second ago";
      } else {
          return "$seconds seconds ago";
      }
  } elseif ($minutes < 60) {
      if ($minutes <= 1) {
          return "1 minute ago";
      } else {
          return "$minutes minutes ago";
      }
  } elseif ($hours < 24) {
      if ($hours <= 1) {
          return "1 hour ago";
      } else {
          return "$hours hours ago";
      }
  } else {
    return date("d M \a\\t H:i", $time_ago);
  }
}

