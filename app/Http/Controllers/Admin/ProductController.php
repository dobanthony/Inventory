<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Product;
use Inertia\Inertia;

class ProductController extends Controller
{
    // Show inventory for a specific shop
    public function index(Shop $shop)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $products = $shop->products()->latest()->get();

        return Inertia::render('Admin/Inventory/Index', [
            'shop' => $shop,
            'products' => $products,
        ]);
    }

    // Show form to create product
    public function create(Shop $shop)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        return Inertia::render('Admin/Inventory/Create', [
            'shop' => $shop,
        ]);
    }

    // Store new product
    public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $validated = $request->validate([
            'shop_id' => 'required|exists:shops,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        Product::create($validated);

        return redirect()->route('admin.inventory.index', $validated['shop_id'])
            ->with('success', 'Product created successfully.');
    }

    // Show edit form
    public function edit(Product $product)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        return Inertia::render('Admin/Inventory/Edit', [
            'product' => $product,
        ]);
    }

    // Update product
    public function update(Request $request, Product $product)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $product->update($validated);

        return redirect()->route('admin.inventory.index', $product->shop_id)
            ->with('success', 'Product updated.');
    }

    // Delete product
    public function destroy(Product $product)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $product->delete();

        return back()->with('success', 'Product deleted.');
    }
}

