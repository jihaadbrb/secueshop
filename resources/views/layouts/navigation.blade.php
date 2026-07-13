<nav class="bg-white shadow p-4 flex justify-between">
    <a href="/" class="text-xl font-bold text-red-600">SecureShop</a>
    <div class="flex gap-4 items-center">
        <a href="/products" class="text-gray-600">Products</a>
        @auth
            <a href="/profile" class="text-gray-600">Profile</a>
            <a href="/admin/users" class="text-gray-600">Admin</a>
            <form method="POST" action="/logout" style="display:inline">
                @csrf
                <button type="submit" class="text-gray-600">Logout</button>
            </form>
        @else
            <a href="/login" class="text-gray-600">Login</a>
            <a href="/register" class="text-gray-600">Register</a>
        @endauth
    </div>
</nav>