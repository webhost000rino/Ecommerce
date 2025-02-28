<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', serif;
            background-color: #f8f9fa;
            color:rgb(109, 112, 114);
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #333;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
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
            color: #dfe6e9 !important;
            padding: 8px 15px;
            font-size: medium;
        }
        .navbar-nav .nav-link:hover {
            background-color: #666;
            border-radius: 20px;
        }
        .hero-section {
            padding: 100px 0;
            text-align: center;
            color: #fff;
            position: relative;
            height: 100vh;
            filter: grayscale(80%); /* Efek monokrom */
        }
        .features-section {
            background-color: #f8f9fa;
            padding: 70px 0;
            color: black;
        }
        .feature-item {
            text-align: center;
            padding: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .feature-item:hover {
            transform: translateY(-10px);
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
        }
        .feature-item h3 {
            font-family: 'Poppins', serif;
            color:rgba(32, 30, 30, 0.84);
            font-size: 24px;
        }
        .feature-item p {
            font-family: 'Poppins', serif;
            color:rgba(104, 104, 104, 0.75);
            font-size: medium;
        }
        footer {
            background-color: #333;
            color: #fff;
            padding: 30px 0;
            text-align: center;
            font-size: medium;
        }
        footer p {
            font-family: 'Poppins', serif;
            font-size: medium;
        }
        @media (max-width: 767px) {
            .hero-section h1 {
                font-size: 40px;
            }
            .hero-section p {
                font-size: 16px;
            }
        }

        #contact {
            color: black;
        }

        #contact p {
            color:rgba(32, 30, 30, 0.84);
        }

        /* Styling tombol Admin */
        .admin-btn {
            background-color: #0062cc;
            color: white;
            font-size: 16px;
            font-weight: bold;
            padding: 8px 15px;
            border-radius: 30px;
            border: none;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .admin-btn:hover {
            background-color: #004a99;
            transform: scale(1.1);
        }

        .admin-btn:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(0, 98, 204, 0.6);
        }
        
        /* Styling tombol Logout */
        .logout-btn {
            background-color: #ff4444;
            color: white;
            font-size: 16px;
            font-weight: bold;
            padding: 8px 15px;
            border-radius: 30px;
            border: none;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .logout-btn:hover {
            background-color: #cc0000;
            transform: scale(1.1);
        }

        .logout-btn:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(255, 68, 68, 0.6);
        }

        .custom-btn {
            background-color: #333; /* Warna abu-abu */
            color: #fff; /* Teks berwarna putih */
            border: none; /* Hilangkan border */
            padding: 10px 20px; /* Ukuran padding */
            border-radius: 5px; /* Sudut tombol */
            transition: background-color 0.3s ease;
        }

        .custom-btn:hover {
            background-color: #666; /* Warna saat hover */
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">{{ Str::before(Auth::user()->email ?? '', '@') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Product Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="/products" class="btn admin-btn" id="adminBtn" style="display: none;">
                            <i class="fas fa-user-shield"></i> Admin
                        </a>
                    </li>
                    <li>
                        <!-- Tombol Logout (dengan ikon) -->
                        <form action="{{ route('logout') }}" method="POST" class="d-inline" id="logoutForm">
                            @csrf
                            <button type="submit" class="btn btn-danger logout-btn">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section" style="position: relative; height: 100vh;">
        <video autoplay muted loop playsinline id="heroVideo" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: -1;" disablePictureInPicture>
            <source src="{{ asset('video/vid.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </section>

    <!-- Features Section -->
<section id="features" class="features-section">
    <div class="container">
        <h2 class="text-center mb-5">Produk Unggulan</h2>
        <div class="row">
            <div class="col-md-4 feature-item">
            <img src="{{ asset('image/tv.png') }}" alt="TV Elektronik" class="img-fluid">
                <h3>TV Elektronik Berkualitas</h3>
                <p>TV dengan resolusi tinggi dan teknologi canggih, memberikan pengalaman menonton yang luar biasa.</p>
            </div>
            <div class="col-md-4 feature-item">
            <img src="{{ asset('image/Laptop.png') }}" alt="Laptop Elektronik" class="img-fluid">
                <h3>Laptop Elektronik</h3>
                <p>Laptop dengan performa tinggi dan desain elegan untuk produktivitas tanpa batas.</p>
            </div>
            <div class="col-md-4 feature-item">
            <img src="{{ asset('image/Smartphone.png') }}" alt="Smartphone" class="img-fluid">
                <h3>Smartphone Canggih</h3>
                <p>Teknologi terkini dan desain premium untuk memenuhi kebutuhan Anda.</p>
            </div>
        </div>
        <div class="text-center mt-5">
            <button class="btn custom-btn" id="exploreBtn">
                <i class="fas fa-compass"></i> Jelajahi Sekarang
            </button>
        </div>
    </div>
</section>


    <!-- Contact Us Section -->
    <section id="contact" class="bg-light py-5">
        <div class="container">
            <h2 class="text-center">Hubungi Kami</h2>
            <p class="text-center mb-4">Kami di sini untuk membantu! Jika Anda memiliki pertanyaan atau umpan balik, jangan ragu untuk menghubungi kami.</p>
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

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

    <script>
        // SweetAlert untuk tombol "Jelajahi Sekarang"
        document.getElementById('exploreBtn').addEventListener('click', function(e) {
            e.preventDefault(); // Mencegah aksi default tombol

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Apakah Anda benar-benar ingin menjelajah sekarang?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, jelajahi!',
                cancelButtonText: 'Tidak, batalkan!'
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
                title: 'Apakah Anda yakin?',
                text: "Apakah Anda benar-benar ingin keluar?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, keluar!',
                cancelButtonText: 'Tidak, batalkan!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kirim formulir jika dikonfirmasi
                    this.submit();
                }
            });
        });

        
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
