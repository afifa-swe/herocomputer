<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DevTask;
use Illuminate\Http\Request;

class DevTaskController extends Controller
{
    public function index()
    {
        return view('admin.dev-tasks.index', [
            'tasks' => DevTask::orderBy('sort_order')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.dev-tasks.form', ['task' => null]);
    }

    public function store(Request $request)
    {
        $data = $this->validateTask($request);
        $data['active'] = $request->has('active');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        DevTask::create($data);

        return redirect('/admin/dev-tasks')->with('success', 'Task created.');
    }

    public function edit(DevTask $devTask)
    {
        return view('admin.dev-tasks.form', ['task' => $devTask]);
    }

    public function update(Request $request, DevTask $devTask)
    {
        $data = $this->validateTask($request);
        $data['active'] = $request->has('active');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $devTask->update($data);

        return redirect('/admin/dev-tasks')->with('success', 'Task updated.');
    }

    public function destroy(DevTask $devTask)
    {
        $devTask->delete();
        return redirect('/admin/dev-tasks')->with('success', 'Task deleted.');
    }

    private function validateTask(Request $request): array
    {
        return $request->validate([
            'title' => 'required|array',
            'title.ru' => 'required|string|max:255',
            'title.en' => 'nullable|string|max:255',
            'title.az' => 'nullable|string|max:255',
            'description' => 'required|array',
            'description.ru' => 'required|string|max:2000',
            'description.en' => 'nullable|string|max:2000',
            'description.az' => 'nullable|string|max:2000',
            'stack' => 'nullable|string|max:500',
            'format' => 'nullable|string|max:100',
            'sort_order' => 'nullable|integer',
            'active' => 'nullable',
        ]);
    }
}
