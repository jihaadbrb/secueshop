<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SecureShop - Products</title>
    <link rel="stylesheet" href="/build/assets/app-B8PEFR1C.css">
    <script src="/build/assets/app-BfpX1doZ.js" defer></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow p-4 flex justify-between">
        <a href="/" class="text-xl font-bold text-red-600">SecureShop</a>
        <div class="flex gap-4">
            <a href="/products" class="text-gray-600">Products</a>
            @auth
                <a href="/profile" class="text-gray-600">Profile</a>
                <a href="/admin/users" class="text-gray-600">Admin</a>
                <form method="POST" action="/logout">
                    @csrf
                    <button class="text-gray-600">Logout</button>
                </form>
            @else
                <a href="/login" class="text-gray-600">Login</a>
                <a href="/register" class="text-gray-600">Register</a>
            @endauth
        </div>
    </nav>

    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-6">Products</h1>

        {{-- VULNERABLE: search term printed without escaping - XSS --}}
        @if($search)
            <p class="mb-4 text-gray-600">Search results for: {{ $search }}</p>
        @endif

        <form method="GET" action="/products" class="mb-6">
            <div class="flex gap-2">
                <input type="text" name="search" value="{{ $search }}"
                    placeholder="Search products..."
                    class="border rounded px-4 py-2 w-full">
                <button type="submit"
                    class="bg-red-600 text-white px-6 py-2 rounded">Search</button>
            </div>
        </form>

        <div class="grid grid-cols-3 gap-6">
            @foreach($products as $product)
            <div class="bg-white rounded shadow p-6">
                <h2 class="text-xl font-bold">{{ $product->name ?? $product['name'] }}</h2>
                <p class="text-gray-500 mt-2">{{ $product->description ?? $product['description'] }}</p>
                <p class="text-red-600 font-bold mt-4">${{ $product->price ?? $product['price'] }}</p>
                <p class="text-gray-400 text-sm">Stock: {{ $product->stock ?? $product['stock'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
