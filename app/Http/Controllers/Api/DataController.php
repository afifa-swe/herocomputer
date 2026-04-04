<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use App\Models\DevTask;
use App\Models\Service;

class DataController extends Controller
{
    public function services()
    {
        return Service::where('active', true)->orderBy('sort_order')->get();
    }

    public function cases()
    {
        return CaseStudy::where('active', true)->orderBy('sort_order')->get();
    }

    public function devTasks()
    {
        return DevTask::where('active', true)->orderBy('sort_order')->get();
    }
}
