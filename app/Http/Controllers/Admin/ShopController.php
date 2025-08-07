<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $shops = auth()->user()->shops;

        return inertia('Admin/Shop/Index', [
            'shops' => $shops,
        ]);
    }

    public function create()
    {
        return inertia('Admin/Shop/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'description' => 'nullable|string',
        ]);

        auth()->user()->shops()->create($validated);

        return redirect()->route('admin.shops.index');
    }

    public function edit(Shop $shop)
    {
        if ($shop->admin_id !== auth()->id()) abort(403);

        return inertia('Admin/Shop/Edit', [
            'shop' => $shop,
        ]);
    }

    public function update(Request $request, Shop $shop)
    {
        if ($shop->admin_id !== auth()->id()) abort(403);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $shop->update($validated);

        return redirect()->route('admin.shops.index');
    }

    public function destroy(Shop $shop)
    {
        if ($shop->admin_id !== auth()->id()) abort(403);

        $shop->delete();

        return back();
    }
}
