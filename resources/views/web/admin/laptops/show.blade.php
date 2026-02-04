@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Header -->
    <div class="mb-8 flex items-center justify-between">
        <div>
            <a href="{{ route('laptops.index') }}" class="text-blue-600 hover:text-blue-800 flex items-center gap-2 mb-4">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Quay lại danh sách
            </a>
            <h1 class="text-3xl font-bold text-gray-800">{{ $laptop->name }}</h1>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('laptops.edit', $laptop) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded-lg transition flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Chỉnh Sửa
            </a>
            <form action="{{ route('laptops.destroy', $laptop) }}" method="POST" style="display: inline;" onsubmit="return confirm('Bạn chắc chắn muốn xóa laptop này?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg transition flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Xóa
                </button>
            </form>
        </div>
    </div>

    {{-- Hiển thị thông báo --}}
    @if (session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 rounded-lg p-4">
            <p class="text-green-800 font-semibold">{{ session('success') }}</p>
        </div>
    @endif

    @if (session('error'))
        <div class="mb-6 bg-red-50 border border-red-200 rounded-lg p-4">
            <p class="text-red-800 font-semibold">{{ session('error') }}</p>
        </div>
    @endif

    <!-- Main Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Hình ảnh -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow-md overflow-hidden sticky top-8">
                @if($laptop->image)
                    <img src="{{ asset('storage/' . $laptop->image) }}" 
                         alt="{{ $laptop->name }}" 
                         class="w-full h-auto object-cover">
                @else
                    <div class="w-full h-96 bg-gray-300 flex items-center justify-center">
                        <span class="text-gray-500 text-lg">No Image</span>
                    </div>
                @endif
                
                <!-- Thông tin cơ bản -->
                <div class="p-6">
                    <div class="mb-4">
                        <h3 class="text-sm font-semibold text-gray-600 mb-1">Thương Hiệu</h3>
                        @if($laptop->brand)
                            <p class="text-lg text-gray-800 font-medium">{{ $laptop->brand }}</p>
                        @else
                            <p class="text-gray-500">Chưa cập nhật</p>
                        @endif
                    </div>

                    <div>
                        <h3 class="text-sm font-semibold text-gray-600 mb-1">Ngày Tạo</h3>
                        <p class="text-gray-700">{{ $laptop->created_at->format('d/m/Y H:i') }}</p>
                    </div>

                    <div class="mt-4">
                        <h3 class="text-sm font-semibold text-gray-600 mb-1">Lần Cập Nhật Cuối</h3>
                        <p class="text-gray-700">{{ $laptop->updated_at->format('d/m/Y H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chi tiết -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Tiêu đề chính -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-sm font-semibold text-gray-600 mb-3 uppercase">Tiêu Đề</h2>
                <p class="text-2xl font-bold text-gray-800">{{ $laptop->title }}</p>
            </div>

            <!-- Tiêu đề phụ -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-sm font-semibold text-gray-600 mb-3 uppercase">Tiêu Đề Phụ</h2>
                <p class="text-lg text-gray-700">{{ $laptop->subTitle }}</p>
            </div>

            <!-- Nội dung -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-sm font-semibold text-gray-600 mb-3 uppercase">Nội Dung Chi Tiết</h2>
                <div class="prose prose-sm max-w-none">
                    <p class="text-gray-700 leading-relaxed whitespace-pre-wrap">{{ $laptop->content }}</p>
                </div>
            </div>

            <!-- Thông tin ID -->
            <div class="bg-gray-50 rounded-lg p-4">
                <p class="text-sm text-gray-600">
                    <span class="font-semibold">ID:</span> 
                    <code class="bg-gray-200 px-2 py-1 rounded">{{ $laptop->id }}</code>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
