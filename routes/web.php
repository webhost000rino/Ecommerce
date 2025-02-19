<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use Illuminate\Support\Facades\Auth;

// Rute utama, jika belum login akan diarahkan ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// Halaman welcome, hanya bisa diakses setelah login
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome')->middleware('auth');

// Rute untuk login dan register user biasa
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Rute untuk produk dan pembelian
Route::middleware(['auth'])->group(function () {
    // Cek apakah email login adalah 'admin1719@gmail.com' dan jika tidak, redirect ke welcome
    Route::get('/products', function () {
        if (Auth::check() && Auth::user()->email !== 'admin1719@gmail.com') {
            return redirect()->route('welcome'); // Redirect jika email bukan admin1719@gmail.com
        }

        // Ambil data produk dari database dan kirim ke tampilan
        $products = \App\Models\Product::paginate(10); // Ambil produk dengan pagination

        return view('products.index', compact('products')); // Mengirim data produk ke tampilan
    })->name('products.index');
    
    // Rute untuk halaman create produk
    Route::get('/products/create', function () {
        if (Auth::check() && Auth::user()->email !== 'admin1719@gmail.com') {
            return redirect()->route('welcome'); // Redirect jika email bukan admin1719@gmail.com
        }
        return view('products.create');
    })->name('products.create');

    // Rute untuk menyimpan produk
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');

    // Rute untuk halaman edit produk
    Route::get('/products/{id}/edit', function ($id) {
        if (Auth::check() && Auth::user()->email !== 'admin1719@gmail.com') {
            return redirect()->route('welcome'); // Redirect jika email bukan admin1719@gmail.com
        }
    
        // Ambil data produk berdasarkan ID
        $product = \App\Models\Product::findOrFail($id); // Mengambil produk berdasarkan ID
    
        // Kirim data produk ke tampilan
        return view('products.edit', compact('product'));
    })->name('products.edit');
    

    // Rute untuk mengupdate produk
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');

    // Rute untuk menghapus produk
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

    // Rute untuk produk detail yang bisa diakses oleh semua pengguna
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

    // Rute untuk membeli produk
    Route::post('/product/{id}/buy', [ProductController::class, 'buyProduct'])->name('buy.product');
    
    // Rute untuk halaman shopping dan purchase history
    Route::get('/shopping', function () {
        if (Auth::check() && Auth::user()->email === 'admin1719@gmail.com') {
            return Redirect::to('/welcome');
        }
        return app(ProductController::class)->shopping();
    })->name('shopping');

    Route::get('/purchase-history', function () {
        // Jika pengguna login dan emailnya 'admin1719@gmail.com', redirect ke halaman welcome
        if (Auth::check() && Auth::user()->email === 'admin1719@gmail.com') {
            return redirect()->route('welcome')->with('error', 'You are not allowed to access this page!');
        }

        // Jika pengguna lain, panggil method di ProductController
        return app(\App\Http\Controllers\ProductController::class)->showPurchaseHistory();
    })->name('purchase.history');

});


Route::get('/products', function () {
    if (Auth::check() && Auth::user()->email === 'admin1719@gmail.com') {
        return app(\App\Http\Controllers\ProductController::class)->index();
    }
    return redirect()->route('welcome')->with('error', 'Access denied!');
})->name('products.index');


// New route for purchase history (loads the purchase history data on the same page)
Route::get('/products/history', [ProductController::class, 'purchaseHistory'])->name('products.history');

Route::patch('/purchase/{id}/update-status', [ProductController::class, 'updateStatus'])->name('purchase.updateStatus');

Route::delete('/purchase/{historyId}', [PurchaseController::class, 'destroy'])->name('purchase.destroy');




