<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of contact inquiries.
     */
    public function index(Request $request)
    {
        $query = Contact::query();

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by course
        if ($request->filled('course')) {
            $query->where('course', $request->course);
        }

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('subject', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
            });
        }

        $contacts = $query->recent()->paginate(15);

        // Get filter options
        $courses = Contact::distinct()->pluck('course')->filter()->sort();
        $statuses = [
            Contact::STATUS_NEW => 'New',
            Contact::STATUS_READ => 'Read',
            Contact::STATUS_REPLIED => 'Replied',
            Contact::STATUS_RESOLVED => 'Resolved',
        ];

        // Get statistics
        $stats = [
            'total' => Contact::count(),
            'new' => Contact::new()->count(),
            'read' => Contact::read()->count(),
            'replied' => Contact::replied()->count(),
            'resolved' => Contact::resolved()->count(),
        ];

        return view('admin.contacts.index', compact('contacts', 'courses', 'statuses', 'stats'));
    }

    /**
     * Display the specified contact inquiry.
     */
    public function show(Contact $contact)
    {
        // Mark as read if it's new
        if ($contact->status === Contact::STATUS_NEW) {
            $contact->markAsRead(Auth::guard('admin')->id());
        }

        return view('admin.contacts.show', compact('contact'));
    }

    /**
     * Update the status of a contact inquiry.
     */
    public function updateStatus(Request $request, Contact $contact)
    {
        $request->validate([
            'status' => 'required|in:new,read,replied,resolved',
            'admin_notes' => 'nullable|string|max:1000',
        ]);

        $adminId = Auth::guard('admin')->id();

        switch ($request->status) {
            case Contact::STATUS_READ:
                $contact->markAsRead($adminId);
                break;
            case Contact::STATUS_REPLIED:
                $contact->markAsReplied($adminId, $request->admin_notes);
                break;
            case Contact::STATUS_RESOLVED:
                $contact->markAsResolved($adminId, $request->admin_notes);
                break;
            default:
                $contact->update(['status' => $request->status]);
        }

        return redirect()->back()->with('success', 'Contact status updated successfully.');
    }

    /**
     * Remove the specified contact inquiry.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index')
            ->with('success', 'Contact inquiry deleted successfully.');
    }

    /**
     * Bulk actions for contact inquiries.
     */
    public function bulkAction(Request $request)
    {
        $request->validate([
            'action' => 'required|in:mark_read,mark_replied,mark_resolved,delete',
            'contact_ids' => 'required|array',
            'contact_ids.*' => 'exists:contacts,id',
        ]);

        $contacts = Contact::whereIn('id', $request->contact_ids);
        $adminId = Auth::guard('admin')->id();

        switch ($request->action) {
            case 'mark_read':
                $contacts->update(['status' => Contact::STATUS_READ, 'replied_by' => $adminId]);
                $message = 'Selected contacts marked as read.';
                break;
            case 'mark_replied':
                $contacts->update([
                    'status' => Contact::STATUS_REPLIED,
                    'replied_at' => now(),
                    'replied_by' => $adminId
                ]);
                $message = 'Selected contacts marked as replied.';
                break;
            case 'mark_resolved':
                $contacts->update([
                    'status' => Contact::STATUS_RESOLVED,
                    'replied_at' => now(),
                    'replied_by' => $adminId
                ]);
                $message = 'Selected contacts marked as resolved.';
                break;
            case 'delete':
                $contacts->delete();
                $message = 'Selected contacts deleted successfully.';
                break;
        }

        return redirect()->back()->with('success', $message);
    }
}
