<?php

namespace App\Http\Controllers;

use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Show the contact page.
     */
    public function show()
    {
        return view('front.contacts.contacts');
    }

    /**
     * Store a contact form submission.
     */
    public function store(Request $request)
    {
        $serviceOptions = \App\Models\Setting::getValue('services_form', 'service_options', []);
        $allowedSubjects = is_array($serviceOptions) ? array_column($serviceOptions, 'value') : [];
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:50',
            'subject' => $allowedSubjects ? 'nullable|string|in:'.implode(',', $allowedSubjects) : 'nullable|string|max:255',
            'message' => 'nullable|string|max:5000',
        ]);

        ContactSubmission::create($validated);

        return redirect()->route('contacts')->with('success', 'تم إرسال رسالتك بنجاح. سنتواصل معك في أقرب وقت.');
    }
}
