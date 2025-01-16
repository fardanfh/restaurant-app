<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class CustomerController extends Controller
{
    public function index()
    {
        $menus = Menu::with('category')->get();
        return view('customer.index', compact('menus'));
    }

    public function order(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'customer_email' => 'required|email',
            'items' => 'required|array',
        ]);

        $totalAmount = 0;

        $order = Order::create([
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'total_amount' => 0,
            'status' => 'telah dibayar',
        ]);

        foreach ($request->items as $item) {
            $itemTotal = $item['price'] * $item['quantity'];
            $totalAmount += $itemTotal;

            OrderItem::create([
                'order_id' => $order->id,
                'menu_id' => $item['menu_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        $order->total_amount = $totalAmount;
        $order->save();

        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');

        $transactionDetails = [
            'order_id' => $order->id,
            'gross_amount' => $totalAmount,
        ];

        $customerDetails = [
            'first_name' => $request->customer_name,
            'email' => $request->customer_email,
        ];

        $params = [
            'transaction_details' => $transactionDetails,
            'customer_details' => $customerDetails,
        ];

        $snapToken = Snap::getSnapToken($params);

        return response()->json(['snapToken' => $snapToken]);
    }


}
