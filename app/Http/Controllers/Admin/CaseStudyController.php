<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use Illuminate\Http\Request;

class CaseStudyController extends Controller
{
    public function index()
    {
        return view('admin.cases.index', [
            'cases' => CaseStudy::orderBy('sort_order')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.cases.form', ['case' => null]);
    }

    public function store(Request $request)
    {
        $data = $this->validateCase($request);
        $data['active'] = $request->has('active');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        CaseStudy::create($data);

        return redirect('/admin/cases')->with('success', 'Case created.');
    }

    public function edit(CaseStudy $case)
    {
        return view('admin.cases.form', ['case' => $case]);
    }

    public function update(Request $request, CaseStudy $case)
    {
        $data = $this->validateCase($request);
        $data['active'] = $request->has('active');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $case->update($data);

        return redirect('/admin/cases')->with('success', 'Case updated.');
    }

    public function destroy(CaseStudy $case)
    {
        $case->delete();
        return redirect('/admin/cases')->with('success', 'Case deleted.');
    }

    private function validateCase(Request $request): array
    {
        return $request->validate([
            'tag' => 'required|array',
            'tag.ru' => 'required|string|max:255',
            'tag.en' => 'nullable|string|max:255',
            'tag.az' => 'nullable|string|max:255',
            'title' => 'required|array',
            'title.ru' => 'required|string|max:255',
            'title.en' => 'nullable|string|max:255',
            'title.az' => 'nullable|string|max:255',
            'description' => 'required|array',
            'description.ru' => 'required|string|max:2000',
            'description.en' => 'nullable|string|max:2000',
            'description.az' => 'nullable|string|max:2000',
            'tech' => 'nullable|string|max:500',
            'label' => 'nullable|string|max:100',
            'color1' => 'nullable|string|max:50',
            'color2' => 'nullable|string|max:50',
            'text_color' => 'nullable|string|max:50',
            'category' => 'nullable|string|max:100',
            'sort_order' => 'nullable|integer',
            'active' => 'nullable',
        ]);
    }
}
