@extends('admin.layout')

@section('content')
<div class="topbar">
    <h1>{{ $case ? 'Edit Case' : 'Create Case' }}</h1>
    <a href="/admin/cases" class="btn btn-sm" style="border:1px solid #1a2a1e;color:#8a9a8e;">&larr; Back</a>
</div>

@if($errors->any())
    <div class="alert" style="border:1px solid #7a2323;background:rgba(122,35,35,.15);color:#d44;">
        @foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach
    </div>
@endif

<form method="POST" action="{{ $case ? '/admin/cases/'.$case->id : '/admin/cases' }}" style="max-width:800px;">
    @csrf
    @if($case) @method('PUT') @endif

    <div style="display:grid;grid-template-columns:1fr 1fr 1fr 100px;gap:1rem;margin-bottom:1rem;">
        <div class="form-group">
            <label>Label</label>
            <input type="text" name="label" value="{{ old('label', $case->label ?? '') }}">
        </div>
        <div class="form-group">
            <label>Category</label>
            <input type="text" name="category" value="{{ old('category', $case->category ?? '') }}">
        </div>
        <div class="form-group">
            <label>Tech Stack</label>
            <input type="text" name="tech" value="{{ old('tech', $case->tech ?? '') }}">
        </div>
        <div class="form-group">
            <label>Order</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $case->sort_order ?? 0) }}">
        </div>
    </div>

    <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:1rem;margin-bottom:1rem;">
        <div class="form-group">
            <label>Color 1</label>
            <input type="text" name="color1" value="{{ old('color1', $case->color1 ?? '#1a2a1a') }}" placeholder="#1a2a1a">
        </div>
        <div class="form-group">
            <label>Color 2</label>
            <input type="text" name="color2" value="{{ old('color2', $case->color2 ?? '#0a1a0a') }}" placeholder="#0a1a0a">
        </div>
        <div class="form-group">
            <label>Text Color</label>
            <input type="text" name="text_color" value="{{ old('text_color', $case->text_color ?? '#f0ede8') }}" placeholder="#f0ede8">
        </div>
    </div>

    <h3 style="font-size:.9rem;color:#6a7a6e;margin-bottom:.75rem;">Tag</h3>
    <div class="form-row" style="margin-bottom:1rem;">
        <div class="form-group"><label>RU *</label><input type="text" name="tag[ru]" value="{{ old('tag.ru', $case->tag['ru'] ?? '') }}" required></div>
        <div class="form-group"><label>EN</label><input type="text" name="tag[en]" value="{{ old('tag.en', $case->tag['en'] ?? '') }}"></div>
        <div class="form-group"><label>AZ</label><input type="text" name="tag[az]" value="{{ old('tag.az', $case->tag['az'] ?? '') }}"></div>
    </div>

    <h3 style="font-size:.9rem;color:#6a7a6e;margin-bottom:.75rem;">Title</h3>
    <div class="form-row" style="margin-bottom:1rem;">
        <div class="form-group"><label>RU *</label><input type="text" name="title[ru]" value="{{ old('title.ru', $case->title['ru'] ?? '') }}" required></div>
        <div class="form-group"><label>EN</label><input type="text" name="title[en]" value="{{ old('title.en', $case->title['en'] ?? '') }}"></div>
        <div class="form-group"><label>AZ</label><input type="text" name="title[az]" value="{{ old('title.az', $case->title['az'] ?? '') }}"></div>
    </div>

    <h3 style="font-size:.9rem;color:#6a7a6e;margin-bottom:.75rem;">Description</h3>
    <div class="form-row" style="margin-bottom:1rem;">
        <div class="form-group"><label>RU *</label><textarea name="description[ru]" required>{{ old('description.ru', $case->description['ru'] ?? '') }}</textarea></div>
        <div class="form-group"><label>EN</label><textarea name="description[en]">{{ old('description.en', $case->description['en'] ?? '') }}</textarea></div>
        <div class="form-group"><label>AZ</label><textarea name="description[az]">{{ old('description.az', $case->description['az'] ?? '') }}</textarea></div>
    </div>

    <div class="form-group">
        <label class="checkbox-label">
            <input type="checkbox" name="active" {{ old('active', $case->active ?? true) ? 'checked' : '' }}>
            Active
        </label>
    </div>

    <button type="submit" class="btn btn-primary">{{ $case ? 'Update' : 'Create' }}</button>
</form>
@endsection
