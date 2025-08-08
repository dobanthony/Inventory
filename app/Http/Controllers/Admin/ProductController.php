<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Sale;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $shop = Shop::firstOrFail();

        $search = $request->input('search');
        $products = Product::where('shop_id', $shop->id)
            ->when($search, fn($q) => $q->where('name', 'like', "%{$search}%"))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return Inertia::render('Admin/Product/Index', [
            'products' => $products,
            'search' => $search,
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Product/Create');
    }

    public function store(Request $request)
    {
        $shop = Shop::firstOrFail();

        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
        ]);

        $shop->products()->create($request->only('name', 'description', 'price', 'quantity'));

        return redirect()->route('products.index')->with('success', 'Product created.');
    }

    public function show(Product $product)
    {
        return Inertia::render('Admin/Product/Show', ['product' => $product]);
    }

    public function edit(Product $product)
    {
        return Inertia::render('Admin/Product/Edit', [
            'product' => $product,
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
        ]);

        $product->update($request->only('name', 'description', 'price', 'quantity'));

        return redirect()->route('products.index')->with('success', 'Product updated.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted.');
    }

    public function buyForm(Product $product)
    {
        return Inertia::render('Admin/Inventory/Buy', [
            'product' => $product
        ]);
    }

    // public function buyStore(Request $request, Product $product)
    // {
    //     $request->validate([
    //         'quantity' => 'required|integer|min:1',
    //     ]);

    //     if ($request->quantity > $product->stock) {
    //         return back()->withErrors(['quantity' => 'Not enough stock available.']);
    //     }

    //     // Reduce stock
    //     $product->stock -= $request->quantity;
    //     $product->save();

    //     // Record sale
    //     Sale::create([
    //         'product_id' => $product->id,
    //         'quantity'   => $request->quantity,
    //         'total'      => $product->price * $request->quantity,
    //     ]);

    //     return redirect()->route('products.index')->with('success', 'Purchase recorded successfully.');
    // }

    public function buy(Product $product)
    {
        return inertia('Admin/Inventory/Buy', [
            'product' => $product
        ]);
    }

    // Store purchase
    public function buyStore(Request $request, Product $product)
    {
        $data = $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        if ($data['quantity'] > $product->stock) {
            return back()->withErrors(['quantity' => 'Not enough stock available.']);
        }

        $total = $product->price * $data['quantity'];

        // Store order
        Order::create([
            'product_id' => $product->id,
            'quantity'   => $data['quantity'],
            'price'      => $product->price,
            'total'      => $total
        ]);

        // Reduce stock
        $product->decrement('stock', $data['quantity']);

        return redirect()->route('orders.index')->with('success', 'Product purchased successfully!');
    }
}
