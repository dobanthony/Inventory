<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Fetch orders with related product
        $orders = Order::with('product')->latest()->get();

        return inertia('Admin/Orders/Index', [
            'orders' => $orders
        ]);
    }
}
