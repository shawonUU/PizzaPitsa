<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function placeOrder(Request $request){
        return $cart = json_decode($request->cart, true);

        $latestOrder = Order::latest()->first();
        $lastOrderNumber = $latestOrder ? $latestOrder->order_number : 0;
        $lastOrderNumber = (int)$lastOrderNumber;
        $newOrderNumber = ++$lastOrderNumber;
        $newOrderNumber = str_pad($newOrderNumber, 6, '0', STR_PAD_LEFT);

        $order = new Order;
        $order->order_number = $newOrderNumber;
        $order->customer_id = auth()->user()->id;
        $order->type = $request->type;
        $order->discount = $request->discount;
        $order->total_amount = $request->subTotal;
        $order->paid_amount = $request->grandTotal;
        $order->save();

        foreach($cart as $product_id => $productWiseItem){
            if($productWiseItem){
                foreach($productWiseItem as $size_id => $sizeWiseItem){
                    if($sizeWiseItem){

                        $toping_ids = "";
                        $toping_price = 0;
                        foreach($sizeWiseItem['topings'] as $toping){
                            if($toping_ids != "") $toping_ids .= ',';
                            $toping_ids .= $toping['id']; 
                            $toping_price += $toping['price'];
                        }

                        $orderItem = new OrderItem;
                        $orderItem->order_id = $order->id;
                        $orderItem->order_number = $order->order_number;
                        $orderItem->product_id = $sizeWiseItem['product']['id'];
                        $orderItem->size_id = $sizeWiseItem['size']['id'];
                        $orderItem->quantity = $sizeWiseItem['quantity'];
                        $orderItem->price = $sizeWiseItem['size']['price'];
                        $orderItem->total_price = $sizeWiseItem['quantity']*$sizeWiseItem['size']['price'];
                        $orderItem->toping_ids = $toping_ids;
                        $orderItem->toping_price = $toping_price;
                        $orderItem->save();
                    }
                }
            }
        }

    }
}
