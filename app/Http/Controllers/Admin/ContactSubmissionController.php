<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class ContactSubmissionController extends Controller
{
    /**
     * List all contact form submissions (صفحة تواصل معنا).
     */
    public function index()
    {
        $submissions = ContactSubmission::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.contact-submissions.index', compact('submissions'));
    }

    /**
     * Show a single contact submission.
     */
    public function show(ContactSubmission $contactSubmission)
    {
        return view('admin.contact-submissions.show', compact('contactSubmission'));
    }

    /**
     * Delete a contact submission.
     */
    public function destroy(ContactSubmission $contactSubmission)
    {
        $contactSubmission->delete();
        return redirect()->route('admin.contact-submissions.index')
            ->with('success', 'تم حذف الرسالة بنجاح.');
    }
}
