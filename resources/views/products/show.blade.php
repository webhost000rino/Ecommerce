<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background: #f5f5f5;
            font-family: 'Poppins', sans-serif;
            color: #333;
            padding-bottom: 40px;
        }

        .product-container {
            background: #fff;
            border-radius: 12px;
            padding: 30px;
            margin-top: 50px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            max-width: 1200px;
        }

        /* Enhanced Image Gallery Styling */
        .product-gallery {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            position: relative;
            height: 100%;
            min-height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .product-image-wrapper {
            position: relative;
            width: 100%;
            height: 100%;
            overflow: hidden;
            background: #fafafa;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .product-image {
            max-width: 100%;
            max-height: 400px;
            object-fit: contain;
            transition: transform 0.5s ease;
            z-index: 1;
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, rgba(0,0,0,0.01), rgba(0,0,0,0.05));
            z-index: 0;
        }

        .image-zoom-icon {
            position: absolute;
            right: 15px;
            bottom: 15px;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 2;
            transition: all 0.3s ease;
            color: #333;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .image-zoom-icon:hover {
            transform: scale(1.1);
            background: #fff;
        }

        /* Image Badge Styling */
        .image-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: #3498db;
            color: white;
            padding: 5px 15px;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 600;
            z-index: 2;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }

        /* Image Focus Effect */
        .product-image-wrapper:hover .product-image {
            transform: scale(1.05);
        }

        .product-details {
            background: #fff;
            border-radius: 12px;
            padding: 30px;
            height: 100%;
        }

        .product-title {
            font-size: 2.2rem;
            font-weight: 700;
            color: #222;
            margin-bottom: 15px;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 15px;
        }

        .product-price {
            font-size: 1.8rem;
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .price-tag {
            background: #f8f9fa;
            padding: 5px 15px;
            border-radius: 50px;
            margin-bottom: 25px;
            border: 1px solid #eaeaea;
            margin-right: 10px;
        }

        .product-description {
            font-size: 1rem;
            color: #555;
            line-height: 1.7;
            margin-bottom: 25px;
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #3498db;
        }

        .stock-info {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 50px;
            font-weight: 500;
            margin-bottom: 25px;
            background: #e8f4fd;
            color: #3498db;
            border: 1px solid #d1e6f9;
        }

        .form-label {
            font-weight: 600;
            color: #444;
            margin-bottom: 8px;
        }

        .form-control, .form-select {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #ddd;
            background-color: #f8f9fa;
            transition: all 0.3s ease;
            font-size: 15px;
        }

        .form-control:focus, .form-select:focus {
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
            border-color: #3498db;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #3498db;
            border: none;
            padding: 12px 25px;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(52, 152, 219, 0.3);
        }

        .btn-primary:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(52, 152, 219, 0.4);
        }

        .btn-secondary {
            background-color: #7f8c8d;
            border: none;
            padding: 12px 25px;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(127, 140, 141, 0.3);
        }

        .btn-secondary:hover {
            background-color: #95a5a6;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(127, 140, 141, 0.4);
        }

        .action-buttons {
            display: flex;
            gap: 15px;
            margin-top: 25px;
        }

        .counter-input {
            display: flex;
            align-items: center;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
        }

        .counter-btn {
            background: #f8f9fa;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .counter-btn:hover {
            background: #e9ecef;
        }

        #quantity {
            border: none;
            text-align: center;
            width: 50px;
            font-weight: 600;
            background: #fff;
        }

        .payment-method-selector label {
            display: block;
            margin-bottom: 10px;
        }

        .payment-option {
            display: flex;
            align-items: center;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 10px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .payment-option:hover {
            background: #f8f9fa;
        }

        .payment-option.selected {
            border-color: #3498db;
            background: #e8f4fd;
        }

        .payment-option-icon {
            margin-right: 10px;
            font-size: 1.2rem;
            color: #3498db;
        }

        .section-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: #2c3e50;
        }

        /* Image Preview Modal */
        .modal-image-preview {
            width: 100%;
            max-height: 80vh;
            object-fit: contain;
        }

        @media (max-width: 767px) {
            .product-container {
                padding: 20px;
                margin-top: 20px;
            }
            
            .product-title {
                font-size: 1.8rem;
            }
            
            .product-gallery {
                min-height: 300px;
                margin-bottom: 20px;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .btn-primary, .btn-secondary {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container product-container">
        <div class="row g-4">
            <div class="col-lg-5">
                <!-- Enhanced Image Gallery -->
                <div class="product-gallery">
                    <div class="image-badge">Featured</div>
                    <div class="image-overlay"></div>
                    <div class="product-image-wrapper" id="productImageContainer">
                        <img 
                            src="{{ asset('/storage/products/'.$product->image) }}" 
                            class="product-image" 
                            id="productImage"
                            alt="{{ $product->title }}"
                        >
                    </div>
                    <div class="image-zoom-icon" id="imageZoomButton">
                        <i class="fas fa-search-plus"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="product-details">
                    <h1 class="product-title">{{ $product->title }}</h1>
                    
                    <div class="product-price">
                        <span class="price-tag">
                            <i class="fas fa-tag me-2"></i>
                            {{ "Rp " . number_format($product->price, 0, ',', '.') }}
                        </span>
                        <span class="stock-info">
                            <i class="fas fa-box me-1"></i> Stock: {{ $product->stock }}
                        </span>
                    </div>

                    <div class="product-description">
                        {!! $product->description !!}
                    </div>

                    <form id="purchaseForm" action="{{ route('buy.product', $product->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <div class="counter-input">
                                        <button type="button" class="counter-btn" id="decreaseBtn">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <input type="number" id="quantity" name="quantity" min="1" max="{{ $product->stock }}" value="1" readonly>
                                        <button type="button" class="counter-btn" id="increaseBtn">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Total Price</label>
                                    <div class="form-control bg-light" id="totalPrice">
                                        {{ "Rp " . number_format($product->price, 0, ',', '.') }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address" class="form-label">Shipping Address</label>
                            <textarea class="form-control" id="address" name="address" rows="2" placeholder="Enter your complete address" required></textarea>
                        </div>

                        <div class="form-group">
                            <label class="section-title">Payment Method</label>
                            <div class="payment-method-selector">
                                <div class="payment-option" data-value="transfer">
                                    <i class="fas fa-university payment-option-icon"></i>
                                    <div>
                                        <strong>Bank Transfer</strong>
                                        <div class="text-muted small">Pay via bank transfer</div>
                                    </div>
                                </div>
                                <div class="payment-option" data-value="cash">
                                    <i class="fas fa-money-bill-wave payment-option-icon"></i>
                                    <div>
                                        <strong>Cash</strong>
                                        <div class="text-muted small">Pay with cash on delivery</div>
                                    </div>
                                </div>
                                <input type="hidden" id="paymentMethod" name="payment_method" value="">
                            </div>
                        </div>

                        <div class="action-buttons">
                            <button type="submit" class="btn btn-primary" id="buyButton">
                                <i class="fas fa-shopping-cart me-2"></i> Buy Now
                            </button>
                            <a href="/shopping" class="btn btn-secondary" id="backToStoreButton">
                                <i class="fas fa-arrow-left me-2"></i> Back to Store
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Image Zoom Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $product->title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center p-0">
                    <img src="{{ asset('/storage/products/'.$product->image) }}" class="modal-image-preview" alt="{{ $product->title }}">
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const productPrice = {{ $product->price }};
            const maxStock = {{ $product->stock }};
            const quantityInput = document.getElementById('quantity');
            const totalPriceDisplay = document.getElementById('totalPrice');
            const decreaseBtn = document.getElementById('decreaseBtn');
            const increaseBtn = document.getElementById('increaseBtn');
            const paymentOptions = document.querySelectorAll('.payment-option');
            const paymentMethodInput = document.getElementById('paymentMethod');
            
            // Image zoom functionality
            const imageZoomButton = document.getElementById('imageZoomButton');
            const imageModal = new bootstrap.Modal(document.getElementById('imageModal'));
            
            imageZoomButton.addEventListener('click', function() {
                imageModal.show();
            });
            
            // Product image hover effects
            const productImage = document.getElementById('productImage');
            const productImageContainer = document.getElementById('productImageContainer');
            
            productImageContainer.addEventListener('mousemove', function(e) {
                const rect = productImageContainer.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                // Calculate mouse position as percentage
                const xPercent = x / rect.width;
                const yPercent = y / rect.height;
                
                // Create subtle 3D effect based on mouse position
                const transformX = (xPercent - 0.5) * 5; // -2.5 to 2.5 degree tilt
                const transformY = (yPercent - 0.5) * 5; // -2.5 to 2.5 degree tilt
                
                productImage.style.transform = `scale(1.03) perspective(1000px) rotateY(${transformX}deg) rotateX(${-transformY}deg)`;
            });
            
            productImageContainer.addEventListener('mouseleave', function() {
                productImage.style.transform = 'scale(1) rotateY(0) rotateX(0)';
            });
            
            // Handle quantity changes
            function updateTotalPrice() {
                const quantity = parseInt(quantityInput.value);
                const total = quantity * productPrice;
                totalPriceDisplay.textContent = "Rp " + total.toLocaleString('id-ID');
            }
            
            decreaseBtn.addEventListener('click', function() {
                const currentValue = parseInt(quantityInput.value);
                if (currentValue > 1) {
                    quantityInput.value = currentValue - 1;
                    updateTotalPrice();
                }
            });
            
            increaseBtn.addEventListener('click', function() {
                const currentValue = parseInt(quantityInput.value);
                if (currentValue < maxStock) {
                    quantityInput.value = currentValue + 1;
                    updateTotalPrice();
                }
            });
            
            // Handle payment method selection
            paymentOptions.forEach(option => {
                option.addEventListener('click', function() {
                    paymentOptions.forEach(opt => opt.classList.remove('selected'));
                    this.classList.add('selected');
                    paymentMethodInput.value = this.dataset.value;
                });
            });
            
            // Get logged-in user's email
            const loggedInUserEmail = '{{ Auth::user()->email ?? "" }}';

            // If the logged-in user is admin1719, hide the "Buy Now" button
            if (loggedInUserEmail === 'admin1719@gmail.com') {
                document.getElementById('buyButton').style.display = 'none';
            }

            // Form validation and submission
            document.getElementById('buyButton').addEventListener('click', function(event) {
                event.preventDefault();

                const quantity = parseInt(quantityInput.value);
                const address = document.getElementById('address').value.trim();
                const paymentMethod = paymentMethodInput.value;
                const totalPrice = productPrice * quantity;

                if (quantity <= 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Invalid Quantity',
                        text: 'Quantity must be greater than zero',
                    });
                } else if (quantity > maxStock) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Insufficient Stock',
                        text: 'Not enough stock available for the requested quantity',
                    });
                } else if (address === '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Address Required',
                        text: 'Please enter your shipping address',
                    });
                } else if (paymentMethod === '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Payment Method Required',
                        text: 'Please select a payment method',
                    });
                } else {
                    Swal.fire({
                        title: 'Confirm Purchase',
                        html: `
                            <div class="text-left">
                                <p>You're about to purchase:</p>
                                <ul style="list-style: none; padding: 0;">
                                    <li><strong>Product:</strong> {{ $product->title }}</li>
                                    <li><strong>Quantity:</strong> ${quantity}</li>
                                    <li><strong>Total:</strong> Rp ${totalPrice.toLocaleString('id-ID')}</li>
                                    <li><strong>Payment:</strong> ${paymentMethod.charAt(0).toUpperCase() + paymentMethod.slice(1)}</li>
                                </ul>
                            </div>
                        `,
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, Buy Now!',
                        cancelButtonText: 'Cancel'
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
                    title: 'Return to Store?',
                    text: "Are you sure you want to return to the store?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, take me back!',
                    cancelButtonText: 'No, stay here'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/shopping';
                    }
                });
            });
            
            // Check for session messages
            @if(session('success'))
                const quantity = {{ session('quantity') }};
                const totalPrice = {{ session('totalPrice') }};
                Swal.fire({
                    icon: 'success',
                    title: 'Purchase Successful!',
                    text: `You've successfully purchased ${quantity} item(s) for Rp ${totalPrice.toLocaleString('id-ID')}`,
                });
            @endif

            @if(session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Failed!',
                    text: '{{ session('error') }}',
                });
            @endif
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

