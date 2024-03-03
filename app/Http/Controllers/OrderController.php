<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Address;
use App\Models\Admin\Toping;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {

        $cart = json_decode($request->cart, true);

        $address_id = null;
        if($request->type == 1){
            $latitude = $request->latitude;
            $longitude = $request->longitude;
            $selectedAddress = $request->selectedAddress;
            if(!($latitude && $longitude)){
                $response = [
                    'success' => false,
                    'message' => 'Select Delivery Address',
                ];
                return response()->json($response);
            }
            $address = new Address;
            $address->customer_id = auth()->user()->id;
            $address->latitude = $latitude;
            $address->longitude = $longitude;
            $address->selectedAddress = $selectedAddress;

            $address->entrance = $request->entrance;
            $address->door_code = $request->door_code;
            $address->floor = $request->floor;
            $address->apartment = $request->apartment;
            $address->comment = $request->comment;
            $address->save();
            $address_id = $address->id;
        }

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
        $order->delivery_address_id = $address_id;
        $order->save();

        foreach ($cart as $product_id => $productWiseItem) {
            if ($productWiseItem) {
                foreach ($productWiseItem as $size_id => $sizeWiseItem) {
                    if ($sizeWiseItem) {

                        $toping_ids = [];
                        $toping_price = 0;
                        foreach (isset($sizeWiseItem['topings']) ? $sizeWiseItem['topings'] : [] as $toping) {
                            if($toping && !isset($toping_ids[$toping['id']])){
                                $toping_ids[$toping['id']] = $toping['id'];
                                $toping_price += $toping['price'];
                            }
                           
                        }

                        $orderItem = new OrderItem;
                        $orderItem->order_id = $order->id;
                        $orderItem->order_number = $order->order_number;
                        $orderItem->product_id = $sizeWiseItem['product']['id'];
                        $orderItem->size_id = $sizeWiseItem['size']['id'];
                        $orderItem->quantity = $sizeWiseItem['quantity'];
                        $orderItem->price = $sizeWiseItem['size']['price'];
                        $orderItem->total_price = $sizeWiseItem['quantity'] * $sizeWiseItem['size']['price'];
                        $orderItem->toping_ids = implode(',',$toping_ids);
                        $orderItem->toping_price = $toping_price;
                        $orderItem->save();
                    }
                }
            }
        }

        $response = [
            'success' => true,
            'message' => 'Order Placed Done',
        ];
        return response()->json($response);
    }

    public function getOrders()
    {
        $orders = Order::orderBy('id', 'DESC')->get();
        // $orders = Order::leftJoin('products', 'order_items.product_id', '=', 'products.id')
        //     ->select('orders.*')
        //     ->orderBy('orders.id', 'DESC')
        //     ->get();
        return view("admin.pages.order.index", compact('orders'));
    }
    public function getOrderDetails ($id) {

        $orderDetails = Order::join('addresses', 'addresses.id', '=', 'orders.delivery_address_id')
        ->join('users', 'users.id', '=', 'orders.customer_id')
        ->select('orders.*','addresses.selectedAddress','addresses.selectedAddress','addresses.entrance','addresses.door_code','addresses.apartment','addresses.comment','addresses.floor','users.name','users.email')
        ->where('orders.order_number',$id)->first();
        $products = OrderItem::join('products', 'products.id', '=', 'order_items.product_id')
        ->join('sizes', 'sizes.id', '=', 'order_items.size_id')
        ->select('order_items.*', 'products.name as proName','products.image', 'sizes.name as sizeName')
        ->where('order_items.order_number', $id)
        ->get();
        
        // Loop through each product to fetch and bind topping names
        $products->each(function ($product) {
            $topingIds = explode(',', $product->toping_ids);
        
            // Fetch topping names based on the toping_ids
            $topingNames = Toping::whereIn('id', $topingIds)->pluck('name')->toArray();
        
            // Bind the topingNames to the product
            $product->topingNames = implode(', ', $topingNames);
        });
        


        return view("admin.pages.order.details", compact('products','orderDetails'));
        
    }
    public function updateStatus(Request $request)
    {
        $newStatus = $request->newStatus;
        $orderId = $request->orderId;
        $order = Order::where('order_number', $orderId)->first();
        $order->order_status = $newStatus;
        $order->update();
        return response()->json('Success');
    }
}
