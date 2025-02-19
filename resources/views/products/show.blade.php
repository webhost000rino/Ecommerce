<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- Tambahkan Font Awesome ke bagian <head> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background:rgb(255, 255, 255);
            font-family: 'Poppins', serif;
        }

        .container {
            background: #777;
            border-radius: 8px;
            padding: 30px;
            margin-top: 50px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .card-body {
            padding: 20px;
        }

        .card-body img {
            border-radius: 8px;
            width: 100%;
            object-fit: cover;
        }

        h3 {
            font-size: 2rem;
            font-weight: bold;
            color:rgb(0, 0, 0);
            margin-bottom: 15px;
        }

        p.price {
            font-size: 1.4rem;
            color:rgb(0, 0, 0);
            font-weight: bold;
            margin-bottom: 15px;
        }

        code p {
            font-size: 1rem;
            color:rgb(0, 0, 0);
            line-height: 1.6;
        }

        .form-label {
            font-weight: bold;
            color:rgb(0, 0, 0);
        }

        .form-control {
            border-radius: 6px;
            border: 1px solid #333;
            padding: 10px;
            background-color: #f8f4e6;
        }

        .btn-custom {
            background-color:rgb(0, 0, 0);
            border-color:rgb(66, 66, 66);
            color: #fff;
        }

        .btn-custom:hover {
            background-color:rgb(66, 66, 66);
            border-color:rgb(0, 0, 0);
            color: #fff;
        }

        .btn-alt {
            background-color:rgb(0, 0, 0);
            border-color:rgb(66, 66, 66);
            color: #fff;
        }

        .btn-alt:hover {
            background-color:rgb(66, 66, 66);
            border-color:rgb(0, 0, 0);
            color: #fff;
        }

        @media (max-width: 767px) {
            .container {
                padding: 20px;
            }
            .col-md-4, .col-md-8 {
                width: 100%;
            }
            .card-body img {
                max-height: 250px;
                object-fit: cover;
            }
        }

    .form-group {
        margin-bottom: 20px;
    }

    .form-select {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ced4da;
        border-radius: 5px;
        background-color: #fff;
        appearance: none; /* Remove default dropdown arrow */
    }

    .form-select:focus {
        outline: none;
        border-color: #80bdff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
    }

    .custom-dropdown {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 5'%3E%3Cpath fill='%236c757d' d='M2 0L0 2h4z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 10px 10px;
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset('/storage/products/'.$product->image) }}" class="rounded" alt="Product Image">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3>{{ $product->title }}</h3>
                        <p class="price">{{ "Rp " . number_format($product->price, 2, ',', '.') }}</p>
                        <code>
                            <p>{!! $product->description !!}</p>
                        </code>
                        <p>Stock: {{ $product->stock }}</p>

                        <!-- Form Pembelian -->
                        <form id="purchaseForm" action="{{ route('buy.product', $product->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" min="1" value="1" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Alamat Pengiriman</label>
                                <textarea class="form-control" id="address" name="address" rows="3" placeholder="Masukkan alamat lengkap Anda" required maxlength="35"></textarea>
                            </div>
                            <!-- HTML -->
                            <div class="form-group">
                                <label for="paymentMethod">Payment Method</label>
                                <select class="form-select custom-dropdown" id="paymentMethod" name="payment_method" required>
                                    <option value="" disabled selected>Select a payment method</option>
                                    <option value="transfer">Transfer</option>
                                    <option value="cash">Cash</option>
                                </select>
                            </div>
                            <!-- Tombol beli yang hanya muncul jika bukan admin -->
                            <!-- Bagian Tombol -->
                            <button type="submit" class="btn btn-custom" id="buyButton">
                                <i class="fas fa-shopping-cart me-1"></i> Beli
                            </button>
                            <a href="/shopping" class="btn btn-alt ms-2" id="backToStoreButton">
                                <i class="fas fa-arrow-left me-1"></i> Back to Store
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Get logged-in user's email
        const loggedInUserEmail = '{{ Auth::user()->email ?? '' }}'; // Ganti dengan cara pengambilan email pengguna

        // If the logged-in user is admin1719, hide the "Beli" button
        if (loggedInUserEmail === 'admin1719@gmail.com') {
            document.getElementById('buyButton').style.display = 'none';  // Hide the "Beli" button
        }

        // Check for success or error session message and display SweetAlert2 popups
        @if(session('success'))
            const quantity = {{ session('quantity') }};
            const totalPrice = {{ session('totalPrice') }};
            Swal.fire({
                icon: 'success',
                title: 'Pembelian Berhasil!',
                text: `Anda berhasil membeli ${quantity} barang dengan total harga Rp ${totalPrice.toLocaleString('id-ID')}`,
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('error') }}',
            });
        @endif

        document.getElementById('buyButton').addEventListener('click', function(event) {
    event.preventDefault();

    const quantity = document.getElementById('quantity').value;
    const address = document.getElementById('address').value.trim();
    const price = {{ $product->price }}; 
    const stock = {{ $product->stock }}; 
    const totalPrice = price * quantity;

    if (quantity <= 0) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Jumlah barang yang dibeli tidak boleh nol atau negatif!',
        });
    } else if (quantity > stock) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Stock tidak cukup untuk jumlah yang diminta!',
        });
    } else if (address === '') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Alamat pengiriman tidak boleh kosong!',
        });
    } else {
        Swal.fire({
            title: 'Anda yakin?',
            text: `Anda akan membeli ${quantity} barang dengan total harga Rp ${totalPrice.toLocaleString('id-ID')}`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, beli sekarang!',
            cancelButtonText: 'Tidak, batalkan!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('purchaseForm').submit();
            }
        });
    }
});


        document.getElementById('backToStoreButton').addEventListener('click', function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Anda yakin?',
                text: "Anda yakin ingin kembali ke toko?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, bawa saya kembali!',
                cancelButtonText: 'Tidak, batalkan!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/shopping';
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
