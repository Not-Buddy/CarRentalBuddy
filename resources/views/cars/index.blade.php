<!-- resources/views/cars/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cars Listing</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-6">Available Cars</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($cars as $car)
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <img src="{{ asset($car->image_path) }}" alt="{{ $car->brand }} {{ $car->model }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h2 class="text-xl font-semibold">{{ $car->brand }} {{ $car->model }}</h2>
                        <p class="text-gray-600">{{ $car->year }} • {{ $car->fuel_type }} • {{ $car->transmission }}</p>
                        <p class="mt-2 text-sm text-gray-700">{{ $car->description }}</p>
                        <div class="mt-4">
                            <span class="text-lg font-bold">₹{{ number_format($car->rental_price_per_day, 2) }}</span>
                            <span class="text-sm text-gray-500">/ day</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
