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
        // Paginate all products - 10 items per page
        $laptops = Laptop::latest()->paginate(3);
        $phones = Phone::latest()->paginate(4);
        $gadgets = Gadget::latest()->paginate(3);

        return view('web.home.index', [
            'laptops' => $laptops,
            'phones' => $phones,
            'gadgets' => $gadgets,
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
