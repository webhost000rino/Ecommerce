<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pembelian | Digitech Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
            --navbar-height: 70px;
        }
        
        /* General styles */
        html {
            scroll-padding-top: 70px;
            scroll-behavior: smooth;
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

        /* Main content */
        .main-content {
            flex: 1;
            padding: 40px 0;
            margin-top: var(--navbar-height);
        }
        
        .page-title {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 30px;
            position: relative;
            display: inline-block;
        }
        
        .page-title:after {
            content: '';
            position: absolute;
            width: 60%;
            height: 3px;
            background-color: var(--accent-color);
            bottom: -10px;
            left: 0;
        }

        /* Table */
        .card {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            border: none;
            overflow: hidden;
            margin-bottom: 30px;
        }
        
        .table-responsive {
            max-height: 600px;
            overflow-y: auto;
        }
        
        .purchase-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            font-size: 14px;
        }
        
        .purchase-table th {
            background-color: var(--primary-color);
            color: white;
            font-weight: 500;
            text-align: center;
            padding: 15px 10px;
            position: sticky;
            top: 0;
            z-index: 10;
        }
        
        .purchase-table td {
            padding: 12px 10px;
            border-bottom: 1px solid #eee;
            vertical-align: middle;
        }
        
        .purchase-table tr:last-child td {
            border-bottom: none;
        }
        
        .purchase-table tr:hover {
            background-color: rgba(74, 111, 220, 0.05);
        }
        
        /* Status badges */
        .status-badge {
            padding: 6px 12px;
            border-radius: 30px;
            font-weight: 500;
            font-size: 12px;
            display: inline-block;
            text-align: center;
            min-width: 100px;
        }
        
        .status-in-process {
            background-color: #fff3cd;
            color: #856404;
            border: 1px solid #ffeeba;
        }
        
        .status-failed {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .status-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        /* Empty state */
        .empty-history {
            text-align: center;
            padding: 50px 0;
            color: #6c757d;
            font-size: 18px;
        }
        
        .empty-history i {
            font-size: 60px;
            display: block;
            margin-bottom: 20px;
            color: #dee2e6;
        }

        /* Footer */
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
            transition: var(--transition);
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
            transition: var(--transition);
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

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .navbar-nav {
                margin-top: 15px;
            }
            
            .navbar-nav .nav-link {
                display: inline-block;
                margin: 5px;
            }
        }
        
        @media (max-width: 768px) {
            .purchase-table {
                font-size: 12px;
            }
            
            .purchase-table th, 
            .purchase-table td {
                padding: 10px 5px;
            }
            
            .page-title {
                font-size: 24px;
            }
            
            .status-badge {
                min-width: 80px;
                padding: 4px 8px;
            }
        }
        
        @media (max-width: 576px) {
            .main-content {
                padding: 20px 0;
            }
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
                        <a class="nav-link" href="/shopping">
                            <i class="fas fa-shopping-bag me-1"></i> Store
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <h2 class="page-title text-center">Riwayat Pembelian</h2>
            
            @if($purchaseHistory->isEmpty())
                <div class="empty-history">
                    <i class="fas fa-shopping-bag"></i>
                    <p>Belum ada pembelian yang tercatat. Silakan kunjungi <a href="/shopping" class="text-primary">toko kami</a> untuk memulai berbelanja.</p>
                </div>
            @else
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="purchase-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th><i class="fas fa-envelope me-1"></i>Email Pemesan</th>
                                        <th><i class="fas fa-map-marker-alt me-1"></i>Alamat</th>
                                        <th><i class="fas fa-credit-card me-1"></i>Pembayaran</th>
                                        <th><i class="fas fa-box me-1"></i>Produk</th>
                                        <th><i class="fas fa-sort-amount-up me-1"></i>Jumlah Barang</th>
                                        <th><i class="fas fa-tag me-1"></i>Total Harga</th>
                                        <th><i class="fas fa-calendar-alt me-1"></i>Tanggal</th>
                                        <th><i class="fas fa-truck me-1"></i>Status Pengiriman</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($purchaseHistory as $index => $history)
                                        <tr>
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td>{{ $history->user ? $history->user->email : 'Email tidak tersedia' }}</td>
                                            <td>{{ $history->alamat }}</td>
                                            <td class="text-capitalize">{{ $history->payment_method }}</td>
                                            <td>{{ $history->product->title }}</td>
                                            <td class="text-center">{{ $history->quantity }}</td>
                                            <td>Rp {{ number_format($history->total_price, 0, ',', '.') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($history->purchase_date)->timezone('Asia/Jakarta')->format('d-m-Y H:i') }} WIB</td>
                                            <td class="text-center">
                                                @if ($history->status)
                                                    @switch($history->status)
                                                        @case('in-process')
                                                            <span class="status-badge status-in-process">
                                                                <i class="fas fa-spinner fa-spin me-1"></i>Diproses
                                                            </span>
                                                            @break
                                                        @case('failed')
                                                            <span class="status-badge status-failed">
                                                                <i class="fas fa-times-circle me-1"></i>Gagal
                                                            </span>
                                                            @break
                                                        @case('success')
                                                            <span class="status-badge status-success">
                                                                <i class="fas fa-check-circle me-1"></i>Sukses
                                                            </span>
                                                            @break
                                                        @default
                                                            <span class="status-badge">
                                                                <i class="fas fa-question-circle me-1"></i>Unknown
                                                            </span>
                                                    @endswitch
                                                @else
                                                    <span class="status-badge">
                                                        <i class="fas fa-question-circle me-1"></i>Unknown
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

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

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Script to handle navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>