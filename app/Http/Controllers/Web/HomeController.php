<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display home page with featured products
     */
    public function index(): View
    {
        // Get all products from all categories
        $allProducts = Product::latest()->get();
        
        // Paginate merged collection - 10 items per page
        $currentPage = \Illuminate\Pagination\Paginator::resolveCurrentPage();
        $perPage = 10;
        $products = new \Illuminate\Pagination\LengthAwarePaginator(
            $allProducts->forPage($currentPage, $perPage),
            $allProducts->count(),
            $perPage,
            $currentPage,
            [
                'path' => route('user.home'),
                'query' => request()->query(),
            ]
        );

        return view('web.home.index', [
            'products' => $products,
        ]);
    }

    /**
     * Display all laptops
     */
    public function laptops(): View
    {
        $laptops = Product::where('category', 'laptop')->latest()->paginate(12);

        return view('web.home.laptop', [
            'laptops' => $laptops,
        ]);
    }

    /**
     * Display all phones
     */
    public function phones(): View
    {
        $phones = Product::where('category', 'phone')->latest()->paginate(12);

        return view('web.home.phone', [
            'phones' => $phones,
        ]);
    }

    /**
     * Display all gadgets
     */
    public function gadgets(): View
    {
        $gadgets = Product::where('category', 'gadget')->latest()->paginate(12);

        return view('web.home.gadget', [
            'gadgets' => $gadgets,
        ]);
    }
}
