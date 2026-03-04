<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Laptop;
use App\Models\Phone;
use App\Models\Gadget;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display home page with featured products
     */
    public function index(): View
    {
        // Get all products from all categories
        $laptops = Laptop::latest()->get();
        $phones = Phone::latest()->get();
        $gadgets = Gadget::latest()->get();
        
        // Merge all products and sort by created_at (newest first)
        $allProducts = collect()
            ->merge($laptops)
            ->merge($phones)
            ->merge($gadgets)
            ->sortByDesc('created_at')
            ->values();
        
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
        $laptops = Laptop::latest()->paginate(12);

        return view('web.home.laptop', [
            'laptops' => $laptops,
        ]);
    }

    /**
     * Display all phones
     */
    public function phones(): View
    {
        $phones = Phone::latest()->paginate(12);

        return view('web.home.phone', [
            'phones' => $phones,
        ]);
    }

    /**
     * Display all gadgets
     */
    public function gadgets(): View
    {
        $gadgets = Gadget::latest()->paginate(12);

        return view('web.home.gadget', [
            'gadgets' => $gadgets,
        ]);
    }
}
