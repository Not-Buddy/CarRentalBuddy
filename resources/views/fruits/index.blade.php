<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruits List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-50 to-blue-100 min-h-screen flex items-center justify-center p-6">

    <div class="max-w-4xl w-full bg-white p-8 rounded-xl shadow-lg">
        <h1 class="text-3xl font-extrabold text-gray-800 text-center mb-6">Available Fruits 🍎🍌🍇</h1>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse overflow-hidden rounded-lg shadow-lg">
                <thead>
                    <tr class="bg-blue-500 text-white text-lg">
                        <th class="px-6 py-3">Name</th>
                        <th class="px-6 py-3">Color</th>
                        <th class="px-6 py-3">Price ($)</th>
                        <th class="px-6 py-3">Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fruits as $fruit)
                        <tr class="text-gray-800 text-lg text-center border-b hover:bg-blue-100 transition">
                            <td class="px-6 py-3">{{ $fruit->name }}</td>
                            <td class="px-6 py-3">
                                <span class="px-3 py-1 text-sm font-semibold rounded-full" 
                                      style="background-color: {{ strtolower($fruit->color) }}; color: white;">
                                    {{ $fruit->color }}
                                </span>
                            </td>
                            <td class="px-6 py-3 font-semibold">${{ number_format($fruit->price, 2) }}</td>
                            <td class="px-6 py-3">{{ $fruit->quantity }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
