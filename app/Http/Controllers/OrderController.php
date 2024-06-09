<?php

namespace App\Http\Controllers;

use Pusher\Pusher;
use App\Models\User;
use App\Models\Order;
use App\Models\Address;
use App\Models\OrderItem;
use App\Mail\PlaceOrderMail;
use App\Models\Admin\Toping;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\Admin\ProductTag;
use App\Mail\sendStatusChangeMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendPaymentStatusChangeMail;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        // DB::commit();
        // return;
        // return $request->all();
        // DB::beginTransaction();

        $cart = json_decode($request->cart, true);
        $FREE_OPTION = 1;
        $paymentType = $request->paymentType;

        $address_id = null;
        if ($request->type == 1) {
            $latitude = $request->latitude;
            $longitude = $request->longitude;
            $selectedAddress = $request->selectedAddress;
            if (!($latitude && $longitude)) {
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
        if ($request->deliveryCharge)
            $order->delivery_charge = $request->deliveryCharge;
        $order->total_amount = $request->subTotal;
        $order->paid_amount = $request->grandTotal;
        $order->delivery_address_id = $address_id;
        $order->payment_type = $paymentType;
        if ($paymentType == 1)
            $order->is_order_valid = 1;
        $order->save();

        // return $cart;
        foreach ($cart as $product_id => $productWiseItem) {
            if ($productWiseItem) {
                foreach ($productWiseItem as $size_id => $sizeWiseItem) {
                    if ($sizeWiseItem) {
                        $toping_ids = [];
                        $toping_price = 0;
                        foreach (isset($sizeWiseItem['topings']) ? $sizeWiseItem['topings'] : [] as $toping) {
                            if ($toping && !isset($toping_ids[$toping['id']])) {
                                $toping_ids[$toping['id']] = $toping['id'];
                                $toping_price += ($sizeWiseItem['toppingPrices'][$toping['id']] * $sizeWiseItem['toppingQtys'][$toping['id']]);
                            }
                        }

                        $topping_prices = [];
                        foreach ($sizeWiseItem['toppingPrices'] as $topingid => $price) {
                            if ($price) {
                                $topping_prices[$topingid] = $price;
                            }
                        }

                        $topping_qtys = [];
                        foreach ($sizeWiseItem['toppingQtys'] as $topingid => $qty) {
                            if ($qty) {
                                $topping_qtys[$topingid] = $qty;
                            }
                        }


                        $option_ids = [];
                        $option_price = 0;
                        foreach (isset($sizeWiseItem['options']) ? $sizeWiseItem['options'] : [] as $toping) {
                            if ($toping && !isset($option_ids[$toping['id']])) {
                                $option_ids[$toping['id']] = $toping['id'];
                                $option_price += ($sizeWiseItem['optionPrices'][$toping['id']] * ($sizeWiseItem['optionQtys'][$toping['id']] - $sizeWiseItem['optionFreeQtys'][$toping['id']]));
                            }
                        }

                        $option_prices = [];
                        foreach ($sizeWiseItem['optionPrices'] as $topingid => $price) {
                            if ($price) {
                                $option_prices[$topingid] = $price;
                            }
                        }

                        $option_qtys = [];
                        foreach ($sizeWiseItem['optionQtys'] as $topingid => $qty) {
                            if ($qty) {
                                $option_qtys[$topingid] = $qty;
                            }
                        }

                        $option_free_qtys = [];
                        foreach ($sizeWiseItem['optionFreeQtys'] as $topingid => $qty) {
                            if ($qty != "" && $qty != null && ($qty * 1) >= 0) {
                                $option_free_qtys[$topingid] = $qty;
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
                        $orderItem->toping_ids = implode(',', $toping_ids);
                        $orderItem->toping_qtys = implode(',', $topping_qtys);
                        $orderItem->toping_prices = implode(',', $topping_prices);
                        $orderItem->toping_price = $toping_price;
                        $orderItem->option_ids = implode(',', $option_ids);
                        $orderItem->option_qtys = implode(',', $option_qtys);
                        $orderItem->option_free_qtys = implode(',', $option_free_qtys);
                        $orderItem->option_prices = implode(',', $option_prices);
                        $orderItem->option_price = $option_price;
                        $orderItem->removed_tags = implode(',', $sizeWiseItem['removedTags']);
                        $orderItem->save();
                    }
                }
            }
        }

        $url = null;

        if ($paymentType == 1) {
            $data = [];
            Mail::to(auth()->user()->email)->send(new PlaceOrderMail($order->order_number, $data));
            Mail::to("dev.pizzapitsa@gmail.com")->send(new PlaceOrderMail($order->order_number, $data));

            $notification = new Notification;
            $notification->message = "New Order Placed";
            $notification->url = route('orders.index');
            $notification->save();

            $pusher = new Pusher(env('PUSHER_APP_KEY'), env('PUSHER_APP_SECRET'), env('PUSHER_APP_ID'), [
                'cluster' => env('PUSHER_APP_CLUSTER'),
                'encrypted' => true
            ]);
            $item = $order;
            $data['order'] = (string) view('admin.pages.order.singleOrder', compact('item'));
            $pusher->trigger('order', 'place-order', $data);
            $data = [
                'notification' => $notification,
                'notification_time' => displayNotificationTime($notification->created_at),
                'unSeenNotifications' => unSeenNotifications(),
            ];
            $pusher->trigger('order', 'place-order-notification', $data);

            //DB::commit();
        } else if ($paymentType == 2) {
            $payment = new PaytrailController;
            $url = $payment->createPayment($request, $newOrderNumber);
        }

        $response = [
            'success' => true,
            'message' => 'Order Placed Done',
            'url' => $url,
        ];
        return response()->json($response);
    }

    public function getOrders()
    {
        if (checkRole() == 'Delivery Boy') {
            $orders = Order::where('is_order_valid', 1)->where('delivery_boy', auth()->user()->id)->orderBy('id', 'DESC')->get();
        } else {
            $orders = Order::where('is_order_valid', 1)->orderBy('id', 'DESC')->get();
        }

        // $orders = Order::leftJoin('products', 'order_items.product_id', '=', 'products.id')
        //     ->select('orders.*')
        //     ->orderBy('orders.id', 'DESC')
        //     ->get();
        return view("admin.pages.order.index", compact('orders'));
    }
    public function getOrderDetails($id)
    {
        $orderDetails = Order::leftJoin('addresses', 'addresses.id', '=', 'orders.delivery_address_id')
            ->leftJoin('users', 'users.id', '=', 'orders.customer_id')
            ->select('orders.*', 'addresses.selectedAddress', 'addresses.selectedAddress', 'addresses.entrance', 'addresses.door_code', 'addresses.apartment', 'addresses.comment', 'addresses.floor', 'users.name', 'users.email', 'addresses.id as AddId')
            ->where('orders.order_number', $id)->where('orders.is_order_valid', 1)->first();
        $products = OrderItem::join('products', 'products.id', '=', 'order_items.product_id')
            ->leftJoin('sizes', 'sizes.id', '=', 'order_items.size_id')
            ->select('order_items.*', 'products.name as proName', 'products.image', 'sizes.name as sizeName')
            ->where('order_items.order_number', $id)
            ->get();
        $order = Order::where('order_number', $id)->where('is_order_valid', 1)->first();

        // Loop through each product to fetch and bind topping names
        $products->each(function ($product) {
            $topingIds = explode(',', $product->toping_ids);

            // Fetch topping names based on the toping_ids
            $topingNames = Toping::whereIn('id', $topingIds)->pluck('name')->toArray();

            // Bind the topingNames to the product
            $product->topingNames = implode(', ', $topingNames);
        });

        $order = Order::where('order_number', $id)->where('is_order_valid', 1)->first();

        // $products->each(function ($product) {
        //     $topingIds = explode(',', $product->toping_ids);
        //     $topingNames = Toping::whereIn('id', $topingIds)->pluck('name')->toArray();
        //     $product->topingNames = implode(', ', $topingNames);
        // });

        $products->each(function ($product) {
            $topingIds = explode(',', $product->toping_ids);
            $topingNames = Toping::whereIn('id', $topingIds)->pluck('name')->toArray();
            $product->topingNames = implode(', ', $topingNames);

            $optionIds = explode(',', $product->option_ids);
            $optionNames = Toping::whereIn('id', $optionIds)->pluck('name')->toArray();
            $product->optionNames = implode(', ', $optionNames);

            $removedTags = explode(',', $product->removed_tags);
            $tagNames = ProductTag::whereIn('id', $removedTags)->pluck('tag_name')->toArray();
            $product->tagNames = implode(', ', $tagNames);
        });



        $deliveryBoys = User::leftJoin('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
            ->leftJoin('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->where('roles.name', 'Delivery Boy')
            ->select('users.*', 'roles.name as roleName')
            ->orderBy('users.id', 'desc')
            ->get();
        //return view('layouts.placeOrderMail', compact('products', 'orderDetails', 'deliveryBoys','order'));
        // return $products;
        return view("admin.pages.order.details", compact('products', 'orderDetails', 'deliveryBoys', 'order'));
    }
    public function updateStatus(Request $request)
    {
        $data =  $request;
        $newStatus = $request->newStatus;
        $orderId = $request->orderId;
        $sendMail = $request->sendMail;
        $getOrder = Order::where('order_number', $orderId)->first();
        $getCustomerMail = User::where('id', $getOrder->customer_id)->first();

        if ($sendMail == true) {
            // return $getCustomerMail->email;
            Mail::to($getCustomerMail->email)->send(new sendStatusChangeMail($orderId, $data));
        }
        $order = Order::where('order_number', $orderId)->where('is_order_valid', 1)->first();
        $order->order_status = $newStatus;
        $order->update();
        return response()->json('Success');
    }

    public function updatePaymentStatus(Request $request)
    {
        $data =  $request;
        $newStatus = $request->newStatus;
        $orderId = $request->orderId;
        $sendMail = $request->sendMail;
        $getOrder = Order::where('order_number', $orderId)->first();
        $getCustomerMail = User::where('id', $getOrder->customer_id)->first();

        if ($sendMail == true) {
            // return $getCustomerMail->email;
            Mail::to($getCustomerMail->email)->send(new sendPaymentStatusChangeMail($orderId, $data));
        }
        $order = Order::where('order_number', $orderId)->where('is_order_valid', 1)->first();
        $order->is_paid = $newStatus;
        $order->update();
        return response()->json('Success');
    }

    public function updateAddress(Request $request)
    {
        $selectedAddress = $request->selectedAddress;
        $address = Address::where('id', $request->addressId)->first();
        $address->selectedAddress = $selectedAddress;
        $address->entrance = $request->entrance;
        $address->door_code = $request->door_code;
        $address->floor = $request->floor;
        $address->apartment = $request->apartment;
        $address->comment = $request->comment;
        $address->update();
        session()->flash('sweet_alert', [
            'type' => 'success',
            'title' => 'Success!',
            'text' => 'Address update success',
        ]);
        return redirect()->back();
    }

    public function updateQty(Request $request)
    {
        $orderItem = OrderItem::where('order_number', $request->order_id)->where('product_id', $request->product_id)->first();
        if ($orderItem) {

            $oldTotalProductPrice = $orderItem->total_price;
            $order = Order::where('order_number', $request->order_id)->first();
            $order->total_amount -= $oldTotalProductPrice;
            $order->paid_amount -= $oldTotalProductPrice;
            $order->update();

            $orderItem->quantity  = $request->qty;
            $orderItem->total_price = $orderItem->price * $request->qty;
            $orderItem->update();

            $newTotalProductPrice = $orderItem->total_price;
            $order->total_amount += $newTotalProductPrice;
            $order->paid_amount += $newTotalProductPrice;
            $order->update();

            $order->update();
            session()->flash('sweet_alert', [
                'type' => 'success',
                'title' => 'Success!',
                'text' => 'Quantity update success',
            ]);
            return redirect()->back();
        }
    }

    public function getCustomerProduct()
    {
        $userId = auth()->user()->id;
        return $orders = Order::where('customer_id', $userId)->orderBy('id', 'DESC')->get();
    }

    public function getOrderStatus()
    {
        return orderStatuses();
    }

    public function getCustomerOrderInfo(Request $request)
    {
        $request;
        $id =  $request->orderNumber;
        $orderDetails = Order::leftJoin('addresses', 'addresses.id', '=', 'orders.delivery_address_id')
            ->leftJoin('users', 'users.id', '=', 'orders.customer_id')
            ->select('orders.*', 'addresses.selectedAddress', 'addresses.selectedAddress', 'addresses.entrance', 'addresses.door_code', 'addresses.apartment', 'addresses.comment', 'addresses.floor', 'users.name', 'users.email', 'addresses.id as AddId')
            ->where('orders.order_number', $id)->where('orders.is_order_valid', 1)->first();
        $products = OrderItem::join('products', 'products.id', '=', 'order_items.product_id')
            ->leftJoin('sizes', 'sizes.id', '=', 'order_items.size_id')
            ->select('order_items.*', 'products.name as proName', 'products.image', 'sizes.name as sizeName')
            ->where('order_items.order_number', $id)
            ->get();

        $products->each(function ($product) {
            $topingIds = explode(',', $product->toping_ids);
            $topingNames = Toping::whereIn('id', $topingIds)->pluck('name')->toArray();
            $product->topingNames = implode(', ', $topingNames);

            $optionIds = explode(',', $product->option_ids);
            $optionNames = Toping::whereIn('id', $optionIds)->pluck('name')->toArray();
            $product->optionNames = implode(', ', $optionNames);

            $removedTags = explode(',', $product->removed_tags);
            $tagNames = ProductTag::whereIn('id', $removedTags)->pluck('tag_name')->toArray();
            $product->tagNames = implode(', ', $tagNames);
        });

        $user = User::where('id', auth()->user()->id)->first();
        return response()->json(['message' => 'success', 'products' => $products, 'orderDetails' => $orderDetails, 'user' => $user]);
    }

    public function assignDeliveryBoy(Request $request)
    {
        $value = $request->value;
        $orderId = $request->orderId;
        $order = Order::where('order_number', $orderId)->first();
        $order->delivery_boy = $value;
        $order->update();
        return response()->json('Success');
    }
}
