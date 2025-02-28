<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        @media print {
        /* Sembunyikan semua elemen di luar tabel Purchase History */
            body * {
                visibility: hidden;
            }

            /* Tampilkan hanya Purchase History */
            #history-section, #history-section * {
                visibility: visible;
            }

            #history-section {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
            }

            /* Sembunyikan tombol Print di mode cetak */
            #printPurchaseHistory {
                display: none;
            }
        }
        body {
            background-color: #f0f2f5;
            font-family: 'Poppins', serif;
        }
        
        /* Sidebar Styling */
        .sidebar {
            height: 100vh;
            background: #2c3e50;
            color: #fff;
            position: fixed;
            width: 260px;
            padding: 20px 0;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            z-index: 1030;
            overflow-y: auto;
        }

        .sidebar h4 {
            text-transform: uppercase;
            font-size: 18px;
            letter-spacing: 1px;
            text-align: center;
            margin-bottom: 20px;
            color: #ecf0f1;
        }

        .sidebar a {
            color: #ecf0f1;
            text-decoration: none;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 15px;
            transition: all 0.3s;
            border-radius: 0;
            border-left: 4px solid transparent;
        }

        .sidebar a i {
            font-size: 18px;
            width: 20px;
            text-align: center;
        }

        .sidebar a:hover {
            background: #34495e;
            color: #3498db;
            border-left: 4px solid #3498db;
        }

        .sidebar .btn-custom {
            margin: 10px 15px;
            border-radius: 6px;
        }

        .content {
            margin-left: 260px;
            padding: 20px;
            padding-top: 20px;
            transition: all 0.3s ease;
        }
        
        .main-content {
            margin-top: 20px;
        }
        
        /* Card styling */
        .card {
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            border-radius: 10px;
            margin-bottom: 25px;
        }
        
        .card-header {
            background-color: #3498db;
            color: white;
            border-top-left-radius: 10px !important;
            border-top-right-radius: 10px !important;
            padding: 15px 20px;
            border: none;
        }
        
        .card-header.bg-secondary {
            background-color: #2c3e50 !important;
        }
        
        .card-body {
            padding: 20px;
        }
        
        /* Button styling */
        .btn-primary {
            background-color: #3498db;
            border-color: #3498db;
        }
        
        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }
        
        .btn-danger {
            background-color: #e74c3c;
            border-color: #e74c3c;
        }
        
        .btn-danger:hover {
            background-color: #c0392b;
            border-color: #c0392b;
        }
        
        .btn-success {
            background-color: #2ecc71;
            border-color: #2ecc71;
        }
        
        .btn-success:hover {
            background-color: #27ae60;
            border-color: #27ae60;
        }
        
        /* Base table styling */
        table {
            width: 100%;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 1rem;
        }
        
        table th, table td {
            border: 1px solid #ecf0f1;
            padding: 10px;
            text-align: center;
            vertical-align: middle;
            font-size: 12px;
        }
        
        table thead {
            background-color: #3498db;
            color: #fff;
        }
        
        table thead th {
            text-transform: uppercase;
            font-size: 11px;
            position: sticky;
            top: 0;
            z-index: 10;
            font-weight: 600;
            text-align: center;
        }
        
        table tbody tr {
            transition: background-color 0.3s ease;
        }
        
        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        table tbody tr:hover {
            background-color: #edf2f7;
        }
        
        /* Product table specific styling */
        .products-table {
            min-width: 600px; /* Minimum width to ensure readability */
        }
        
        .products-table td {
            text-align: center;
        }
        
        .products-table td img {
            max-width: 80px;
            max-height: 80px;
            border-radius: 6px;
            transition: transform 0.3s ease;
            object-fit: cover;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        .products-table td img:hover {
            transform: scale(1.1);
        }
        
        /* Purchase history table specific styling */
        #history-section .table {
            min-width: 900px; /* Larger minimum width due to more columns */
        }
        
        #history-section .table th,
        #history-section .table td {
            white-space: nowrap;
            max-width: 150px;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        
        #history-section .table td:nth-child(3) {
            /* Address column */
            max-width: 120px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        
        /* Ensure proper scrolling for all tables */
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            max-width: 100%;
            margin-bottom: 1rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }
        
        /* Improve button layout in tables */
        .table .btn {
            white-space: nowrap;
            margin: 2px;
            padding: 4px 10px;
            font-size: 11px;
            border-radius: 4px;
        }
        
        /* Status dropdown styling */
        .table select.form-select-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
            height: auto;
            width: auto;
            display: inline-block;
            border-radius: 4px;
        }

        .pagination {
            display: flex;
            justify-content: center;
            padding: 15px 0;
            list-style-type: none;
            margin: 0;
        }

        .pagination li {
            margin: 0 5px;
        }

        .pagination a,
        .pagination span {
            display: inline-block;
            padding: 10px 15px;
            font-size: 14px;
            color: #3498db;
            text-decoration: none;
            background: #fff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .pagination a:hover,
        .pagination .active span {
            background: #3498db;
            color: #fff;
            border-color: #3498db;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            transform: scale(1.05);
        }

        .pagination .disabled span {
            color: #6c757d;
            background: #e9ecef;
            border-color: #dee2e6;
            cursor: not-allowed;
        }

        /* Styling tombol print */
        #printPurchaseHistory {
            background-color: #fff;
            color: #3498db;
            border: 1px solid #dee2e6;
            transition: all 0.3s ease;
            font-size: 14px;
            padding: 5px 12px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        #printPurchaseHistory:hover {
            background-color: #3498db;
            color: #fff;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            transform: scale(1.05);
        }

        #printPurchaseHistory i {
            font-size: 14px;
        }
        
        /* Chart section styling */
        #chart-section .card-body {
            min-height: 350px;
        }
        
        .chart-container {
            position: relative;
            height: 300px;
            width: 100%;
        }
        
        /* Filter controls styling */
        .filter-controls {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        
        .filter-controls .form-group {
            min-width: 150px;
            flex: 1;
        }
        
        /* Media queries for responsive design */
        @media (max-width: 991.98px) {
            .sidebar {
                width: 200px;
            }
            
            .content {
                margin-left: 200px;
                padding: 15px;
            }
            
            .table th, .table td {
                padding: 8px 5px;
                font-size: 10px;
            }
            
            .table .btn {
                padding: 0.25rem 0.5rem;
                font-size: 0.75rem;
            }
        }
        
        @media (max-width: 767.98px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                padding: 10px 0;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }
            
            .sidebar .p-3 {
                width: 100%;
                justify-content: center;
            }
            
            .sidebar a {
                width: auto;
                padding: 8px 15px;
                margin: 5px;
                border-radius: 20px;
                border-left: none;
                justify-content: center;
            }
            
            .sidebar a:hover {
                border-left: none;
                background: #3498db;
                color: white;
            }
            
            .sidebar a i {
                margin-right: 5px;
            }
            
            .content {
                margin-left: 0;
                padding: 10px;
            }
            
            .table td img {
                max-width: 60px;
            }
            
            .card-header {
                flex-direction: column;
                align-items: start !important;
            }
            
            .card-header button {
                margin-top: 10px;
                align-self: flex-end;
            }
            
            .card-body {
                padding: 15px 10px;
            }
            
            #history-section .card-header {
                display: flex;
                flex-direction: row !important;
                justify-content: space-between;
                align-items: center !important;
            }
            
            #history-section .card-header button {
                margin-top: 0;
            }
        }
        
        @media (max-width: 575.98px) {
            .sidebar {
                padding: 5px 0;
            }
            
            .sidebar a {
                padding: 6px 12px;
                font-size: 12px;
                margin: 3px;
            }
            
            .sidebar a i {
                font-size: 14px;
            }
            
            .table .btn {
                padding: 0.2rem 0.4rem;
                font-size: 0.7rem;
            }
            
            .table td img {
                max-width: 50px;
            }
            
            /* Additional fixes for extremely small screens */
            .card-header {
                padding: 12px;
            }
            
            .card-header h5 {
                font-size: 16px;
            }
            
            #printPurchaseHistory {
                font-size: 12px;
                padding: 4px 8px;
            }
            
            #printPurchaseHistory i {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
