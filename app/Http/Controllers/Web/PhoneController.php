<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Request\StorePhoneRequest;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class PhoneController extends Controller
{
    /**
     * Display list phones
     */
    public function index() : View
    {
        $phones = Product::where('category', 'phone')->latest()->paginate(10);

        return view('web.admin.phones.index', compact('phones'));
    }

    /**
     * Create phones interface
     */
    public function create() : View
    {
        return view('web.admin.phones.create');
    }

    /**
     * Handle data phones
     */
    public function store(StorePhoneRequest $request)
    {
        try {
            $data = $request->validated();

            // Auto-generate name from title if not provided
            if (empty($data['name'] ?? null)) {
                $data['name'] = 'phone_' . time() . '_' . substr(md5(rand()), 0, 6);
            }

            // Handle file upload
            if ($request->hasFile('image')) {
                $file = $request->file('image');

                // Create unique filename
                $fileName = time() . '_' . $file->getClientOriginalName();

                $file->storeAs('phones', $fileName, 'public');

                $data['image'] = 'phones/' . $fileName;
            }

            $data['category'] = 'phone';
            Product::create($data);

            return redirect()
                ->route('phones.index')
                ->with('success', 'Thêm mới Điện thoại thành công!');

        } catch (Exception $e) {
            // Redirect back with old input
            Log::error('Lỗi khi lưu điện thoại: ' . $e->getMessage());

            return back()
                ->withInput()
                ->with('error', 'Có lỗi xảy ra, vui lòng thử lại: ' . $e->getMessage());
        }
    }

    /**
     * Show phone details
     */
    public function show(Product $phone) : View
    {
        return view('web.admin.phones.show', compact('phone'));
    }

    /**
     * Edit phone interface
     */
    public function edit(Product $phone) : View
    {
        return view('web.admin.phones.edit', compact('phone'));
    }

    /**
     * Update phone
     */
    public function update(StorePhoneRequest $request, Product $phone)
    {
        try {
            $data = $request->validated();

            // Handle file upload
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($phone->image && file_exists(storage_path('app/public/' . $phone->image))) {
                    unlink(storage_path('app/public/' . $phone->image));
                }

                $file = $request->file('image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('phones', $fileName, 'public');
                $data['image'] = 'phones/' . $fileName;
            }

            $phone->update($data);

            return redirect()
                ->route('phones.show', $phone)
                ->with('success', 'Cập nhật Điện thoại thành công!');

        } catch (Exception $e) {
            Log::error('Lỗi khi cập nhật điện thoại: ' . $e->getMessage());

            return back()
                ->withInput()
                ->with('error', 'Có lỗi xảy ra, vui lòng thử lại: ' . $e->getMessage());
        }
    }

    /**
     * Delete phone
     */
    public function destroy(Product $phone)
    {
        try {
            // Delete image if exists
            if ($phone->image && file_exists(storage_path('app/public/' . $phone->image))) {
                unlink(storage_path('app/public/' . $phone->image));
            }

            $phone->delete();

            return redirect()
                ->route('phones.index')
                ->with('success', 'Xóa Điện thoại thành công!');

        } catch (Exception $e) {
            Log::error('Lỗi khi xóa điện thoại: ' . $e->getMessage());

            return back()
                ->with('error', 'Có lỗi xảy ra, vui lòng thử lại: ' . $e->getMessage());
        }
    }
}

