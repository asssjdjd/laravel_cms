@extends('layouts.app')

@section('page_title', 'Danh sách Điện Thoại')

@section('content')
<div class="mb-8 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Danh sách bài viết về Phones</h1>
        <p class="text-gray-600 text-sm mt-1">Quản lý các bài đăng phones của bạn</p>
    </div>
    <a href="{{ route('phones.create') }}" class="bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 flex items-center gap-2 hover:shadow-lg">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        Thêm Phone Mới
    </a>
</div>

<div class="bg-white rounded-lg shadow-lg p-6">

    @if($phones->count() > 0) 

        <div class="overflow-x-auto shadow-lg rounded-lg">
            <table class="w-full border-collapse bg-white">
                <thead>
                    <tr class="bg-gradient-to-r from-green-600 to-green-700 text-white">
                        <th class="px-6 py-4 text-left font-semibold">STT</th>
                        <th class="px-6 py-4 text-left font-semibold">Hình Ảnh</th>
                        <th class="px-6 py-4 text-left font-semibold">Tên Điện Thoại</th>
                        <th class="px-6 py-4 text-left font-semibold">Ngày</th>
                        {{-- <th class="px-6 py-4 text-left font-semibold">Giá</th> --}}
                        <th class="px-6 py-4 text-center font-semibold">Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($phones as $index => $phone)
                        <tr class="border-b border-gray-200 hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 text-gray-800 font-medium">{{ $index + 1 }}</td>
                            <td class="px-6 py-4">
                                @if($phone->image)
                                    <img src="{{ asset('storage/' . $phone->image) }}"
                                         alt="{{ $phone->title }}"
                                         class="w-16 h-16 object-cover rounded-lg border border-gray-300 hover:scale-110 transition-transform duration-200">
                                @else
                                    <div class="w-16 h-16 bg-gray-300 rounded-lg flex items-center justify-center text-gray-500 text-xs">
                                        No Image
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <p class="font-semibold text-gray-800">{{ $phone->title ?? 'N/A' }}</p>
                            </td>
                            <td class="px-6 py-4 text-gray-600 text-sm">
                                {{ $phone->time ?? 'N/A' }}
                            </td>
                            {{-- <td class="px-6 py-4 font-bold text-green-600">
                                {{ number_format($phone->price ?? 0, 0, ',', '.') }} ₫
                            </td> --}}
                            <td class="px-6 py-4">
                                <div class="flex gap-2 justify-center">
                                    <a href="{{ route('phones.show', $phone) }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg transition-all duration-200 hover:shadow-md">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                    <a href="{{ route('phones.edit', $phone) }}" class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded-lg transition-all duration-200 hover:shadow-md">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('phones.destroy', $phone) }}" method="POST" class="inline-block" onsubmit="return confirm('Bạn chắc chắn muốn xóa?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg transition-all duration-200 hover:shadow-md">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        <div class="mt-8 pt-6 border-t border-gray-200">
            {{ $phones->links() }}
        </div>
        </div>
    @else
        <div class="bg-yellow-50 border-2 border-yellow-200 rounded-lg p-8 text-center">
            <p class="text-yellow-800 text-lg font-bold mb-2">Không có bài viết về Phones nào trong danh sách</p>
            <p class="text-yellow-600 mb-6">Hãy thêm bài viết về Phones mới để bắt đầu</p>
            <a href="{{ route('phones.create') }}" class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-6 rounded-lg transition duration-200">
                Thêm Phone Mới
            </a>
        </div>
    @endif
@endsection
