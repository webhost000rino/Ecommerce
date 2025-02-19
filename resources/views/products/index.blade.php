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
            background-color: #f8f9fa;
            font-family: 'Poppins' , serif;
        }
         /* Sidebar Styling */
         .sidebar {
            height: 100vh;
            background: #555;
            color: #fff;
            position: fixed;
            width: 260px;
            padding: 20px 0;
            box-shadow: 3px 0 10px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .sidebar h4 {
            text-transform: uppercase;
            font-size: 18px;
            letter-spacing: 1px;
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 15px;
            transition: background 0.3s, color 0.3s;
        }

        .sidebar a i {
            font-size: 18px;
        }

        .sidebar a:hover {
            background: #a8dadc;
            color: #1d3557;
            border-radius: 8px;
        }

        .sidebar .logout {
            color: #e63946;
            margin-top: auto;
        }

        /* Header Styling */
        .header {
            background: #555;
            color: #fff;
            padding: 15px 30px;
            position: fixed;
            left: 260px;
            top: 0;
            width: calc(100% - 260px);
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .header .profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .header .profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid #fff;
        }

        .content {
            margin-left: 260px;
            padding: 20px;
            padding-top: 80px;
        }
        .main-content {
            margin-top: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        table th, table td {
            border: 1px solid #dee2e6;
            padding: 12px 15px;
            text-align: left;
            vertical-align: middle;
            font-size: 11px;
        }
        table thead {
            background-color: #007bff;
            color: #fff;
        }
        table thead th {
            text-transform: uppercase;
            font-size: 10px;
            text-align: center;
        }
        table tbody tr {
            transition: background-color 0.3s ease;
        }
        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        table tbody tr:hover {
            background-color: #e9ecef;
        }
        table tbody td img {
            max-width: 80px;
            border-radius: 4px;
            transition: transform 0.3s ease;
        }
        table tbody td img:hover {
            transform: scale(1.1);
        }
        table tbody td {
            max-width: 150px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        
        /* Tambahkan ini ke dalam style */
        table.products-table th,
        table.products-table td {
            text-align: center; /* Pastikan semua teks tabel produk rata tengah */
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
            color: #007bff;
            text-decoration: none;
            background: #fff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .pagination a:hover,
        .pagination .active span {
            background: #007bff;
            color: #fff;
            border-color: #007bff;
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
            background-color: #ffffff;
            color: #007bff;
            border: 1px solid #dee2e6;
            transition: all 0.3s ease;
            font-size: 14px;
            padding: 5px 10px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        #printPurchaseHistory:hover {
            background-color: #007bff;
            color: #ffffff;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            transform: scale(1.05);
        }

        #printPurchaseHistory i {
            font-size: 14px;
        }

        /* Responsiveness for Purchase History Table */
        #history-section table {
            table-layout: fixed;
            width: 100%;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        #history-section table th, 
        #history-section table td {
            text-align: center;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
            padding: 12px 10px;
            font-size: 11px;
            border: 1px solid #dee2e6;
        }

        #history-section table tbody tr:hover {
            background-color: #e9ecef;
        }

        /* Add horizontal scrolling for small screens */
        #history-section {
            overflow-x: auto;
        }

        #history-section table thead th {
            background-color: #007bff;
            color: #fff;
            text-transform: uppercase;
            font-size: 10px;
        }
    </style>

</head>
<body>
    <div class="sidebar">
        <div class="p-3 text-center">
            <h4>Admin Dashboard</h4>
        </div>
        <a href="#products-section" class="btn-scroll"><i class="fas fa-box"></i> Products</a>
        <a href="#history-section" class="btn-scroll"><i class="fas fa-history"></i> Purchase History</a>
        <a href="{{ route('welcome') }}" class="btn btn-custom"><i class="fas fa-home"></i> Back to Home</a>
    </div>


    <div class="header">
            <h1>Welcome, Admin</h1>
        <div class="profile">
    <img 
        src="{{ asset('image/img.jpg') }}" 
        alt="Profile" 
        class="rounded-circle" 
        data-bs-toggle="modal" 
        data-bs-target="#profileModal" 
        style="cursor: pointer; width: 40px; height: 40px;">
</div>
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
                <!-- Products Section -->
                <section id="products-section">
                    <div class="card border-0 shadow-sm rounded mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Products</h5>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('products.create') }}" class="btn btn-success mb-3">ADD PRODUCT</a>
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
                            <!-- Wrapper for scrollable table -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Email Pemesan</th>
                                            <th>Address</th>
                                            <th>Payment</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                            <th>Purchase Date</th>
                                            <th>Status</th>
                                            <th>ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @forelse ($purchaseHistory as $index => $history)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $history->user ? $history->user->email : 'Email not available' }}</td>
                                            <td>{{ $history->alamat }}</td>
                                            <td>{{ ucfirst($history->payment_method) }}</td>
                                            <td>{{ $history->product->title }}</td>
                                            <td>{{ $history->quantity }}</td>
                                            <td>Rp {{ number_format($history->total_price, 0, ',', '.') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($history->purchase_date)->timezone('Asia/Jakarta')->format('d-m-Y H:i') }} WIB</td>
                                            <td>
                                                <form action="{{ route('purchase.updateStatus', $history->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
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
                                            <td colspan="8">No Purchase History Available.</td>
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

    </script>
</body>
</html>
