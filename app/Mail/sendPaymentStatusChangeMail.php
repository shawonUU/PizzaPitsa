<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\User;
use App\Models\Order;
use App\Models\Address;
use App\Models\OrderItem;
use App\Models\Admin\Toping;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\ProductTag;

class sendPaymentStatusChangeMail extends Mailable
{
    use Queueable, SerializesModels;
    public $orderNumber;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orderNumber, $data)
    {
        $this->orderNumber = $orderNumber;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $id = $this->orderNumber;
        $data = $this->data;


        $orderDetails = Order::leftJoin('addresses', 'addresses.id', '=', 'orders.delivery_address_id')
        ->leftJoin('users', 'users.id', '=', 'orders.customer_id')
        ->select('orders.*', 'addresses.selectedAddress', 'addresses.selectedAddress', 'addresses.entrance', 'addresses.door_code', 'addresses.apartment', 'addresses.comment', 'addresses.floor', 'users.name', 'users.email', 'addresses.id as AddId')
        ->where('orders.order_number', $id)->first();
        $products = OrderItem::join('products', 'products.id', '=', 'order_items.product_id')
            ->leftJoin('sizes', 'sizes.id', '=', 'order_items.size_id')
            ->select('order_items.*', 'products.name as proName','products.image', 'sizes.name as sizeName')
            ->where('order_items.order_number', $id)
            ->get();
        $order = Order::where('order_number',$id)->first();
        
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
        $deliveryBoys = User::where('role_id', '3')->where('status', '1')->get();


        return $this->view('layouts.sendPaymentStatusMail', compact('id', 'products', 'orderDetails', 'deliveryBoys','order','data'))
            ->subject('Payment Status Update');
    }
}
