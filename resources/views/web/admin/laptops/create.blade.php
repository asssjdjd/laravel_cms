@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Thêm Laptop Mới</h1>
            <p class="text-gray-600">Điền thông tin chi tiết về laptop mới</p>
        </div>

        <!-- Form -->
        <div class="bg-white rounded-lg shadow-md p-8">
            {{-- Hiển thị lỗi validation nếu có --}}
            @if ($errors->any())
                <div class="mb-6 bg-red-50 border border-red-200 rounded-lg p-4">
                    <h3 class="text-red-800 font-semibold mb-2">Có lỗi xảy ra:</h3>
                    <ul class="list-disc list-inside text-red-700">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Hiển thị thông báo thành công nếu có --}}
            @if (session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 rounded-lg p-4">
                    <p class="text-green-800 font-semibold">{{ session('success') }}</p>
                </div>
            @endif

            {{-- Hiển thị thông báo thất bại --}}
            @if (session('error'))
                <div class="mb-6 bg-red-50 border border-green-200 rounded-lg p-4">
                    <p class="text-green-800 font-semibold">{{ session('error') }}</p>
                </div>
            @endif

            <form action="{{ route('laptops.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Tên Laptop -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                        Tên Laptop <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Nhập tên laptop..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition @error('name') border-red-500 @enderror"
                    >
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tiêu đề chính -->
                <div>
                    <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
                        Tiêu Đề <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        value="{{ old('title') }}"
                        placeholder="Nhập tiêu đề..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition @error('title') border-red-500 @enderror"
                    >
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tiêu đề phụ -->
                <div>
                    <label for="subTitle" class="block text-sm font-semibold text-gray-700 mb-2">
                        Tiêu Đề Phụ <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text"
                        id="subTitle"
                        name="subTitle"
                        value="{{ old('subTitle') }}"
                        placeholder="Nhập tiêu đề phụ..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition @error('subTitle') border-red-500 @enderror"
                    >
                    @error('subTitle')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nội dung -->
                <div>
                    <label for="content" class="block text-sm font-semibold text-gray-700 mb-2">
                        Nội Dung <span class="text-red-500">*</span>
                    </label>
                    <textarea
                        id="content"
                        name="content"
                        rows="6"
                        placeholder="Nhập mô tả chi tiết về laptop..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition resize-none @error('content') border-red-500 @enderror"
                    >{{ old('content') }}</textarea>
                    @error('content')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Hình ảnh -->
                <div>
                    <label for="image" class="block text-sm font-semibold text-gray-700 mb-2">
                        Hình Ảnh (Tối đa 2MB)
                    </label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer hover:border-blue-500 transition" id="drop-zone">
                        <input
                            type="file"
                            id="image"
                            name="image"
                            accept="image/jpeg,image/png,image/jpg"
                            class="hidden"
                        >
                        <div id="image-preview" class="hidden mb-4">
                            <img src="" alt="Preview" class="h-48 mx-auto rounded-lg">
                        </div>
                        <div id="image-placeholder">
                            <svg class="mx-auto h-12 w-12 text-gray-400 mb-2" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-8l-3.172-3.172a4 4 0 00-5.656 0L28 20M8 40l3.172-3.172a4 4 0 015.656 0L20 40m8-24h.01M20 16h.01" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p class="text-gray-600 font-medium">Kéo thả hình ảnh hoặc nhấp để chọn</p>
                            <p class="text-gray-500 text-sm">PNG, JPG, JPEG (Tối đa 2MB)</p>
                        </div>
                    </div>
                    @error('image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="flex gap-4 pt-4">
                    <button
                        type="submit"
                        class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg transition duration-200 flex items-center justify-center gap-2"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Thêm Laptop
                    </button>
                    <a
                        href="{{ route('laptops.index') }}"
                        class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-3 px-4 rounded-lg transition duration-200 text-center"
                    >
                        Hủy
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Xử lý drag and drop cho hình ảnh
    const dropZone = document.getElementById('drop-zone');
    const fileInput = document.getElementById('image');
    const imagePreview = document.getElementById('image-preview');
    const imagePlaceholder = document.getElementById('image-placeholder');

    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        dropZone.addEventListener(eventName, () => {
            dropZone.classList.add('border-blue-500', 'bg-blue-50');
        }, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, () => {
            dropZone.classList.remove('border-blue-500', 'bg-blue-50');
        }, false);
    });

    dropZone.addEventListener('drop', (e) => {
        const dt = e.dataTransfer;
        const files = dt.files;
        fileInput.files = files;
        handleFiles(files);
    }, false);

    dropZone.addEventListener('click', () => {
        fileInput.click();
    });

    fileInput.addEventListener('change', (e) => {
        handleFiles(e.target.files);
    });

    function handleFiles(files) {
        if (files.length > 0) {
            const file = files[0];
            const reader = new FileReader();

            reader.onload = (e) => {
                imagePreview.querySelector('img').src = e.target.result;
                imagePreview.classList.remove('hidden');
                imagePlaceholder.classList.add('hidden');
            };

            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
