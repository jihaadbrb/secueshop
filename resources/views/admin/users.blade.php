<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SecureShop - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow p-4 flex justify-between">
        <a href="/" class="text-xl font-bold text-red-600">SecureShop</a>
        <div class="flex gap-4">
            <a href="/products" class="text-gray-600">Products</a>
            <a href="/profile" class="text-gray-600">Profile</a>
            <form method="POST" action="/logout">
                @csrf
                <button class="text-gray-600">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-6">Admin Panel — All Users</h1>

        {{-- VULNERABLE: hardcoded API key visible in source --}}
        <!-- API_KEY: sk-abc123supersecretkey987654 -->

        <table class="w-full bg-white rounded shadow">
            <thead class="bg-red-600 text-white">
                <tr>
                    <th class="p-4 text-left">ID</th>
                    <th class="p-4 text-left">Name</th>
                    <th class="p-4 text-left">Email</th>
                    <th class="p-4 text-left">Registered</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="border-b">
                    <td class="p-4">{{ $user->id }}</td>
                    <td class="p-4">{{ $user->name }}</td>
                    <td class="p-4">{{ $user->email }}</td>
                    <td class="p-4">{{ $user->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>