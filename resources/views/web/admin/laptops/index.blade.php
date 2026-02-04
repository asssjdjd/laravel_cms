@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8 flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Danh Sách Laptop</h1>
            <p class="text-gray-600">Quản lý các sản phẩm laptop của bạn</p>
        </div>
        <a href="{{ route('laptops.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200 flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Thêm Laptop Mới
        </a>
    </div>

    @if($laptops->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($laptops as $laptop)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <!-- Hình ảnh laptop -->
                    @if($laptop->image)
                        <div class="h-48 bg-gray-200 overflow-hidden">
                            <img src="{{ asset('storage/' . $laptop->image) }}"
                                 alt="{{ $laptop->name }}"
                                 class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                        </div>
                    @else
                        <div class="h-48 bg-gray-300 flex items-center justify-center">
                            <span class="text-gray-500">No Image</span>
                        </div>
                    @endif

                    <!-- Nội dung -->
                    <div class="p-4">

                        @if($laptop->subTitle)
                            <p class="text-sm text-gray-600 mb-3 line-clamp-2">
                                {{ $laptop->subTitle }}
                            </p>
                        @endif


                        <!-- Nút hành động -->
                        <div class="flex gap-2 mt-4">
                            <a href="{{ route('laptops.show', $laptop) }}" class="flex-1 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded text-center transition-colors duration-200">
                                Xem Chi Tiết
                            </a>
                            <a href="{{ route('laptops.edit', $laptop) }}" class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded text-center transition-colors duration-200">
                                Sửa
                            </a>
                            <form action="{{ route('laptops.destroy', $laptop) }}" method="POST" style="flex: 1;" onsubmit="return confirm('Bạn chắc chắn muốn xóa?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded transition-colors duration-200">
                                    Xóa
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $laptops->links() }}
        </div>
    @else
        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-6 text-center">
            <p class="text-yellow-800 text-lg font-medium">Không có laptop nào trong danh sách</p>
            <p class="text-yellow-600 mt-2">Hãy thêm laptop mới để bắt đầu</p>
        </div>
    @endif
</div>
@endsection
