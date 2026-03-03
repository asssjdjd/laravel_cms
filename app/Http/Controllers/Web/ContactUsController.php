<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display the contact us page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('web.home.contactUs');
    }

    /**
     * Store a newly created contact message in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'messages' => 'required|string',
        ]);

        // Create new contact message
        $contactData = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'],
            'messages' => $validated['messages'],
        ];

        // Add user_id if user is authenticated
        if (auth('web')->check()) {
            $contactData['user_id'] = auth('web')->id();
        }

        ContactUs::create($contactData);

        // Redirect back with success message
        return redirect()->route('user.contact')->with('success', 'Thank you! Your message has been sent successfully.');
    }
}
