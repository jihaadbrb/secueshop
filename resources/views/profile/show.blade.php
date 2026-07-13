<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SecureShop - Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow p-4 flex justify-between">
        <a href="/" class="text-xl font-bold text-red-600">SecureShop</a>
        <div class="flex gap-4">
            <a href="/products" class="text-gray-600">Products</a>
            <a href="/admin/users" class="text-gray-600">Admin</a>
            <form method="POST" action="/logout">
                @csrf
                <button class="text-gray-600">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container mx-auto p-8 max-w-lg">
        <h1 class="text-3xl font-bold mb-6">My Profile</h1>

        <div class="bg-white rounded shadow p-6">
            <div class="mb-4">
                <label class="text-gray-500 text-sm">Name</label>
                <p class="text-xl font-bold">{{ auth()->user()->name }}</p>
            </div>
            <div class="mb-4">
                <label class="text-gray-500 text-sm">Email</label>
                <p class="text-xl">{{ auth()->user()->email }}</p>
            </div>
            <div class="mb-4">
                <label class="text-gray-500 text-sm">Member since</label>
                <p class="text-xl">{{ auth()->user()->created_at->format('d M Y') }}</p>
            </div>
        </div>
    </div>
</body>
</html>