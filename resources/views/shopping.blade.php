<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Belanja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Add Owl Carousel CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            color: #212529;
            scroll-padding-top: 100px;
        }

        /* Navbar */
        .navbar {
            background-color: #333;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        .navbar:hover {
            background-color: #555;
        }

        .navbar-brand {
            font-size: 28px;
            font-weight: regular;
            color: #fff !important;
        }

        .navbar-nav .nav-link {
            color: #fff !important;
            padding: 8px 15px;
            font-size: 16px;
        }

        .navbar-nav .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 20px;
        }

        /* Container & Header */
        #shopping-page {
            padding: 40px 0;
        }

        h2 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 30px;
            font-family: 'Poppins', serif;
            color: black;
        }

        .products-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .product-card {
            width: 220px;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            background: #fff;
            padding: 15px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .product-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 6px;
        }

        .product-card h3 {
            font-size: 16px;
            margin: 10px 0;
            color: #212529;
        }

        .product-card .price {
            font-size: 14px;
            color:rgb(0, 0, 0);
            margin-bottom: 10px;
        }

        .view-details-button {
            display: inline-block;
            padding: 8px 12px;
            font-size: 14px;
            background-color:rgb(119, 119, 119);
            color: white;
            border-radius: 6px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .view-details-button:hover {
            background-color: #555;
        }

        /* Contact Us Section */
        #contact {
            padding-top: 80px;
            margin-top: 100px;
            scroll-margin-top: 100px;
        }

        /* Footer */
        footer {
            background-color: #333;
            color: #fff;
            padding: 30px 0;
            text-align: center;
            font-size: 16px;
        }

        footer p {
            font-family: 'Poppins', serif;
        }

        /* Responsive */
        @media (max-width: 767px) {
            .products-grid {
                justify-content: center;
            }

            .product-card {
                width: 100%;
                max-width: 300px;
            }
        }

        #contact p {
            color:rgba(32, 30, 30, 0.84);
        }

        .pagination {
            background-color:rgb(141, 141, 141); /* Warna latar belakang pagination */
            border: 1px solid #ddd;   /* Garis tepi */
            border-radius: 5px;       /* Sudut sedikit membulat */
        }

        .pagination .page-item .page-link {
            color:rgb(85, 85, 85);           /* Warna teks */
            background-color: #f8f9fa; /* Warna latar belakang tombol */
            border: 1px solid #ddd;   /* Garis tepi tombol */
        }

        .pagination .page-item.active .page-link {
            color: #fff;              /* Warna teks untuk halaman aktif */
            background-color:rgb(0, 0, 0); /* Warna latar belakang untuk halaman aktif */
            border-color: #6c757d;    /* Warna garis tepi untuk halaman aktif */
        }

        .pagination .page-item:hover .page-link {
            background-color:rgb(112, 112, 112); /* Warna tombol saat hover */
            color: #000;              /* Warna teks saat hover */
        }

        /* ======= IMPROVED CLIENTS SECTION STYLING ======= */
        #clients {
            background-color: #f9f9f9;
            padding: 50px 0;
            position: relative;
            overflow: hidden;
        }

        #clients .section-heading {
            margin-bottom: 40px;
        }

        #clients .section-heading h2 {
            font-size: 36px;
            font-weight: regular;
            color: #333;
            text-transform: uppercase;
            margin: 0;
            padding-bottom: 10px;
            position: relative;
        }

        #clients .section-heading h2:after {
            content: "";
            width: 60px;
            height: 4px;
            background: #007bff;
            display: block;
            margin: 10px auto 0;
        }

        /* Auto-scrolling brands section */
        .clients-container {
            overflow: hidden;
            width: 100%;
            position: relative;
        }

        .brands-scroll {
            display: flex;
            animation: scrollBrands 30s linear infinite;
            width: calc(150px * 16); /* Double the items to ensure continuous loop */
        }

        .client-logo {
            flex: 0 0 150px;
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 15px;
        }

        .client-logo img {
            max-width: 100%;
            max-height: 90px;
            object-fit: contain;
            filter: grayscale(100%);
            opacity: 0.7;
            transition: all 0.3s ease;
        }

        .client-logo:hover img {
            filter: grayscale(0%);
            opacity: 1;
            transform: scale(1.1);
        }

        /* Animation for continuous scrolling */
        @keyframes scrollBrands {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(calc(-150px * 8)); /* Move by half the items */
            }
        }

        /* Pause animation on hover */
        .brands-scroll:hover {
            animation-play-state: paused;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">Digitech Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/welcome">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact Us</a>
                    </li>

                    <!-- Tombol History dengan id 'history-button' -->
                    <li class="nav-item" id="history-button">
                        <a class="nav-link" href="/purchase-history">History</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content (Products) -->
    <section id="shopping-page">
        <div class="container">
            <h2 class="text-center mb-4">Produk Unggulan Kami</h2>
            <div class="products-grid">
                @foreach($products as $product)
                    <div class="product-card">
                        <img src="{{ asset('/storage/products/'.$product->image) }}" class="rounded mb-3" alt="{{ $product->title }}">
                        <h3 class="text-truncate">{{ $product->title }}</h3>
                        <p><b>Stok: {{ $product->stock }}</b></p>
                        <p class="price">Rp.{{ number_format($product->price, 0, ',', '.') }}</p>
                        <!-- Link menuju halaman detail produk -->
                        <a href="#" class="view-details-button" data-href="{{ route('products.show', $product->id) }}" onclick="confirmRedirect(event, this)">
                            <i class="fas fa-info-circle"></i> Lihat Detail
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <br>
        <div class="d-flex justify-content-center">
            {{ $products->links('pagination::bootstrap-4') }}
        </div>
    </section>
    
    <!-- Auto-scrolling Brands Section -->
    <section id="clients" class="clients">
        <div class="container">
            <div class="section-heading text-center">
                <h2>Brands</h2>
            </div>
            
            <div class="clients-container">
                <div class="brands-scroll">
                    <!-- First set of logos -->
                    <div class="client-logo">
                        <img src="{{ asset('image/polytron.jpg') }}" alt="Polytron">
                    </div>
                    <div class="client-logo">
                        <img src="{{ asset('image/LG.png') }}" alt="LG">
                    </div>
                    <div class="client-logo">
                        <img src="{{ asset('image/IP.png') }}" alt="iPhone">
                    </div>
                    <div class="client-logo">
                        <img src="{{ asset('image/Asus.png') }}" alt="Asus">
                    </div>
                    <div class="client-logo">
                        <img src="{{ asset('image/Acer.png') }}" alt="Acer">
                    </div>
                    <div class="client-logo">
                        <img src="{{ asset('image/Lenovo.png') }}" alt="Lenovo">
                    </div>
                    <div class="client-logo">
                        <img src="{{ asset('image/samsung.png') }}" alt="Samsung">
                    </div>
                    <div class="client-logo">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg" alt="Google">
                    </div>
                    
                    <!-- Duplicate set to create a seamless loop -->
                    <div class="client-logo">
                        <img src="{{ asset('image/polytron.jpg') }}" alt="Polytron">
                    </div>
                    <div class="client-logo">
                        <img src="{{ asset('image/LG.png') }}" alt="LG">
                    </div>
                    <div class="client-logo">
                        <img src="{{ asset('image/IP.png') }}" alt="iPhone">
                    </div>
                    <div class="client-logo">
                        <img src="{{ asset('image/Asus.png') }}" alt="Asus">
                    </div>
                    <div class="client-logo">
                        <img src="{{ asset('image/Acer.png') }}" alt="Acer">
                    </div>
                    <div class="client-logo">
                        <img src="{{ asset('image/Lenovo.png') }}" alt="Lenovo">
                    </div>
                    <div class="client-logo">
                        <img src="{{ asset('image/samsung.png') }}" alt="Samsung">
                    </div>
                    <div class="client-logo">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg" alt="Google">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Us Section -->
    <section id="contact" class="bg-light py-5">
        <div class="container">
            <h2 class="text-center">Hubungi Kami</h2>
            <p class="text-center mb-4">Kami di sini untuk membantu! Jika Anda memiliki pertanyaan atau masukan, jangan ragu untuk menghubungi kami.</p>
            <hr style="border-color: #a0522d;">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Alamat:</strong> Jl. Pojok, Kab Bogor, Provinsi Jawa Barat, 16961</p>
                    <p><strong>Telepon:</strong> +62 877-8710-1391</p>
                    <p><strong>Email:</strong> DigitechOfficialstore@gmail.com</p>
                </div>
                <div class="col-md-6">
                    <center>
                        <img src="{{ asset('image/qrcoderev.png') }}" alt="qrcode" width="100px" height="auto">
                    </center>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Digitech Store. All Rights Reserved.</p>
    </footer>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        function confirmRedirect(event, button) {
            event.preventDefault(); // Prevent default link behavior

            const href = button.getAttribute('data-href'); // Get the product detail page URL

            // SweetAlert2 confirmation popup
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Apakah Anda ingin melihat detail produk ini?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, lihat detail!',
                cancelButtonText: 'Tidak, batalkan!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to the product detail page if confirmed
                    window.location.href = href;
                }
            });
        }

        // Cek jika pengguna yang login adalah 'admin1719@gmail.com'
        window.addEventListener('DOMContentLoaded', function () {
            var currentUserEmail = '{{ auth()->user()->email ?? '' }}'; // Ambil email dari backend Laravel

            // Cek jika email pengguna adalah 'admin1719@gmail.com'
            if (currentUserEmail === 'admin1719@gmail.com') {
                // Hapus elemen dengan id 'history-button' jika yang login adalah admin1719
                var historyButton = document.getElementById('history-button');
                if (historyButton) {
                    historyButton.style.display = 'none';
                }
            }
        });
    </script>
</body>
</html>