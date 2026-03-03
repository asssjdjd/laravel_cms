@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12 max-w-7xl">
    <div class="mb-12 flex justify-between items-center border-b border-gray-200 pb-8">

        <div>
            <h1 class="text-4xl font-bold text-gray-800 mb-3">Danh sách bài viết về Phones</h1>
            <p class="text-gray-600 text-lg">Quản lý các các bài đăng phones của bạn</p>
        </div>

        <a href="{{ route('phones.create') }}" class="bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-semibold py-3 px-6 rounded-lg transition duration-300 flex items-center gap-2 hover:shadow-lg hover:scale-105">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Thêm Phone Mới
        </a>

    </div>

    @if($phones->count() > 0) 

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($phones as $phone)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl hover:scale-105 transition-all duration-300">
                    <!-- Hình ảnh phone -->
                    @if($phone->image)
                        <div class="h-48 bg-gray-200 overflow-hidden">
                            <img src="{{ asset('storage/' . $phone->image) }}"
                                 alt="{{ $phone->title }}"
                                 class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                        </div>
                    @else
                        <div class="h-48 bg-gray-300 flex items-center justify-center">
                            <span class="text-gray-500">No Image</span>
                        </div>
                    @endif

                    <!-- Nội dung -->
                    <div class="p-6">
{{-- 
                        @if($phone->subTitle)
                            <p class="text-sm text-gray-600 mb-3 line-clamp-2">
                                {{ $phone->subTitle }}
                            </p>
                        @endif --}}

                        @if($phone->title)
                            <h3 class="text-xl font-bold text-gray-800 mb-2 line-clamp-2">
                                {{ $phone->title }}
                            </h3>
                        @endif

                        @if($phone->time) 
                            <p class="text-sm text-gray-500 mb-4 line-clamp-2">
                                {{ $phone->time }}
                            </p>
                        @endif

                        <!-- Nút hành động -->
                        <div class="flex gap-3 mt-6">
                            <a href="{{ route('phones.show', $phone) }}" class="flex-1 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg text-center transition-all duration-200 hover:shadow-md">
                                Xem 
                            </a>
                            <a href="{{ route('phones.edit', $phone) }}" class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded-lg text-center transition-all duration-200 hover:shadow-md">
                                Sửa
                            </a>
                            <form action="{{ route('phones.destroy', $phone) }}" method="POST" style="flex: 1;" onsubmit="return confirm('Bạn chắc chắn muốn xóa?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg transition-all duration-200 hover:shadow-md">
                                    Xóa
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Pagination -->
        <div class="mt-12 pt-8 border-t border-gray-200">
            {{ $phones->links() }}
        </div>
    @else
        <div class="bg-yellow-50 border-2 border-yellow-200 rounded-xl p-8 text-center">
            <p class="text-yellow-800 text-lg font-bold mb-2">Không có bài viết về Phones nào trong danh sách</p>
            <p class="text-yellow-600 mb-6">Hãy thêm bài viết về Phones mới để bắt đầu</p>
            <a href="{{ route('phones.create') }}" class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-6 rounded-lg transition duration-200">
                Thêm Phone Mới
            </a>
        </div>
    @endif
</div>
@endsection
