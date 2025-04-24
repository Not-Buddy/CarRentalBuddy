@extends('layouts.app')

@section('content')
<style>
    .hero-section {
        position: relative;
        height: 70vh;
        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                    url('{{ asset($car->image_path) }}');
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: flex-end;
        padding: 3rem;
        color: white;
        margin-bottom: 3rem;
    }
    
    .details-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        backdrop-filter: blur(5px);
        transform: translateY(50px);
    }
    
    .spec-badge {
        background: rgba(13, 110, 253, 0.1);
        color: #0d6efd;
        padding: 0.5rem 1rem;
        border-radius: 50px;
    }
    
    .price-tag {
        font-size: 2.5rem;
        font-weight: 700;
        background: linear-gradient(135deg, #0d6efd, #00b4d8);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    
    .floating-btn {
        position: fixed;
        bottom: 2rem;
        right: 2rem;
        z-index: 1000;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
    }
    
    @media (max-width: 768px) {
        .hero-section {
            height: 50vh;
            padding: 1.5rem;
        }
        
        .details-card {
            transform: translateY(20px);
        }
    }
</style>

<div class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3">{{ $car->brand }} {{ $car->model }}</h1>
                <div class="d-flex gap-3 mb-4">
                    <span class="spec-badge">{{ $car->year }}</span>
                    <span class="spec-badge">{{ $car->fuel_type }}</span>
                    <span class="spec-badge">{{ $car->transmission }}</span>
                </div>
                <p class="lead mb-0">{{ $car->registration_number }}</p>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="details-card p-4 p-md-5">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="fw-bold mb-4">Vehicle Description</h3>
                        <p class="text-muted mb-4">{{ $car->description }}</p>
                        
                        <h3 class="fw-bold mb-4">Specifications</h3>
                        <ul class="list-unstyled">
                            <li class="mb-3 d-flex justify-content-between">
                                <span class="fw-semibold">Seating Capacity</span>
                                <span>{{ $car->seating_capacity }} seats</span>
                            </li>
                            <li class="mb-3 d-flex justify-content-between">
                                <span class="fw-semibold">Fuel Type</span>
                                <span class="text-capitalize">{{ $car->fuel_type }}</span>
                            </li>
                            <li class="mb-3 d-flex justify-content-between">
                                <span class="fw-semibold">Transmission</span>
                                <span class="text-capitalize">{{ $car->transmission }}</span>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="bg-light p-4 rounded-4 h-100">
                            <div class="d-flex flex-column h-100 justify-content-between">
                                <div>
                                    <h3 class="fw-bold mb-4">Pricing</h3>
                                    <div class="d-flex align-items-end mb-3">
                                        <span class="price-tag me-2">₹{{ number_format($car->rental_price_per_day, 2) }}</span>
                                        <span class="text-muted">/ day</span>
                                    </div>
                                    <p class="text-muted small">Inclusive of all taxes and insurance</p>
                                </div>
                                
                                <div>
                                    <button id="book-btn" onclick="bookNow()" class="btn btn-primary btn-lg w-100 py-3 mb-3">
                                        Book Now
                                    </button>
                                                                        <script>
                                        function bookNow() {
                                            const btn = document.getElementById('book-btn');
                                            btn.textContent = 'Booked';
                                            btn.classList.remove('bg-blue-500');
                                            btn.classList.add('bg-green-500');
                                            btn.disabled = true; // optional: disable after booking
                                        }
                                    </script>
                                    
                                    <button id="wishlist-btn" onclick="saveToWishlist()" class="btn btn-outline-secondary w-100">
                                        <i class="bi bi-heart me-2"></i> Save to Wishlist
                                    </button>
                                    
                                    <script>
                                        function saveToWishlist() {
                                            const btn = document.getElementById('wishlist-btn');
                                            btn.innerHTML = '<i class="bi bi-heart-fill me-2"></i> Saved';
                                            btn.classList.remove('btn-outline-secondary');
                                            btn.classList.add('btn-success');
                                            btn.disabled = true; // optional
                                        }
                                    </script>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Floating Action Button -->
<button class="floating-btn btn btn-primary btn-lg rounded-circle p-3">
    <i class="bi bi-arrow-up-short" style="font-size: 1.5rem;"></i>
</button>

<script>
    // Simple scroll-to-top functionality
    document.querySelector('.floating-btn').addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
</script>
@endsection