<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return view('admin.services.index', [
            'services' => Service::orderBy('sort_order')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.services.form', ['service' => null]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'num' => 'required|string|max:10',
            'title' => 'required|array',
            'title.ru' => 'required|string|max:255',
            'title.en' => 'nullable|string|max:255',
            'title.az' => 'nullable|string|max:255',
            'description' => 'required|array',
            'description.ru' => 'required|string|max:2000',
            'description.en' => 'nullable|string|max:2000',
            'description.az' => 'nullable|string|max:2000',
            'sort_order' => 'nullable|integer',
            'active' => 'nullable',
        ]);

        $data['active'] = $request->has('active');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        Service::create($data);

        return redirect('/admin/services')->with('success', 'Service created.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.form', ['service' => $service]);
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'num' => 'required|string|max:10',
            'title' => 'required|array',
            'title.ru' => 'required|string|max:255',
            'title.en' => 'nullable|string|max:255',
            'title.az' => 'nullable|string|max:255',
            'description' => 'required|array',
            'description.ru' => 'required|string|max:2000',
            'description.en' => 'nullable|string|max:2000',
            'description.az' => 'nullable|string|max:2000',
            'sort_order' => 'nullable|integer',
            'active' => 'nullable',
        ]);

        $data['active'] = $request->has('active');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $service->update($data);

        return redirect('/admin/services')->with('success', 'Service updated.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect('/admin/services')->with('success', 'Service deleted.');
    }
}
