<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Request\StoreLaptopRequest;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

use function Laravel\Prompts\error;

class LaptopController extends Controller {

    /**
     * Display list laptops .
     */

    public function index() : View {

        $laptops = Product::where('category', 'laptop')->latest()->paginate(10);

        // dd($laptops);

        return view('web.admin.laptops.index',compact('laptops'));

    }

    /**
     * create laptops interface.
     */
    public function create() : view {
        return view ('web.admin.laptops.create');
    }


    /**
     * Handle data laptops
     */
    public function store(StoreLaptopRequest $request) {
        try {
            $data = $request->validated();

            // Auto-generate name from title if not provided
            if (empty($data['name'] ?? null)) {
                $data['name'] = 'laptop_' . time() . '_' . substr(md5(rand()), 0, 6);
            }

            // Handle file upload
            if ($request->hasFile('image')) {
                $file = $request->file('image');

                // Tạo tên file duy nhất
                $fileName = time() . '_' . $file->getClientOriginalName();

                $file->storeAs('laptops', $fileName, 'public');

                $data['image'] = 'laptops/' . $fileName;
            }

            // dd($data);

            $data['category'] = 'laptop';
            Product::create($data);

            // dd($data);

            return redirect()
                ->route('laptops.index')
                ->with('success', 'Thêm mới Laptop thành công!');

        } catch (Exception $e) {
            // Redirect lại trang nhập liệu kèm input cũ.
            Log::error('Lỗi khi lưu laptop: ' . $e->getMessage());

            return back()
                ->withInput()
                ->with('error', 'Có lỗi xảy ra, vui lòng thử lại: ' . $e->getMessage());
        }
    }

    /**
     * Show laptop details
     */
    public function show(Product $laptop) : View {
        return view('web.admin.laptops.show', compact('laptop'));
    }

    /**
     * Edit laptop interface
     */
    public function edit(Product $laptop) : View {
        return view('web.admin.laptops.edit', compact('laptop'));
    }

    /**
     * Update laptop
     */
    public function update(StoreLaptopRequest $request, Product $laptop) {
        try {
            $data = $request->validated();

            // Handle file upload
            if ($request->hasFile('image')) {
                // Xóa ảnh cũ nếu có
                if ($laptop->image && file_exists(storage_path('app/public/' . $laptop->image))) {
                    unlink(storage_path('app/public/' . $laptop->image));
                }

                $file = $request->file('image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('laptops', $fileName, 'public');
                $data['image'] = 'laptops/' . $fileName;
            }

            $laptop->update($data);

            return redirect()
                ->route('laptops.show', $laptop)
                ->with('success', 'Cập nhật Laptop thành công!');

        } catch (Exception $e) {
            Log::error('Lỗi khi cập nhật laptop: ' . $e->getMessage());

            return back()
                ->withInput()
                ->with('error', 'Có lỗi xảy ra, vui lòng thử lại: ' . $e->getMessage());
        }
    }

    /**
     * Delete laptop
     */
    public function destroy(Product $laptop) {
        try {
            // Xóa ảnh nếu có
            if ($laptop->image && file_exists(storage_path('app/public/' . $laptop->image))) {
                unlink(storage_path('app/public/' . $laptop->image));
            }

            $laptop->delete();

            return redirect()
                ->route('laptops.index')
                ->with('success', 'Xóa Laptop thành công!');

        } catch (Exception $e) {
            Log::error('Lỗi khi xóa laptop: ' . $e->getMessage());

            return back()
                ->with('error', 'Có lỗi xảy ra, vui lòng thử lại: ' . $e->getMessage());
        }
    }
}
