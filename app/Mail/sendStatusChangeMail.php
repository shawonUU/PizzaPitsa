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

class sendStatusChangeMail extends Mailable
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
        return $this->view('layouts.sendOrderStatusMail', compact('id', 'data'))
            ->subject('Order Status Update');
    }
}
