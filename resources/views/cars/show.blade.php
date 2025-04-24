@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card mb-4" style="max-width: 800px; margin: auto;">
        <img src="{{ asset($car->image_path) }}" class="card-img-top" style="max-height: 400px; object-fit: cover;">
        <div class="card-body">
            <h2 class="card-title">{{ $car->brand }} {{ $car->model }}</h2>
            <h4 class="card-subtitle mb-2 text-muted">{{ $car->year }} • {{ $car->fuel_type }} • {{ $car->transmission }}</h4>
            <p class="card-text">{{ $car->description }}</p>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Registration: {{ $car->registration_number }}</li>
                <li class="list-group-item">Seats: {{ $car->seating_capacity }}</li>
                <li class="list-group-item">Price per day: ₹{{ $car->rental_price_per_day }}</li>
            </ul>
        </div>
    </div>
</div>
@endsection
