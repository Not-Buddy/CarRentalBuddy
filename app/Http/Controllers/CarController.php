<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Models\Booking; 

class CarController extends Controller
{
    // Display a listing of the cars
    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));


    }

    public function logged_in()
    {
        $cars = Car::all();
        return view('logged-in', compact('cars'));
    }

    public function book($id)
{
    // 1. Validate the request
    $car = Car::find($id);

    // Check if car exists
    if (!$car) {
        return redirect()->back()->with('error', 'Car not found!');
    }

    // 2. Check user authentication
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'Please login to book a car.');
    }

    // 3. Create booking record
    try {
        Booking::create([
            'car_id' => $car->id,
            'user_id' => auth()->id(),
            'booking_date' => now(), // or use a date picker in your form
            'status' => 'confirmed'
        ]);
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Booking failed: ' . $e->getMessage());
    }

    // 4. Update UI feedback
    session()->flash('booked_car_id', $id);
    return redirect()->back()->with('success', 'Car booked successfully!');
}


    // Store a newly created car in storage
    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required|string',
            'model' => 'required|string',
            'registration_number' => 'required|string|unique:cars',
            'year' => 'required|integer',
            'rental_price_per_day' => 'required|numeric',
            'seating_capacity' => 'required|integer',
            'fuel_type' => 'required|string',
            'transmission' => 'required|string',
            'description' => 'nullable|string',
            'image_path' => 'required|string',
        ]);

        $car = Car::create($request->all());

        return response()->json($car, 201);
    }

    // Display the specified car
    public function show($id)
    {
        $car = Car::findOrFail($id);
        return response()->json($car, 200);
    }

    // Update the specified car in storage
    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);

        $request->validate([
            'brand' => 'sometimes|string',
            'model' => 'sometimes|string',
            'registration_number' => 'sometimes|string|unique:cars,registration_number,' . $id,
            'year' => 'sometimes|integer',
            'rental_price_per_day' => 'sometimes|numeric',
            'seating_capacity' => 'sometimes|integer',
            'fuel_type' => 'sometimes|string',
            'transmission' => 'sometimes|string',
            'description' => 'nullable|string',
            'image_path' => 'sometimes|string',
        ]);

        $car->update($request->all());

        return response()->json($car, 200);
    }

    // Remove the specified car from storage
    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return response()->json(null, 204);
    }
}

