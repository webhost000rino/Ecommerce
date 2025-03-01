<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digitech Store - Belanja Produk</title>
    <!-- CSS Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" rel="stylesheet">
    <style>
        /* Variables */
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
            --text-color: #34495e;
            --text-light: #7f8c8d;
            --white: #ffffff;
            --transition: all 0.3s ease;
            --box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            --navbar-height: 70px; /* Define navbar height for consistent spacing */
        }
        
        /* Add scroll padding to fix section navigation */
        html {
            scroll-padding-top: 70px; /* Slightly larger than navbar height */
            scroll-behavior: smooth;
        }
        
        /* General Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
            color: var(--text-color);
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }
        
        /* Navbar Styling */
        .navbar {
            background: linear-gradient(135deg, var(--primary-color), #1a252f);
            padding: 15px 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .navbar.scrolled {
            padding: 8px 0;
            background: rgba(44, 62, 80, 0.95);
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: 600;
            color: white !important;
            letter-spacing: 1px;
            position: relative;
        }
        
        .navbar-brand::after {
            content: '';
            position: absolute;
            width: 30px;
            height: 3px;
            background-color: var(--secondary-color);
            bottom: -5px;
            left: 0;
        }
        
        .navbar-nav .nav-link {
            color: rgba(255, 255, 255, 0.85) !important;
            font-weight: 500;
            padding: 8px 16px;
            margin: 0 5px;
            border-radius: 4px;
            transition: all 0.3s ease;
        }
        
        .navbar-nav .nav-link:hover {
            color: white !important;
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }
        
        .navbar-toggler {
            border: none;
            color: white;
        }

        /* Products Section */
        #shopping-page {
            padding: 40px 0 60px;
            margin-top: calc(var(--navbar-height) + 30px); /* Adjusted margin using variable */
        }

        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 50px;
        }

        .section-title h2 {
            font-size: 2.5rem;
            font-weight: 600;
            text-align: center;
            color: var(--secondary-color);
            margin-bottom: 15px;
        }

        .section-title::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: -10px;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background-color: var(--primary-color);
            border-radius: 2px;
        }

        .search-container {
            max-width: 500px;
            margin: 0 auto 30px;
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 12px 20px;
            padding-left: 45px;
            border-radius: 25px;
            border: 1px solid #ddd;
            font-size: 16px;
            transition: var(--transition);
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(52, 152, 219, 0.1);
        }

        .search-icon {
            position: absolute;
            left: 15px;
            top: 12px;
            color: var(--text-light);
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .product-card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            background: var(--white);
            text-align: center;
            box-shadow: var(--box-shadow);
            transition: var(--transition);
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.15);
        }

        .product-card .img-container {
            position: relative;
            padding-top: 15px;
            margin-bottom: 10px;
            overflow: hidden;
        }

        .product-card .img-container img {
            width: 90%;
            height: 180px;
            object-fit: contain;
            transition: var(--transition);
        }

        .product-card:hover .img-container img {
            transform: scale(1.05);
        }

        .product-info {
            padding: 15px 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .product-card h3 {
            font-size: 16px;
            font-weight: 600;
            margin: 0 0 8px;
            color: var(--secondary-color);
            height: 48px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .product-card .stock {
            background-color: rgba(52, 152, 219, 0.1);
            padding: 5px 10px;
            border-radius: 15px;
            color: var(--primary-color);
            font-size: 13px;
            font-weight: 500;
            display: inline-block;
            margin-bottom: 10px;
        }

        .product-card .price {
            font-size: 18px;
            font-weight: 700;
            color: var(--accent-color);
            margin: auto 0 15px;
        }

        .btn-view-details {
            display: inline-block;
            width: 100%;
            padding: 10px;
            background-color: var(--primary-color);
            color: var(--white);
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
            border: none;
        }

        .btn-view-details:hover {
            background-color: #2980b9;
            color: var(--white);
        }

        .btn-view-details i {
            margin-right: 5px;
        }

        /* Flash sale badge */
        .flash-sale-badge {
            position: absolute;
            top: 0;
            left: 0;
            background-color: var(--accent-color);
            color: var(--white);
            padding: 5px 10px;
            font-size: 12px;
            font-weight: 600;
            z-index: 1;
        }

        /* Brands Section - Fixed padding */
        #clients {
            background-color: var(--white);
            padding: 80px 0 60px; /* Increased top padding */
            position: relative;
            overflow: hidden;
            border-top: 1px solid rgba(0,0,0,0.05);
            border-bottom: 1px solid rgba(0,0,0,0.05);
            margin-top: 0; /* Reset any margin */
        }

        .section-heading {
            margin-bottom: 0;
            padding-top: 20px; /* Added padding to ensure visibility */
        }

        .section-heading h2 {
            font-size: 32px;
            font-weight: 600;
            color: var(--secondary-color);
            margin: 0;
            padding-bottom: 10px;
            position: relative;
        }

        .section-heading h2::after {
            content: "";
            width: 60px;
            height: 4px;
            background: var(--primary-color);
            display: block;
            margin: 15px auto 0;
            border-radius: 2px;
        }

        .clients-container {
            overflow: hidden;
            width: 100%;
            position: relative;
            padding: 20px 0;
        }

        .brands-scroll {
            display: flex;
            animation: scrollBrands 30s linear infinite;
            width: calc(150px * 16);
        }

        .client-logo {
            flex: 0 0 150px;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 15px;
            margin: 0 10px;
            background-color: rgba(248, 249, 250, 0.8);
            border-radius: 10px;
            transition: var(--transition);
        }

        .client-logo img {
            max-width: 80%;
            max-height: 70px;
            object-fit: contain;
            filter: grayscale(100%);
            opacity: 0.7;
            transition: var(--transition);
        }

        .client-logo:hover {
            background-color: var(--white);
            box-shadow: var(--box-shadow);
            transform: translateY(-5px);
        }

        .client-logo:hover img {
            filter: grayscale(0%);
            opacity: 1;
        }

        @keyframes scrollBrands {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(calc(-150px * 8));
            }
        }

        .brands-scroll:hover {
            animation-play-state: paused;
        }

        /* Contact Section Styling - Fixed padding */
        #contact {
            background-color: #f9f9f9;
            padding: 80px 0 60px; /* Increased top padding */
            color: var(--text-color);
            margin-top: 0; /* Reset any margin */
        }

        #contact .section-title {
            padding-top: 20px; /* Added padding to ensure visibility */
        }

        #contact .section-title h2 {
            margin-bottom: 15px;
        }

        #contact .lead {
            max-width: 700px;
            font-size: medium;
            margin: 0 auto;
        }

        .contact-info, .qr-code-container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            height: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .contact-info:hover, .qr-code-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .contact-info h4, .qr-code-container h4 {
            color: var(--secondary-color);
            font-weight: 600;
            font-size: 20px;
            border-bottom: 2px solid rgba(52, 152, 219, 0.2);
            padding-bottom: 12px;
        }

        .contact-item {
            display: flex;
            margin-bottom: 20px;
        }

        .contact-item i {
            color: var(--secondary-color);
            font-size: 18px;
            width: 40px;
            height: 40px;
            background-color: rgba(52, 152, 219, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            flex-shrink: 0;
        }

        .contact-item div {
            flex: 1;
        }

        .contact-item strong {
            color: var(--dark-color);
            display: block;
            margin-bottom: 4px;
            font-size: 16px;
        }

        .contact-item p {
            color: var(--text-light);
            margin: 0;
            font-size: 15px;
        }

        .qr-image {
            max-width: 180px;
            border: 8px solid white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .qr-image:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .qr-code-container p {
            color: var(--text-light);
            max-width: 300px;
            margin: 15px auto 0;
            font-size: 15px;
        }

        /* Responsive styles for contact section */
        @media (max-width: 767px) {
            #contact {
                padding: 60px 0;
            }
            
            .contact-info, .qr-code-container {
                padding: 25px;
                margin-bottom: 20px;
            }
            
            .contact-item {
                align-items: flex-start;
                margin-bottom: 15px;
            }
            
            .contact-item i {
                width: 35px;
                height: 35px;
                font-size: 16px;
            }
            
            .qr-image {
                max-width: 150px;
            }
        }

        @media (max-width: 575px) {
            #contact .section-title h2 {
                font-size: 28px;
            }
            
            .contact-info, .qr-code-container {
                padding: 20px;
            }
            
            .contact-item i {
                width: 30px;
                height: 30px;
                font-size: 14px;
                margin-right: 10px;
            }
            
            .contact-item strong {
                font-size: 15px;
            }
            
            .contact-item p {
                font-size: 14px;
            }
            
            .qr-image {
                max-width: 130px;
            }
            
            .qr-code-container p {
                font-size: 14px;
            }
        }

        /* Back to top button */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background-color: var(--primary-color);
            color: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
            z-index: 999;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .back-to-top.show {
            opacity: 1;
            visibility: visible;
        }

        .back-to-top:hover {
            background-color: #2980b9;
            transform: translateY(-5px);
        }

        /* Responsive Styling */
        @media (max-width: 991px) {
            .products-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            }
            
            /* Adjust section padding for smaller screens */
            #shopping-page {
                margin-top: calc(var(--navbar-height) + 20px);
            }
            
            #clients, #contact {
                padding-top: 70px;
            }
        }

        /* Further mobile adjustments */
        @media (max-width: 767px) {
            .navbar {
                padding: 10px 0;
            }
            
            .section-title h2 {
                font-size: 2rem;
            }
            
            #shopping-page {
                margin-top: calc(var(--navbar-height) + 10px);
                padding: 30px 0 40px;
            }
            
            #clients, #contact {
                padding-top: 60px;
            }
        }

        /* Footer Styling */
        footer {
            background: linear-gradient(135deg, var(--primary-color), #1a252f);
            color: white;
            padding: 50px 0 30px;
            text-align: center;
        }
        
        footer p {
            margin-bottom: 20px;
            font-size: 1rem;
            opacity: 0.8;
        }
        
        .social-icons {
            margin-bottom: 30px;
        }
        
        .social-icons a {
            color: white;
            font-size: 1.5rem;
            margin: 0 15px;
            opacity: 0.7;
            transition: all 0.3s ease;
        }
        
        .social-icons a:hover {
            opacity: 1;
            transform: translateY(-5px);
        }
        
        .footer-links {
            margin-bottom: 30px;
        }
        
        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            margin: 0 15px;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }
        
        .footer-links a:hover {
            color: white;
        }
        
        .copyright {
            font-size: 0.9rem;
            opacity: 0.6;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 20px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">Digitech<span style="color: #3498db;">Store</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars" style="color: white;"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/welcome">
                            <i class="fas fa-home me-1"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <i class="fas fa-shopping-bag me-1"></i> Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#clients">
                            <i class="fas fa-building me-1"></i> Brands
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">
                            <i class="fas fa-envelope me-1"></i> Contact
                        </a>
                    </li>
                    <li class="nav-item" id="history-button">
                        <a class="nav-link" href="/purchase-history">
                            <i class="fas fa-history me-1"></i> History
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content (Products) -->
    <section id="shopping-page">
        <div class="container">
            <div class="text-center">
                <div class="section-title">
                    <h2>Produk Unggulan Kami</h2>
                </div>
                <p class="mb-4">Temukan teknologi terbaik untuk kebutuhan digital Anda.</p>
            </div>

            <!-- Search bar -->
            <div class="search-container">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="search-input" id="searchInput" placeholder="Cari produk...">
            </div>

            <div class="products-grid">
                @foreach($products as $product)
                    <div class="product-card">
                        <div class="img-container">
                            @if($product->discount > 0)
                                <div class="flash-sale-badge">Sale {{ $product->discount }}%</div>
                            @endif
                            <img src="{{ asset('/storage/products/'.$product->image) }}" alt="{{ $product->title }}">
                        </div>
                        <div class="product-info">
                            <h3>{{ $product->title }}</h3>
                            <div class="stock">
                                <i class="fas fa-cubes me-1"></i> Stok: {{ $product->stock }}
                            </div>
                            <div class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                            <a href="#" class="btn-view-details" data-href="{{ route('products.show', $product->id) }}" onclick="confirmRedirect(event, this)">
                                <i class="fas fa-info-circle"></i> Lihat Detail
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    
    <!-- Brands Section -->
    <section id="clients" class="clients">
        <div class="container">
            <div class="section-heading text-center">
                <h2>Brand Terpercaya</h2>
                <p class="text-muted mt-3">Bekerja sama dengan merek terbaik untuk memberikan kualitas terjamin.</p>
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
    <section id="contact">
        <div class="container">
            <div class="text-center mb-5">
                <div class="section-title">
                    <h2>Hubungi Kami</h2>
                </div>
                <p class="lead">Kami siap membantu! Jika Anda memiliki pertanyaan atau membutuhkan bantuan, jangan ragu untuk menghubungi kami.</p>
            </div>
            
            <div class="row g-4 justify-content-center">
                <div class="col-lg-6">
                    <div class="contact-info h-100">
                        <h4 class="mb-4"><i class="fas fa-headset me-2"></i>Informasi Kontak</h4>
                        
                        <div class="contact-item mb-3">
                            <i class="fas fa-map-marker-alt"></i>
                            <div>
                                <strong>Alamat</strong>
                                <p class="mb-0">Jl. Pojok, Kab Bogor, Provinsi Jawa Barat, 16961</p>
                            </div>
                        </div>
                        
                        <div class="contact-item mb-3">
                            <i class="fas fa-phone-alt"></i>
                            <div>
                                <strong>Telepon</strong>
                                <p class="mb-0">+62 877-8710-1391</p>
                            </div>
                        </div>
                        
                        <div class="contact-item mb-3">
                            <i class="fas fa-envelope"></i>
                            <div>
                                <strong>Email</strong>
                                <p class="mb-0">DigitechOfficialstore@gmail.com</p>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <i class="fas fa-clock"></i>
                            <div>
                                <strong>Jam Operasional</strong>
                                <p class="mb-0">Senin - Sabtu, 08:00 - 20:00 WIB</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="qr-code-container h-100">
                        <h4 class="mb-4 text-center"><i class="fas fa-qrcode me-2"></i>Scan QR Code</h4>
                        <div class="text-center">
                            <img src="{{ asset('image/qrcoderev.png') }}" alt="QR Code Digitech Store" class="img-fluid qr-image">
                            <p class="mt-3">Scan QR code untuk informasi lebih lanjut dan penawaran khusus</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
            <div class="footer-links">
                <a href="#">About Us</a>
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
                <a href="#">Shipping Info</a>
                <a href="#">FAQ</a>
            </div>
            <div class="copyright">
                <p>&copy;  2024 Digitech Store. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Back to top button -->
    <div class="back-to-top" id="backToTopBtn">
        <i class="fas fa-arrow-up"></i>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    
    <script>
        // Product details confirmation
        function confirmRedirect(event, button) {
            event.preventDefault(); 
            const href = button.getAttribute('data-href');

            Swal.fire({
                title: 'Lihat Detail Produk',
                text: "Apakah Anda ingin melihat detail produk ini?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3498db',
                cancelButtonColor: '#e74c3c',
                confirmButtonText: 'Ya, lihat detail!',
                cancelButtonText: 'Tidak, batalkan!',
                borderRadius: '10px'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = href;
                }
            });
        }

        // Admin check
        window.addEventListener('DOMContentLoaded', function () {
            var currentUserEmail = '{{ auth()->user()->email ?? "" }}';
            if (currentUserEmail === 'admin1719@gmail.com') {
                var historyButton = document.getElementById('history-button');
                if (historyButton) {
                    historyButton.style.display = 'none';
                }
            }
            
            // Back to top button
            var backToTopBtn = document.getElementById('backToTopBtn');
            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 300) {
                    backToTopBtn.classList.add('show');
                } else {
                    backToTopBtn.classList.remove('show');
                }
            });
            
            backToTopBtn.addEventListener('click', function() {
                window.scrollTo({top: 0, behavior: 'smooth'});
            });
            
            // Category filter
            const categoryButtons = document.querySelectorAll('.category-btn');
            const productCards = document.querySelectorAll('.product-card');
            
            categoryButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all buttons
                    categoryButtons.forEach(btn => btn.classList.remove('active'));
                    // Add active class to clicked button
                    this.classList.add('active');
                    
                    const category = this.getAttribute('data-category');
                    
                    // Filter products based on selected category
                    productCards.forEach(product => {
                        if (category === 'all') {
                            product.style.display = 'flex';
                        } else {
                            // Get product category (you'll need to add data-category attributes to your product cards)
                            const productCategory = product.getAttribute('data-category');
                            
                            if (productCategory === category) {
                                product.style.display = 'flex';
                            } else {
                                product.style.display = 'none';
                            }
                        }
                    });
                });
            });
            
            // Search functionality
            const searchInput = document.getElementById('searchInput');
            
            searchInput.addEventListener('keyup', function() {
                const searchTerm = this.value.toLowerCase().trim();
                
                productCards.forEach(product => {
                    const productTitle = product.querySelector('h3').textContent.toLowerCase();
                    
                    if (searchTerm === '' || productTitle.includes(searchTerm)) {
                        product.style.display = 'flex';
                    } else {
                        product.style.display = 'none';
                    }
                });
            });
        });
    </script>
</body>
</html>
