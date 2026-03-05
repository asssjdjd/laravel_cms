<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Models\Product;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * Display admin home page with statistics and recent contact messages
     */
    public function home(): View
    {
        // Get statistics
        $laptopCount = Product::where('category', 'laptop')->count();
        $phoneCount = Product::where('category', 'phone')->count();
        $gadgetCount = Product::where('category', 'gadget')->count();
        $totalCount = $laptopCount + $phoneCount + $gadgetCount;

        // Get recent contact messages (limit 10)
        $contactMessages = ContactUs::latest()->limit(10)->get();

        return view('web.admin.home', [
            'laptopCount' => $laptopCount,
            'phoneCount' => $phoneCount,
            'gadgetCount' => $gadgetCount,
            'totalCount' => $totalCount,
            'contactMessages' => $contactMessages,
        ]);
    }
}
