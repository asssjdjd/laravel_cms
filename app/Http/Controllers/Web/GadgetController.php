<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Request\StoreGadgetRequest;
use App\Models\Gadget;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class GadgetController extends Controller
{
    /**
     * Display list gadgets
     */
    public function index() : View
    {
        $gadgets = Gadget::latest()->paginate(10);

        return view('web.admin.gadgets.index', compact('gadgets'));
    }

    /**
     * Create gadgets interface
     */
    public function create() : View
    {
        return view('web.admin.gadgets.create');
    }

    /**
     * Handle data gadgets
     */
    public function store(StoreGadgetRequest $request)
    {
        try {
            $data = $request->validated();

            // Handle file upload
            if ($request->hasFile('image')) {
                $file = $request->file('image');

                // Create unique filename
                $fileName = time() . '_' . $file->getClientOriginalName();

                $file->storeAs('gadgets', $fileName, 'public');

                $data['image'] = 'gadgets/' . $fileName;
            }

            Gadget::create($data);

            return redirect()
                ->route('gadgets.index')
                ->with('success', 'Thêm mới Thiết bị thành công!');

        } catch (Exception $e) {
            Log::error('Lỗi khi lưu thiết bị: ' . $e->getMessage());

            return back()
                ->withInput()
                ->with('error', 'Có lỗi xảy ra, vui lòng thử lại: ' . $e->getMessage());
        }
    }

    /**
     * Show gadget details
     */
    public function show(Gadget $gadget) : View
    {
        return view('web.admin.gadgets.show', compact('gadget'));
    }

    /**
     * Edit gadget interface
     */
    public function edit(Gadget $gadget) : View
    {
        return view('web.admin.gadgets.edit', compact('gadget'));
    }

    /**
     * Update gadget
     */
    public function update(StoreGadgetRequest $request, Gadget $gadget)
    {
        try {
            $data = $request->validated();

            // Handle file upload
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($gadget->image && file_exists(storage_path('app/public/' . $gadget->image))) {
                    unlink(storage_path('app/public/' . $gadget->image));
                }

                $file = $request->file('image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('gadgets', $fileName, 'public');
                $data['image'] = 'gadgets/' . $fileName;
            }

            $gadget->update($data);

            return redirect()
                ->route('gadgets.show', $gadget)
                ->with('success', 'Cập nhật Thiết bị thành công!');

        } catch (Exception $e) {
            Log::error('Lỗi khi cập nhật thiết bị: ' . $e->getMessage());

            return back()
                ->withInput()
                ->with('error', 'Có lỗi xảy ra, vui lòng thử lại: ' . $e->getMessage());
        }
    }

    /**
     * Delete gadget
     */
    public function destroy(Gadget $gadget)
    {
        try {
            // Delete image if exists
            if ($gadget->image && file_exists(storage_path('app/public/' . $gadget->image))) {
                unlink(storage_path('app/public/' . $gadget->image));
            }

            $gadget->delete();

            return redirect()
                ->route('gadgets.index')
                ->with('success', 'Xóa Thiết bị thành công!');

        } catch (Exception $e) {
            Log::error('Lỗi khi xóa thiết bị: ' . $e->getMessage());

            return back()
                ->with('error', 'Có lỗi xảy ra, vui lòng thử lại: ' . $e->getMessage());
        }
    }
}
