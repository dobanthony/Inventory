<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ShopController extends Controller
{
    public function index()
    {
        $shop = Shop::first();
        return Inertia::render('Admin/Shop/Index', compact('shop'));
    }

    public function create()
    {
        return Inertia::render('Admin/Shop/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'nullable|string',
        ]);

        Shop::create($request->only('name', 'address'));

        return redirect()->route('shops.index')->with('success', 'Shop created.');
    }

    public function edit(Shop $shop)
    {
        return Inertia::render('Admin/Shop/Edit', compact('shop'));
    }

    public function update(Request $request, Shop $shop)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'nullable|string',
        ]);

        $shop->update($request->only('name', 'address'));

        return redirect()->route('shops.index')->with('success', 'Shop updated.');
    }

    public function destroy(Shop $shop)
    {
        $shop->delete();
        return redirect()->route('shops.index')->with('success', 'Shop deleted.');
    }
}

