@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12 max-w-7xl">
    <div class="mb-12 flex justify-between items-center border-b border-gray-200 pb-8">
        <div>
            <h1 class="text-4xl font-bold text-gray-800 mb-3">Danh sách bài viết về Gadgets</h1>
            <p class="text-gray-600 text-lg">Quản lý các sản phẩm thiết bị của bạn</p>
        </div>
        <a href="{{ route('gadgets.create') }}" class="bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 text-white font-semibold py-3 px-6 rounded-lg transition duration-300 flex items-center gap-2 hover:shadow-lg hover:scale-105">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Thêm Thiết Bị Mới
        </a>
    </div>

    {{-- Display success message --}}
    @if (session('success'))
        <div class="mb-8 bg-green-50 border-2 border-green-200 rounded-lg p-6">
            <p class="text-green-800 font-bold">{{ session('success') }}</p>
        </div>
    @endif

    @if($gadgets->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($gadgets as $gadget)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl hover:scale-105 transition-all duration-300">
                    <!-- Image -->
                    @if($gadget->image)
                        <div class="h-48 bg-gray-200 overflow-hidden">
                            <img src="{{ asset('storage/' . $gadget->image) }}"
                                 alt="{{ $gadget->title }}"
                                 class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                        </div>
                    @else
                        <div class="h-48 bg-gray-300 flex items-center justify-center">
                            <span class="text-gray-500">No Image</span>
                        </div>
                    @endif

                    <!-- Content -->
                    <div class="p-6">
                        <!-- Product Name -->
                        <h2 class="text-xl font-bold text-gray-800 mb-3 line-clamp-2">
                            {{ $gadget->title }}
                        </h2>

                        <!-- Brand -->
                        @if($gadget->brand)
                            <p class="text-sm text-gray-500 mb-3">
                                <span class="font-medium">Thương hiệu:</span> {{ $gadget->brand }}
                            </p>
                        @endif

                        <!-- Sub Title -->
                        @if($gadget->subTitle)
                            <p class="text-sm text-gray-600 mb-4 line-clamp-2">
                                {{ $gadget->subTitle }}
                            </p>
                        @endif

                        <!-- Action Buttons -->
                        <div class="flex gap-3 mt-6">
                            <a href="{{ route('gadgets.show', $gadget) }}" class="flex-1 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg text-center transition-all duration-200 hover:shadow-md">
                                Xem
                            </a>
                            <a href="{{ route('gadgets.edit', $gadget) }}" class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded-lg text-center transition-all duration-200 hover:shadow-md">
                                Sửa
                            </a>
                            <form action="{{ route('gadgets.destroy', $gadget) }}" method="POST" style="flex: 1;" onsubmit="return confirm('Bạn chắc chắn muốn xóa?');">
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
            {{ $gadgets->links() }}
        </div>
    @else
        <div class="bg-yellow-50 border-2 border-yellow-200 rounded-xl p-8 text-center">
            <p class="text-yellow-800 text-lg font-bold mb-2">Không có thiết bị nào trong danh sách</p>
            <p class="text-yellow-600 mb-6">Hãy thêm thiết bị mới để bắt đầu</p>
            <a href="{{ route('gadgets.create') }}" class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-6 rounded-lg transition duration-200">
                Thêm Thiết Bị Mới
            </a>
        </div>
    @endif
</div>
@endsection
