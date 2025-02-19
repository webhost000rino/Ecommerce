<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pembelian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', serif;
            background-color: #f5f5dc;
            color:rgb(0, 0, 0);
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;  /* Memastikan body mengambil minimal tinggi viewport */
        }

        /* Styling Navbar */
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
            color: #f5f5dc !important;
            padding: 8px 15px;
            font-size: 16px;
        }
        .navbar-nav .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
        }

        /* Styling Footer */
        footer {
            background-color: #333;
            color: #fff;
            padding: 30px 0;
            text-align: center;
            font-size: 16px;
            width: 100%;
            margin-top: auto; /* Memastikan footer tetap di bagian bawah */
        }
        footer p {
            font-family: 'Poppins', serif;
        }

        /* Styling Tabel Riwayat Pembelian */
        table {
            width: 100%;
            border-collapse: collapse; /* Memastikan garis-garisnya bergabung dengan baik */
            border: 1px solid #ddd; /* Garis luar tabel */
            font-size: 12px;
        }
        th, td {
            padding: 12px;
            text-align: start; /* Menengahkan teks */
            border: 1px solid #ccc; /* Menambahkan border yang lebih kontras */
        }
        th {
            background-color: #212529;
            color: white;
            text-align: center;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
            border-bottom: 1px solid #ddd; /* Menambahkan border bawah untuk baris genap */
        }
        tr:hover {
            background-color: #ddd;
            border-bottom: 1px solid #bbb; /* Menambahkan border saat hover */
        }

        /* Styling Scrollable Tabel */
        .table-container {
            max-height: 500px;  /* Meningkatkan tinggi untuk lebih banyak konten */
            overflow-y: auto;
            padding-right: 15px; /* Opsional: memastikan scrollbar tidak menutupi konten */
            margin-bottom: 50px; /* Menghindari tumpang tindih dengan footer */
        }

        /* Styling untuk Riwayat Pembelian Kosong */
        .empty-history {
            text-align: center;
            font-size: 20px;
            color:rgb(0, 0, 0);
        }

        /* Media Query untuk responsivitas */
        @media (max-width: 767px) {
            .navbar-brand {
                font-size: 22px;
            }
            table {
                font-size: 10px;
            }
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
                        <a class="nav-link" href="/shopping">Store</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Seksi Riwayat Pembelian -->
    <section class="purchase-history flex-grow-1">
        <div class="container">
            <h2 class="text-center my-5">Riwayat Pembelian</h2>

            @if($purchaseHistory->isEmpty())
                <p class="empty-history">Tidak ada pembelian yang ditemukan.</p>
            @else
                <!-- Kontainer Tabel dengan Scrollable Tabel -->
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th><i>No</i></th>
                                <th><i>Email Pemesan</i></th>
                                <th><i>Alamat</i></th>
                                <th><i>Metode Pembayaran</i></th>
                                <th><i>Produk</i></th>
                                <th><i>Jumlah</i></th>
                                <th><i>Total Harga</i></th>
                                <th><i>Tanggal Pembelian</i></th>
                                <th><i>Status Pengiriman</i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($purchaseHistory as $index => $history)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $history->user ? $history->user->email : 'Email tidak tersedia' }}</td>
                                    <td>{{ $history->alamat }}</td>
                                    <td>{{ ucfirst($history->payment_method) }}</td>
                                    <td>{{ $history->product->title }}</td>
                                    <td>{{ $history->quantity }}</td>
                                    <td>Rp {{ number_format($history->total_price, 0, ',', '.') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($history->purchase_date)->timezone('Asia/Jakarta')->format('d-m-Y H:i') }} WIB</td>
                                    <td>
                                        @if ($history->status)
                                            @switch($history->status)
                                                @case('in-process')
                                                    <span class="badge bg-warning text-dark">In-Process</span>
                                                    @break
                                                @case('failed')
                                                    <span class="badge bg-danger">Failed</span>
                                                    @break
                                                @case('success')
                                                    <span class="badge bg-success">Success</span>
                                                    @break
                                                @default
                                                    <span class="badge bg-secondary">Unknown</span>
                                            @endswitch
                                        @else
                                            <span class="badge bg-secondary">Unknown</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Digitech Store. All Rights Reserved.</p>
    </footer>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
