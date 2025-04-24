<!DOCTYPE html>
<html>
 </body>


 @if(Auth::check())
 <div style="position: absolute; top: 16px; left: 16px; display: flex; align-items: center;">
     <svg width="24" height="24" fill="currentColor" style="margin-right: 8px;">
         <circle cx="12" cy="8" r="4" />
         <ellipse cx="12" cy="17" rx="7" ry="5" />
     </svg>
     <span>{{ Auth::user()->name }}</span>
 </div>
@endif


     @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

                {{-- Logout button --}}
                <div class="absolute top-4 right-4 sm:right-6 md:right-8 lg:right-10">
                    <form action="/logout" method="POST">
                        @csrf 
                        <button class="w-full px-4 py-2 text-white bg-red-500 rounded-lg hover:bg-red-600">Log out</button>
                    </form>
                </div>
                {{-- Logout buttone end --}}


                {{-- Cars displays below --}}
                <div class="mt-20 px-6 z-10">
                    <h1 class="text-2xl font-bold mb-4">Available Cars</h1>
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
            <form action="{{ route('book.car', $car->id) }}" method="POST">
                @csrf
                @if(session('booked_car_id') == $car->id)
                    <button type="button" class="w-full px-4 py-2 text-white bg-green-600 rounded-lg" disabled>
                        Booked
                    </button>
                @else
                    <button type="submit" class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                        Book Car
                    </button>
                @endif
            </form>
            
        </div>
    </div>
@endforeach

                    </div>
                </div>
                {{-- Car display ends above --}}

 </body>
</html>