<div class="sidebar">
    <div class="p-3 d-flex align-items-center">
        <img 
            src="{{ asset('image/img.jpg') }}" 
            alt="Profile" 
            class="rounded-circle me-2" 
            data-bs-toggle="modal" 
            data-bs-target="#profileModal" 
            style="cursor: pointer; width: 40px; height: 40px;">
        <h4 class="mb-0">Dashboard</h4>
    </div>
    <a href="#history-chart-section" class="btn-scroll"><i class="fas fa-chart-bar"></i> Sales Chart</a>
    <a href="#products-section" class="btn-scroll"><i class="fas fa-box"></i> Products</a>
    <a href="#history-section" class="btn-scroll"><i class="fas fa-history"></i> Purchase History</a>
    <a href="{{ route('welcome') }}"><i class="fas fa-home"></i> Back to Home</a>
</div>

<!-- Modal for Profile -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel">Admin Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <img src="{{ asset('image/logo.png') }}" alt="Profile Picture" class="rounded-circle mb-3" width="100px">
                    <h5 class="mb-0">admin</h5>
                    <small class="text-muted">admin1719@gmail.com</small>
                </div>
                <hr>
                <p class="text-center">Manage your account settings and log out securely.</p>
            </div>
            <div class="modal-footer">
                <!-- Tombol Logout (dengan ikon) -->
                <form action="{{ route('logout') }}" method="POST" class="d-inline" id="logoutForm">
                    @csrf
                    <button type="submit" class="btn btn-danger logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="main-content">
        <div class="container-fluid">
            <!-- Chart Section (New) -->
            <!-- Add this section after the purchase history table section -->
            <section id="history-chart-section" class="mt-4">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Purchase History Chart</h5>
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="chartHistoryOptions" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-cog"></i> Options
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="chartHistoryOptions">
                                <li><a class="dropdown-item" href="#" id="viewByProduct">View by Product</a></li>
                                <li><a class="dropdown-item" href="#" id="viewByStatus">View by Status</a></li>
                                <li><a class="dropdown-item" href="#" id="viewByPayment">View by Payment Method</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#" id="downloadHistoryChart">Download Chart</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="filter-controls">
                            <div class="form-group">
                                <label for="historyDateRange" class="form-label">Period</label>
                                <select id="historyDateRange" class="form-select">
                                    <option value="7">Last 7 Days</option>
                                    <option value="30" selected>Last 30 Days</option>
                                    <option value="90">Last 3 Months</option>
                                    <option value="180">Last 6 Months</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="historyChartType" class="form-label">Chart Type</label>
                                <select id="historyChartType" class="form-select">
                                    <option value="bar" selected>Bar Chart</option>
                                    <option value="line">Line Chart</option>
                                    <option value="pie">Pie Chart</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="historyDisplayMode" class="form-label">Display Mode</label>
                                <select id="historyDisplayMode" class="form-select">
                                    <option value="count" selected>Item Count</option>
                                    <option value="revenue">Revenue</option>
                                </select>
                            </div>
                        </div>
                        <div class="chart-container">
                            <canvas id="historyChart"></canvas>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Products Section -->
            <section id="products-section">
                <div class="card border-0 shadow-sm rounded mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Products</h5>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('products.create') }}" class="btn btn-success mb-3">ADD PRODUCT</a>
                        <div class="table-responsive">
                            <table class="table products-table">
                                <thead>
                                    <tr>
                                        <th>IMAGE</th>
                                        <th>TITLE</th>
                                        <th>PRICE</th>
                                        <th>STOCK</th>
                                        <th>ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $product)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('/storage/products/'.$product->image) }}" alt="{{ $product->title }}">
                                        </td>
                                        <td>{{ $product->title }}</td>
                                        <td>{{ "Rp " . number_format($product->price, 2, ',', '.') }}</td>
                                        <td>{{ $product->stock }}</td>
                                        <td>
                                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">EDIT</a>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">DELETE</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5">No Products Available.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-center">
                            {{ $products->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </section>

            <section id="history-section">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Purchase History</h5>
                        <button class="btn btn-light btn-sm" id="printPurchaseHistory">
                            <i class="fas fa-print"></i> Save as PDF
                        </button>
                    </div>
                    <div class="card-body">
                        <!-- Improved table-responsive wrapper -->
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Payment</th>
                                        <th>Product</th>
                                        <th>Qty</th>
                                        <th>Total Price</th>
                                        <th>Purchase Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse ($purchaseHistory as $index => $history)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td title="{{ $history->user ? $history->user->email : 'Email not available' }}">
                                            {{ $history->user ? (strlen($history->user->email) > 15 ? substr($history->user->email, 0, 15).'...' : $history->user->email) : 'N/A' }}
                                        </td>
                                        <td title="{{ $history->alamat }}">
                                            {{ strlen($history->alamat) > 15 ? substr($history->alamat, 0, 15).'...' : $history->alamat }}
                                        </td>
                                        <td>{{ ucfirst($history->payment_method) }}</td>
                                        <td title="{{ $history->product->title }}">
                                            {{ strlen($history->product->title) > 15 ? substr($history->product->title, 0, 15).'...' : $history->product->title }}
                                        </td>
                                        <td>{{ $history->quantity }}</td>
                                        <td>Rp {{ number_format($history->total_price, 0, ',', '.') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($history->purchase_date)->timezone('Asia/Jakarta')->format('d-m-Y H:i') }}</td>
                                        <td>
                                            <form action="{{ route('purchase.updateStatus', $history->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <select name="status" class="form-select form-select-sm" onchange="this.form.submit()" 
                                                    style="background-color: {{ $history->status == 'success' ? '#2ecc71' : ($history->status == 'failed' ? '#e74c3c' : '#f39c12') }}; color: white; font-weight: 500;">
                                                    <option value="in-process" {{ $history->status == 'in-process' ? 'selected' : '' }}>In-Process</option>
                                                    <option value="failed" {{ $history->status == 'failed' ? 'selected' : '' }}>Failed</option>
                                                    <option value="success" {{ $history->status == 'success' ? 'selected' : '' }}>Success</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ route('purchase.destroy', $history->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="10">No Purchase History Available.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
<script>
    document.querySelectorAll('.btn-scroll').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });

    @if(session('success'))
    Swal.fire({
        icon: "success",
        title: "Success",
        text: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 2000
    });
    @elseif(session('error'))
    Swal.fire({
        icon: "error",
        title: "Error",
        text: "{{ session('error') }}",
        showConfirmButton: false,
        timer: 2000
    });
    @endif

    // Print Purchase History function
    document.getElementById('printPurchaseHistory').addEventListener('click', function () {
    // Ambil elemen yang ingin dicetak
    const printContent = document.querySelector('#history-section');

    // Buat salinan elemen yang ingin dicetak
    const clonedContent = printContent.cloneNode(true); // Salin elemen

    // Hapus header abu-abu dengan teks "Purchase History"
    const cardHeader = clonedContent.querySelector('.card-header');
    if (cardHeader) {
        cardHeader.remove(); // Menghapus seluruh div header yang berisi "Purchase History"
    }

    // Tambahkan heading "LAPORAN PENJUALAN" ke dalam elemen cetak
    const reportHeading = document.createElement('h2'); // Elemen heading
    reportHeading.textContent = "LAPORAN PENJUALAN"; // Teks heading
    reportHeading.style.textAlign = "center"; // Rata tengah
    reportHeading.style.marginBottom = "20px"; // Margin bawah
    clonedContent.prepend(reportHeading); // Sisipkan heading ke atas elemen

    // Sembunyikan tombol Delete dan Save as PDF sebelum mencetak
    const deleteButtons = clonedContent.querySelectorAll('.btn-danger');
    const saveButtons = clonedContent.querySelectorAll('#printPurchaseHistory');

    deleteButtons.forEach(btn => btn.style.display = 'none');
    saveButtons.forEach(btn => btn.style.display = 'none');

    // Opsi konfigurasi untuk PDF
    const options = {
        margin: 0.5, // Margin PDF dalam inci
        filename: 'laporan_penjualan.pdf', // Nama file PDF
        image: { type: 'jpeg', quality: 0.98 }, // Kualitas gambar
        html2canvas: { scale: 2, useCORS: true }, // Skala resolusi, gunakan CORS untuk elemen eksternal
        jsPDF: { unit: 'in', format: 'a2', orientation: 'landscape' } // Format kertas A4, orientasi landscape
    };

    // Konversi elemen ke PDF dengan auto-page-break
    html2pdf()
        .set(options)
        .from(clonedContent) // Gunakan elemen dengan heading
        .toPdf()
        .get('pdf')
        .then(function (pdf) {
            // Jika tabel panjang, tambahkan auto-split halaman
            const totalPages = pdf.internal.getNumberOfPages();
            for (let i = 1; i <= totalPages; i++) {
                pdf.setPage(i);

                // Menambahkan footer "Hormat Kami, Admin Digitech Store"
                pdf.setFontSize(30);
                pdf.text("Hormat Kami, Admin Digitech Store", pdf.internal.pageSize.width - 2.5, pdf.internal.pageSize.height - 0.5, { align: "right" });
            }
        })
        .save()
        .then(() => {
            // Tampilkan kembali tombol setelah PDF dibuat
            deleteButtons.forEach(btn => btn.style.display = '');
            saveButtons.forEach(btn => btn.style.display = '');
        });
});

// Purchase History Chart Initialization
document.addEventListener('DOMContentLoaded', function() {
    initHistoryChart();
    
    // Add event listeners for the filter controls
    document.getElementById('historyDateRange').addEventListener('change', updateHistoryChart);
    document.getElementById('historyChartType').addEventListener('change', updateHistoryChart);
    document.getElementById('historyDisplayMode').addEventListener('change', updateHistoryChart);
    
    // Add event listeners for the dropdown options
    document.getElementById('viewByProduct').addEventListener('click', function() {
        setHistoryChartMode('product');
    });
    
    document.getElementById('viewByStatus').addEventListener('click', function() {
        setHistoryChartMode('status');
    });
    
    document.getElementById('viewByPayment').addEventListener('click', function() {
        setHistoryChartMode('payment');
    });
    
    document.getElementById('downloadHistoryChart').addEventListener('click', downloadHistoryChart);
});

let historyChartInstance = null;
let historyChartMode = 'product'; // Default mode (product, status, payment)

// Mock data for the history chart - Replace this with actual data from your backend
const historyData = {
    products: [
        @foreach($purchaseHistory as $history)
        {
            id: {{ $history->product->id }},
            title: "{{ $history->product->title }}",
            quantity: {{ $history->quantity }},
            price: {{ $history->total_price }},
            date: "{{ $history->purchase_date }}",
            status: "{{ $history->status }}",
            payment: "{{ $history->payment_method }}"
        },
        @endforeach
    ]
};

function initHistoryChart() {
    const ctx = document.getElementById('historyChart').getContext('2d');
    
    // Destroy existing chart if it exists
    if (historyChartInstance) {
        historyChartInstance.destroy();
    }
    
    // Create the chart with initial data
    historyChartInstance = generateHistoryChart(ctx);
}

function updateHistoryChart() {
    initHistoryChart();
}

function setHistoryChartMode(mode) {
    historyChartMode = mode;
    updateHistoryChart();
}

function generateHistoryChart(ctx) {
    const dateRange = parseInt(document.getElementById('historyDateRange').value);
    const chartType = document.getElementById('historyChartType').value;
    const displayMode = document.getElementById('historyDisplayMode').value;
    
    // Filter data by date range
    const cutoffDate = new Date();
    cutoffDate.setDate(cutoffDate.getDate() - dateRange);
    
    const filteredData = historyData.products.filter(item => {
        return new Date(item.date) >= cutoffDate;
    });
    
    // Process data based on selected mode
    let labels = [];
    let datasets = [];
    let backgroundColors = [];
    
    if (historyChartMode === 'product') {
        // Group by product
        const productGroups = {};
        
        filteredData.forEach(item => {
            if (!productGroups[item.title]) {
                productGroups[item.title] = {
                    count: 0,
                    revenue: 0
                };
            }
            
            productGroups[item.title].count += item.quantity;
            productGroups[item.title].revenue += item.price;
        });
        
        labels = Object.keys(productGroups);
        const data = labels.map(label => {
            return displayMode === 'count' ? productGroups[label].count : productGroups[label].revenue;
        });
        
        // Generate colors
        backgroundColors = labels.map((_, index) => {
            return `hsl(${index * (360 / labels.length)}, 70%, 60%)`;
        });
        
        datasets = [{
            label: displayMode === 'count' ? 'Product Quantity' : 'Product Revenue (Rp)',
            data: data,
            backgroundColor: backgroundColors
        }];
    } 
    else if (historyChartMode === 'status') {
        // Group by status
        const statusGroups = {
            'success': { count: 0, revenue: 0 },
            'failed': { count: 0, revenue: 0 },
            'in-process': { count: 0, revenue: 0 }
        };
        
        filteredData.forEach(item => {
            statusGroups[item.status].count += item.quantity;
            statusGroups[item.status].revenue += item.price;
        });
        
        labels = Object.keys(statusGroups);
        const data = labels.map(label => {
            return displayMode === 'count' ? statusGroups[label].count : statusGroups[label].revenue;
        });
        
        // Status colors
        backgroundColors = [
            '#2ecc71', // success - green
            '#e74c3c', // failed - red
            '#f39c12'  // in-process - orange
        ];
        
        datasets = [{
            label: displayMode === 'count' ? 'Order Count by Status' : 'Revenue by Status (Rp)',
            data: data,
            backgroundColor: backgroundColors
        }];
    }
    else if (historyChartMode === 'payment') {
        // Group by payment method
        const paymentGroups = {};
        
        filteredData.forEach(item => {
            if (!paymentGroups[item.payment]) {
                paymentGroups[item.payment] = {
                    count: 0,
                    revenue: 0
                };
            }
            
            paymentGroups[item.payment].count += item.quantity;
            paymentGroups[item.payment].revenue += item.price;
        });
        
        labels = Object.keys(paymentGroups);
        const data = labels.map(label => {
            return displayMode === 'count' ? paymentGroups[label].count : paymentGroups[label].revenue;
        });
        
        // Payment method colors
        backgroundColors = [
            '#3498db', // Blue
            '#9b59b6', // Purple
            '#1abc9c', // Turquoise
            '#f1c40f'  // Yellow
        ];
        
        datasets = [{
            label: displayMode === 'count' ? 'Orders by Payment Method' : 'Revenue by Payment Method (Rp)',
            data: data,
            backgroundColor: backgroundColors.slice(0, labels.length)
        }];
    }
    
    // Format revenue values for better display
    if (displayMode === 'revenue') {
        datasets[0].data = datasets[0].data.map(value => {
            return Math.round(value / 1000); // Convert to thousands for better display
        });
        datasets[0].label += ' (in thousands)';
    }
    
    // Create Chart configuration
    const config = {
        type: chartType,
        data: {
            labels: labels,
            datasets: datasets
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            
                            if (displayMode === 'revenue') {
                                return label + 'Rp ' + (context.raw * 1000).toLocaleString('id-ID');
                            } else {
                                return label + context.raw;
                            }
                        }
                    }
                }
            },
            scales: chartType !== 'pie' ? {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            if (displayMode === 'revenue') {
                                return 'Rp ' + (value * 1000).toLocaleString('id-ID');
                            }
                            return value;
                        }
                    }
                }
            } : {}
        }
    };
    
    return new Chart(ctx, config);
}

function downloadHistoryChart() {
    const canvas = document.getElementById('historyChart');
    
    // Create link element
    const link = document.createElement('a');
    
    // Convert canvas to data URL
    const imageURL = canvas.toDataURL('image/png');
    
    // Set properties
    link.href = imageURL;
    link.download = 'purchase_history_chart.png';
    
    // Trigger download
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}
</script>
</body>
</html>