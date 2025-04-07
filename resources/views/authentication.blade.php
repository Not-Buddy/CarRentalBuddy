<!DOCTYPE html>
{{-- Main authenticator start for Login/register page --}}
<div class="relative z-10 w-full max-w-md p-6 bg-black rounded-lg shadow-lg opacity-85">
    <!-- Welcome Message -->
<h1 class="text-2xl font-bold text-center text-white">Welcome</h1>

<!-- Login Form Container -->
<div class="mt-6">
    <h2 class="text-lg font-semibold text-white">Login</h2>
    <form action="/login" method="POST" class="mt-2 space-y-3">
        @csrf
        <input name="loginname" type="text" placeholder="Name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
        <input name="loginpassword" type="password" placeholder="Password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
        <button class="w-full px-4 py-2 text-white bg-green-500 rounded-lg hover:bg-green-600">Log in</button>
    </form>
</div>
<!-- End Login Form -->

<!-- Registration Form Container -->
<div class="mt-6">
    <h2 class="text-lg font-semibold text-white">Register</h2>
    <form action="/register" method="POST" class="mt-2 space-y-3">
        @csrf
        <input name="name" type="text" placeholder="Name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
        <input name="email" type="text" placeholder="Email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
        <input name="password" type="password" placeholder="Password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
        <button class="w-full px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">Register</button>
    </form>
</div>
<!-- End Registration Form -->


</div>{{-- Authenticator for the login/register page close --}}