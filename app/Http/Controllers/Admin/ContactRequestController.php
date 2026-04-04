<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactRequest;
use App\Models\DevApplication;

class ContactRequestController extends Controller
{
    public function contacts()
    {
        return view('admin.contacts.index', [
            'contacts' => ContactRequest::orderByDesc('created_at')->get(),
        ]);
    }

    public function showContact(ContactRequest $contact)
    {
        $contact->update(['read' => true]);
        return view('admin.contacts.show', ['contact' => $contact]);
    }

    public function destroyContact(ContactRequest $contact)
    {
        $contact->delete();
        return redirect('/admin/contacts')->with('success', 'Deleted.');
    }

    public function developers()
    {
        return view('admin.developers.index', [
            'developers' => DevApplication::orderByDesc('created_at')->get(),
        ]);
    }

    public function showDeveloper(DevApplication $developer)
    {
        $developer->update(['read' => true]);
        return view('admin.developers.show', ['developer' => $developer]);
    }

    public function destroyDeveloper(DevApplication $developer)
    {
        $developer->delete();
        return redirect('/admin/developers')->with('success', 'Deleted.');
    }
}
