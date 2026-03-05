@extends('layouts.app')

@section('page_title', 'Dashboard - Trang Chủ Quản Lý')

@section('content')
<div>
    <!-- Header -->
    <div class="mb-8 pb-6 border-b border-gray-200">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Trang Chủ Quản Lý</h1>
        <p class="text-gray-600">Chào mừng đến với hệ thống quản lý nội dung</p>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
        <!-- Laptops Card -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl hover:scale-105 transition-all duration-300 cursor-pointer">
            <div class="bg-gradient-to-br from-blue-500 to-blue-700 p-6 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-blue-100 text-sm font-medium mb-2">Tổng bài viết về Laptop</p>
                        <p class="text-4xl font-bold">{{ $laptopCount }}</p>
                    </div>
                    <svg class="w-14 h-14 text-blue-300 opacity-60" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M6 4h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6a2 2 0 012-2z"/>
                    </svg>
                </div>
            </div>
            <div class="p-6">
                <a href="{{ route('laptops.index') }}" class="text-blue-600 hover:text-blue-800 font-semibold flex items-center gap-2 transition hover:gap-3">
                    Xem danh sách
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Phones Card -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl hover:scale-105 transition-all duration-300 cursor-pointer">
            <div class="bg-gradient-to-br from-green-500 to-green-700 p-6 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-green-100 text-sm font-medium mb-2">Tổng bài viết về Điện Thoại</p>
                        <p class="text-4xl font-bold">{{ $phoneCount }}</p>
                    </div>
                    <svg class="w-14 h-14 text-green-300 opacity-60" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M10 1h4c1.1 0 2 .9 2 2v20c0 1.1-.9 2-2 2h-4c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2z"/>
                    </svg>
                </div>
            </div>
            <div class="p-6">
                <a href="{{ route('phones.index') }}" class="text-green-600 hover:text-green-800 font-semibold flex items-center gap-2 transition hover:gap-3">
                    Xem danh sách
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Gadgets Card -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl hover:scale-105 transition-all duration-300 cursor-pointer">
            <div class="bg-gradient-to-br from-purple-500 to-purple-700 p-6 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-purple-100 text-sm font-medium mb-2">Tổng bài viết về Thiết Bị</p>
                        <p class="text-4xl font-bold">{{ $gadgetCount }}</p>
                    </div>
                    <svg class="w-14 h-14 text-purple-300 opacity-60" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M13 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V9z"/>
                    </svg>
                </div>
            </div>
            <div class="p-6">
                <a href="{{ route('gadgets.index') }}" class="text-purple-600 hover:text-purple-800 font-semibold flex items-center gap-2 transition hover:gap-3">
                    Xem danh sách
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Total Products Card -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl hover:scale-105 transition-all duration-300 cursor-pointer">
            <div class="bg-gradient-to-br from-orange-500 to-orange-700 p-6 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-orange-100 text-sm font-medium mb-2">Tổng bài viết</p>
                        <p class="text-4xl font-bold">{{ $totalCount }}</p>
                    </div>
                    <svg class="w-14 h-14 text-orange-300 opacity-60" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z"/>
                    </svg>
                </div>
            </div>
            <div class="p-6">
                <p class="text-gray-600 text-sm font-medium">Tổng số sản phẩm trong hệ thống</p>
            </div>
        </div>
    </div>

    <!-- Contact Us Messages -->
    <div class="bg-white rounded-xl shadow-lg p-8 mb-16">
        <h2 class="text-2xl font-bold text-gray-800 mb-8 pb-6 border-b-2 border-gray-300">Tin Nhắn Liên Hệ Gần Đây</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="bg-gray-100 border-b-2 border-gray-300">
                        <th class="px-6 py-4 text-left text-sm font-bold text-gray-800">Tên</th>
                        <th class="px-6 py-4 text-left text-sm font-bold text-gray-800">Email</th>
                        <th class="px-6 py-4 text-left text-sm font-bold text-gray-800">Chủ Đề</th>
                        <th class="px-6 py-4 text-left text-sm font-bold text-gray-800">Ngày</th>
                        <th class="px-6 py-4 text-left text-sm font-bold text-gray-800">Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contactMessages as $message)
                    <tr class="border-b border-gray-200 hover:bg-gray-50 transition duration-200">
                        <td class="px-6 py-4 text-gray-800 font-semibold">{{ $message->name }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $message->email }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ Str::limit($message->subject, 50) }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $message->created_at->format('d/m/Y H:i') }}</td>
                        <td class="px-6 py-4">
                            <button onclick="openMessageModal({{ $message->id }}, '{{ addslashes($message->name) }}', '{{ addslashes($message->email) }}', '{{ addslashes($message->subject) }}', '{{ addslashes($message->messages) }}', '{{ $message->created_at->format('d/m/Y H:i') }}')" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 hover:shadow-lg">
                                Xem
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-600 font-semibold">Chưa có tin nhắn liên hệ nào</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-xl shadow-lg p-8 mb-16">
        <h2 class="text-2xl font-bold text-gray-800 mb-8 pb-6 border-b-2 border-gray-300">Hành Động Nhanh</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <a href="{{ route('laptops.create') }}" class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold py-4 px-6 rounded-lg transition duration-300 flex items-center gap-3 justify-center hover:shadow-lg hover:scale-105 group">
                <svg class="w-5 h-5 group-hover:rotate-90 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span>Thêm bài viết về Laptop Mới</span>
            </a>
            <a href="{{ route('phones.create') }}" class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-semibold py-4 px-6 rounded-lg transition duration-300 flex items-center gap-3 justify-center hover:shadow-lg hover:scale-105 group">
                <svg class="w-5 h-5 group-hover:rotate-90 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span>Thêm bài viết về Điện Thoại Mới</span>
            </a>
            <a href="{{ route('gadgets.create') }}" class="bg-gradient-to-r from-purple-500 to-purple-600 hover:from-purple-600 hover:to-purple-700 text-white font-semibold py-4 px-6 rounded-lg transition duration-300 flex items-center gap-3 justify-center hover:shadow-lg hover:scale-105 group">
                <svg class="w-5 h-5 group-hover:rotate-90 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span>Thêm bài viết về Thiết Bị Mới</span>
            </a>
        </div>
    </div>

    <!-- Features Section -->
    <div class="bg-white rounded-xl shadow-lg p-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-8 pb-6 border-b-2 border-gray-300">Các Tính Năng Chính</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="border-2 border-gray-100 rounded-xl p-8 hover:border-blue-400 hover:shadow-xl transition-all duration-300 hover:-translate-y-2 group">
                <div class="flex items-center gap-4 mb-6">
                    <div class="bg-blue-100 p-4 rounded-lg group-hover:bg-blue-500 transition duration-300">
                        <svg class="w-6 h-6 text-blue-600 group-hover:text-white transition duration-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 group-hover:text-blue-600 transition duration-300">Quản Lý Dễ Dàng</h3>
                </div>
                <p class="text-gray-600">Quản lý laptop, điện thoại và thiết bị với giao diện thân thiện</p>
            </div>

            <!-- Feature 2 -->
            <div class="border-2 border-gray-100 rounded-xl p-8 hover:border-green-400 hover:shadow-xl transition-all duration-300 hover:-translate-y-2 group">
                <div class="flex items-center gap-4 mb-6">
                    <div class="bg-green-100 p-4 rounded-lg group-hover:bg-green-500 transition duration-300">
                        <svg class="w-6 h-6 text-green-600 group-hover:text-white transition duration-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zm-5.04-6.71l-2.75 3.54-1.3-1.54c-.4-.48-1.05-.48-1.45 0-.4.48-.4 1.24 0 1.72l2.1 2.54c.4.48 1.05.48 1.45 0L17.6 9.9c.4-.48.4-1.24 0-1.72-.4-.47-1.05-.47-1.45 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 group-hover:text-green-600 transition duration-300">Tải Ảnh Drag & Drop</h3>
                </div>
                <p class="text-gray-600">Tải hình ảnh sản phẩm bằng cách kéo thả hoặc click chọn</p>
            </div>

            <!-- Feature 3 -->
            <div class="border-2 border-gray-100 rounded-xl p-8 hover:border-purple-400 hover:shadow-xl transition-all duration-300 hover:-translate-y-2 group">
                <div class="flex items-center gap-4 mb-6">
                    <div class="bg-purple-100 p-4 rounded-lg group-hover:bg-purple-500 transition duration-300">
                        <svg class="w-6 h-6 text-purple-600 group-hover:text-white transition duration-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 group-hover:text-purple-600 transition duration-300">Kiểm Tra Dữ Liệu</h3>
                </div>
                <p class="text-gray-600">Tự động kiểm tra và xác thực dữ liệu khi thêm/sửa sản phẩm</p>
            </div>

            <!-- Feature 4 -->
            <div class="border-2 border-gray-100 rounded-xl p-8 hover:border-orange-400 hover:shadow-xl transition-all duration-300 hover:-translate-y-2 group">
                <div class="flex items-center gap-4 mb-6">
                    <div class="bg-orange-100 p-4 rounded-lg group-hover:bg-orange-500 transition duration-300">
                        <svg class="w-6 h-6 text-orange-600 group-hover:text-white transition duration-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 group-hover:text-orange-600 transition duration-300">Phân Trang Tự Động</h3>
                </div>
                <p class="text-gray-600">Danh sách sản phẩm được phân trang 10 item/trang</p>
            </div>

            <!-- Feature 5 -->
            <div class="border-2 border-gray-100 rounded-xl p-8 hover:border-red-400 hover:shadow-xl transition-all duration-300 hover:-translate-y-2 group">
                <div class="flex items-center gap-4 mb-6">
                    <div class="bg-red-100 p-4 rounded-lg group-hover:bg-red-500 transition duration-300">
                        <svg class="w-6 h-6 text-red-600 group-hover:text-white transition duration-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-9l-1 1H5v2h14V4z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 group-hover:text-red-600 transition duration-300">Xóa An Toàn</h3>
                </div>
                <p class="text-gray-600">Xóa sản phẩm và ảnh của nó với xác nhận trước</p>
            </div>

            <!-- Feature 6 -->
            <div class="border-2 border-gray-100 rounded-xl p-8 hover:border-indigo-400 hover:shadow-xl transition-all duration-300 hover:-translate-y-2 group">
                <div class="flex items-center gap-4 mb-6">
                    <div class="bg-indigo-100 p-4 rounded-lg group-hover:bg-indigo-500 transition duration-300">
                        <svg class="w-6 h-6 text-indigo-600 group-hover:text-white transition duration-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17 10.5V7c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1v10c0 .55.45 1 1 1h12c.55 0 1-.45 1-1v-3.5l4 4v-11l-4 4z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 group-hover:text-indigo-600 transition duration-300">Responsive Design</h3>
                </div>
                <p class="text-gray-600">Giao diện hoạt động tốt trên desktop, tablet, và mobile</p>
            </div>
        </div>
    </div>

    <!-- Message Detail Modal -->
    <div id="messageModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <div class="sticky top-0 bg-gradient-to-r from-blue-500 to-blue-600 px-8 py-6 flex justify-between items-center border-b border-gray-200">
                <h3 class="text-2xl font-bold text-white">Chi Tiết Tin Nhắn</h3>
                <button onclick="closeMessageModal()" class="text-white hover:bg-blue-700 rounded-full p-2 transition duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="p-8 space-y-6">
                <!-- Name -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Tên:</label>
                    <p id="modalName" class="text-gray-800 bg-gray-50 p-3 rounded-lg"></p>
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Email:</label>
                    <p id="modalEmail" class="text-gray-800 bg-gray-50 p-3 rounded-lg"></p>
                </div>

                <!-- Subject -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Chủ Đề:</label>
                    <p id="modalSubject" class="text-gray-800 bg-gray-50 p-3 rounded-lg"></p>
                </div>

                <!-- Message -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nội Dung:</label>
                    <p id="modalMessage" class="text-gray-800 bg-gray-50 p-3 rounded-lg whitespace-pre-wrap"></p>
                </div>

                <!-- Date -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Ngày Gửi:</label>
                    <p id="modalDate" class="text-gray-800 bg-gray-50 p-3 rounded-lg"></p>
                </div>
            </div>

            <div class="bg-gray-100 px-8 py-4 flex justify-end border-t border-gray-200 sticky bottom-0">
                <button onclick="closeMessageModal()" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded-lg transition duration-300 hover:shadow-lg">
                    Đóng
                </button>
            </div>
        </div>
    </div>

    <script>
        function openMessageModal(id, name, email, subject, message, date) {
            document.getElementById('modalName').textContent = name;
            document.getElementById('modalEmail').textContent = email;
            document.getElementById('modalSubject').textContent = subject;
            document.getElementById('modalMessage').textContent = message;
            document.getElementById('modalDate').textContent = date;
            document.getElementById('messageModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeMessageModal() {
            document.getElementById('messageModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        document.getElementById('messageModal')?.addEventListener('click', function(e) {
            if (e.target === this) {
                closeMessageModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeMessageModal();
            }
        });
    </script>
</div>
@endsection
