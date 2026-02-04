<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel CMS')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <h1 class="text-2xl font-bold text-blue-600">Laravel CMS</h1>
                </div>
                <ul class="flex space-x-6">
                    <li><a href="/" class="text-gray-700 hover:text-blue-600 transition">Trang Chủ</a></li>
                    <li><a href="/laptops" class="text-gray-700 hover:text-blue-600 transition">Laptop</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-12">
        <div class="container mx-auto px-4 py-8">
            <p class="text-center">&copy; 2026 Laravel CMS. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
