<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\PurchaseHistory;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth; // Impor namespace Auth
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the products and purchase history.
     *
     * @return View
     */
    public function index(): View
    {
        $products = Product::latest()->paginate(3);
        $purchaseHistory = PurchaseHistory::with('user', 'product')->latest()->get();

        return view('products.index', compact('products', 'purchaseHistory'));
    }

    /**
     * Show the form for creating a new product.
     *
     * @return View
     */
    public function create(): View
    {
        return view('products.create');
    }

    /**
     * Store a newly created product.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'image'         => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title'         => 'required|min:5',
            'description'   => 'required|min:10',
            'price'         => 'required|numeric',
            'stock'         => 'required|numeric',
        ]);

        // Handle image upload
        $image = $request->file('image');
        $image->storeAs('public/products', $image->hashName());

        // Create the product
        Product::create([
            'image'         => $image->hashName(),
            'title'         => $request->title,
            'description'   => $request->description,
            'price'         => $request->price,
            'stock'         => $request->stock,
        ]);

        return redirect()->route('products.index')->with('success', 'Product successfully added!');
    }

    /**
     * Show the details of a specific product.
     *
     * @param  string  $id
     * @return View
     */
    public function show(string $id): View
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param  string  $id
     * @return View
     */
    public function edit(string $id): View
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified product.
     *
     * @param  Request  $request
     * @param  string  $id
     * @return RedirectResponse
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'image'         => 'image|mimes:jpeg,jpg,png|max:2048',
            'title'         => 'required|min:5',
            'description'   => 'required|min:10',
            'price'         => 'required|numeric',
            'stock'         => 'required|numeric',
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/products', $image->hashName());
            Storage::delete('public/products/'.$product->image);

            $product->update([
                'image'         => $image->hashName(),
                'title'         => $request->title,
                'description'   => $request->description,
                'price'         => $request->price,
                'stock'         => $request->stock,
            ]);
        } else {
            $product->update([
                'title'         => $request->title,
                'description'   => $request->description,
                'price'         => $request->price,
                'stock'         => $request->stock,
            ]);
        }

        return redirect()->route('products.index')->with('success', 'Product successfully updated!');
    }

    /**
     * Remove the specified product from storage.
     *
     * @param  string  $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);

        Storage::delete('public/products/'.$product->image);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product successfully deleted!');
    }

    /**
     * Show the shopping page.
     *
     * @return View
     */
    public function shopping(): View
    {
        $products = Product::latest()->get();
        return view('shopping', compact('products'));
    }

    /**
     * Handle the product purchase.
     *
     * @param  Request  $request
     * @param  string  $productId
     * @return RedirectResponse
     */
    public function buyProduct(Request $request, string $productId): RedirectResponse
    {
        $product = Product::find($productId);

        if (!$product) {
            return redirect()->route('home')->with('error', 'Product not found.');
        }

        $quantity = $request->input('quantity');
        if ($quantity > $product->stock) {
            return redirect()->back()->with('error', 'Not enough stock available.');
        }

        $totalPrice = $product->price * $quantity;

        // Store purchase history
        PurchaseHistory::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'alamat' => $request->address,
            'payment_method' => $request->payment_method,
            'quantity' => $quantity,
            'total_price' => $totalPrice,
            'purchase_date' => now(),
        ]);

        // Update product stock
        $product->stock -= $quantity;
        $product->save();

        return redirect()->back()->with('success', 'Purchase successful!')
            ->with('quantity', $quantity)
            ->with('totalPrice', $totalPrice);
    }

    /**
     * Show the purchase history of the logged-in user.
     *
     * @return View
     */
    public function showPurchaseHistory(): View
{
    // Mendapatkan riwayat pembelian hanya untuk pengguna yang sedang login
    $purchaseHistory = PurchaseHistory::where('user_id', Auth::id()) // Menggunakan Auth::id() untuk ID pengguna login
        ->with(['product']) // Eager load data produk terkait
        ->orderBy('purchase_date', 'desc') // Mengurutkan berdasarkan tanggal pembelian
        ->get();

    // Mengirim data ke view 'purchase_history'
    return view('purchase_history', compact('purchaseHistory'));
}

    /**
     * Update the status of an order in purchase history.
     *
     * @param  Request  $request
     * @param  string  $id
     * @return RedirectResponse
     */
    public function updateStatus(Request $request, string $id): RedirectResponse
    {
        $order = PurchaseHistory::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Status updated successfully.');
    }

}
