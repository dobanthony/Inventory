<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductBuyController extends Controller
{
    public function create(Product $product)
    {
        return inertia('Admin/Inventory/Buy', [
            'product' => $product
        ]);
    }

    public function store(Request $request, Product $product)
    {
        $data = $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $product->stock += $data['quantity'];
        $product->save();

        return redirect()
            ->route('admin.products.index')
            ->with('success', "{$data['quantity']} items added to {$product->name} stock.");
    }
}
