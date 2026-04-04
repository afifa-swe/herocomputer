<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactRequest;
use App\Models\DevApplication;
use App\Models\Service;
use App\Models\CaseStudy;
use App\Models\DevTask;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'contactsCount' => ContactRequest::count(),
            'unreadContacts' => ContactRequest::where('read', false)->count(),
            'devsCount' => DevApplication::count(),
            'unreadDevs' => DevApplication::where('read', false)->count(),
            'servicesCount' => Service::count(),
            'casesCount' => CaseStudy::count(),
            'tasksCount' => DevTask::count(),
        ]);
    }
}
