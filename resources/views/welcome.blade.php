<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digitech Store - Electronics & Gadgets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
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
        
        /* Hero Section Styling */
        .hero-section {
            padding: 0;
            margin-top: 76px;
            height: 100vh;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            overflow: hidden;
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
            padding: 30px;
            max-width: 800px;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
        }
        
        .hero-section h1 {
            font-size: 3.5rem;
            font-weight: 700;
            color: white;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        
        .hero-section p {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 30px;
        }
        
        .hero-section video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 1;
            filter: brightness(0.7) grayscale(30%);
        }
        
        .hero-btn {
            background-color: var(--secondary-color);
            color: white;
            border: none;
            padding: 12px 30px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.4);
        }
        
        .hero-btn:hover {
            background-color: #2980b9;
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(52, 152, 219, 0.6);
        }
        
        /* Features Section Styling */
        .features-section {
            background-color: white;
            padding: 100px 0;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 70px;
            position: relative;
        }
        
        .section-title h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 20px;
        }
        
        .section-title::after {
            content: '';
            width: 80px;
            height: 4px;
            background: var(--secondary-color);
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
        }
        
        .feature-item {
            text-align: center;
            padding: 30px 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: all 0.4s ease;
            margin-bottom: 30px;
            height: 100%;
        }
        
        .feature-item:hover {
            transform: translateY(-15px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }
        
        .feature-item img {
            max-width: 100%;
            height: auto;
            margin-bottom: 25px;
            transition: all 0.3s ease;
        }
        
        .feature-item:hover img {
            transform: scale(1.05);
        }
        
        .feature-item h3 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 15px;
        }
        
        .feature-item p {
            color: var(--text-light);
            font-size: 1rem;
            line-height: 1.7;
        }
        
        .explore-btn {
            background: linear-gradient(135deg, var(--primary-color), #34495e);
            color: white;
            border: none;
            padding: 12px 30px;
            font-size: 1.1rem;
            font-weight: 500;
            border-radius: 50px;
            margin-top: 40px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(44, 62, 80, 0.3);
        }
        
        .explore-btn:hover {
            background: linear-gradient(135deg, #34495e, var(--primary-color));
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(44, 62, 80, 0.4);
            color: white;
        }
        
        /* Contact Section Styling - Updated */
        #contact {
            background-color: #f9f9f9;
            padding: 80px 0;
            color: var(--text-color);
        }

        #contact .section-title h2 {
            margin-bottom: 15px;
        }

        #contact .lead {
            color: var(--text-light);
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
        
        /* Button Styling */
        .admin-btn {
            background-color: #3498db;
            color: white;
            font-size: 0.9rem;
            font-weight: 600;
            padding: 8px 20px;
            border-radius: 50px;
            border: none;
            transition: all 0.3s ease;
            margin-left: 10px;
        }
        
        .admin-btn:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.4);
        }
        
        .logout-btn {
            background-color: #e74c3c;
            color: white;
            font-size: 0.9rem;
            font-weight: 600;
            padding: 8px 20px;
            border-radius: 50px;
            border: none;
            transition: all 0.3s ease;
            margin-left: 10px;
        }
        
        .logout-btn:hover {
            background-color: #c0392b;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.4);
        }
        
        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .navbar-nav {
                background-color: rgba(44, 62, 80, 0.95);
                padding: 20px;
                border-radius: 5px;
                margin-top: 15px;
            }
            
            .hero-section h1 {
                font-size: 2.8rem;
            }
            
            .section-title h2 {
                font-size: 2.2rem;
            }
        }
        
        @media (max-width: 768px) {
            .hero-section {
                height: 90vh;
            }
            
            .hero-section h1 {
                font-size: 2.2rem;
            }
            
            .hero-section p {
                font-size: 1rem;
            }
            
            .section-title h2 {
                font-size: 1.8rem;
            }
            
            .feature-item {
                margin-bottom: 30px;
            }
            
            .contact-info {
                margin-bottom: 30px;
            }
        }
        
        @media (max-width: 576px) {
            .hero-section h1 {
                font-size: 1.8rem;
            }
            
            .hero-btn, .explore-btn {
                font-size: 0.9rem;
                padding: 10px 20px;
            }
            
            .section-title h2 {
                font-size: 1.5rem;
            }
            
            .feature-item h3 {
                font-size: 1.3rem;
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
                        <a class="nav-link" href="#hero"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features"><i class="fas fa-boxes"></i> Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact"><i class="fas fa-envelope"></i> Contact</a>
                    </li>
                    <li class="nav-item">
                        <a href="/products" class="btn admin-btn" id="adminBtn" style="display: none;">
                            <i class="fas fa-user-shield"></i> Admin
                        </a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline" id="logoutForm">
                            @csrf
                            <button type="submit" class="btn logout-btn">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="hero" class="hero-section">
        <video autoplay muted loop playsinline id="heroVideo" disablePictureInPicture>
            <source src="{{ asset('video/vid.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="hero-content">
            <h1>Teknologi Terbaik untuk Anda</h1>
            <p>Temukan berbagai produk elektronik berkualitas tinggi untuk kebutuhan digital Anda</p>
            <a href="#features" class="btn hero-btn"><i class="fas fa-arrow-down"></i> Lihat Produk</a>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features-section">
        <div class="container">
            <div class="section-title">
                <h2>Produk Unggulan</h2>
                <p>Pilihan produk elektronik terbaik dengan kualitas premium</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="feature-item">
                        <img src="{{ asset('image/tv.png') }}" alt="TV Elektronik" class="img-fluid">
                        <h3>TV Elektronik Berkualitas</h3>
                        <p>TV dengan resolusi tinggi dan teknologi canggih, memberikan pengalaman menonton yang luar biasa dengan gambar yang tajam dan suara yang jernih.</p>
                        <a href="/shopping" class="btn btn-outline-primary mt-3">Detail Produk</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="feature-item">
                        <img src="{{ asset('image/Laptop.png') }}" alt="Laptop Elektronik" class="img-fluid">
                        <h3>Laptop Elektronik</h3>
                        <p>Laptop dengan performa tinggi dan desain elegan untuk produktivitas tanpa batas. Dilengkapi prosesor cepat dan grafis yang memukau.</p>
                        <a href="/shopping" class="btn btn-outline-primary mt-3">Detail Produk</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="feature-item">
                        <img src="{{ asset('image/Smartphone.png') }}" alt="Smartphone" class="img-fluid">
                        <h3>Smartphone Canggih</h3>
                        <p>Teknologi terkini dan desain premium untuk memenuhi kebutuhan Anda. Dengan kamera berkualitas tinggi dan baterai tahan lama.</p>
                        <a href="/shopping" class="btn btn-outline-primary mt-3">Detail Produk</a>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <button class="btn explore-btn" id="exploreBtn">
                    <i class="fas fa-compass"></i> Jelajahi Semua Produk
                </button>
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
                <p>&copy; 2024 Digitech Store. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Back to top button -->
    <div class="back-to-top" id="backToTopBtn">
        <i class="fas fa-arrow-up"></i>
    </div>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
        
        // SweetAlert untuk tombol "Jelajahi Sekarang"
        document.getElementById('exploreBtn').addEventListener('click', function(e) {
            e.preventDefault(); // Mencegah aksi default tombol

            Swal.fire({
                title: 'Jelajahi Produk Kami?',
                text: "Anda akan diarahkan ke halaman produk lengkap",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3498db',
                cancelButtonColor: '#e74c3c',
                confirmButtonText: 'Ya, Jelajahi!',
                cancelButtonText: 'Nanti Saja'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Arahkan ke halaman belanja atau lakukan logika lainnya
                    window.location.href = '/shopping';
                }
            });
        });

        window.onload = function () {
            // Mendapatkan email pengguna yang sedang login
            const userEmail = '{{ Auth::user()->email ?? '' }}'; // Email pengguna dari server-side Laravel
            const adminEmail = 'admin1719@gmail.com';

            // Menampilkan tombol Admin jika email pengguna adalah admin
            const adminButton = document.getElementById('adminBtn');
            if (userEmail === adminEmail && adminButton) {
                adminButton.style.display = 'inline-block'; // Tampilkan tombol Admin
            }

            // Menyembunyikan tombol Logout jika email pengguna adalah admin
            const logoutButton = document.querySelector('.logout-btn');
            if (userEmail === adminEmail && logoutButton) {
                logoutButton.style.display = 'none'; // Sembunyikan tombol Logout
            }

            const exploreBtn = document.querySelector('#exploreBtn');
            if (userEmail === adminEmail && exploreBtn) {
                exploreBtn.style.display = 'none';
            }
        };

        // SweetAlert untuk tombol "Keluar"
        document.getElementById('logoutForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Mencegah pengiriman formulir

            Swal.fire({
                title: 'Keluar dari Akun?',
                text: "Anda akan keluar dari sesi saat ini",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3498db',
                cancelButtonColor: '#e74c3c',
                confirmButtonText: 'Ya, Keluar!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kirim formulir jika dikonfirmasi
                    this.submit();
                }
            });
        });

        // Smooth scrolling for navbar links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

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
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>