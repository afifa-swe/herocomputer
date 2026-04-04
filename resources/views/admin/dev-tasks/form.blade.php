@extends('admin.layout')

@section('content')
<div class="topbar">
    <h1>{{ $task ? 'Edit Dev Task' : 'Create Dev Task' }}</h1>
    <a href="/admin/dev-tasks" class="btn btn-sm" style="border:1px solid #1a2a1e;color:#8a9a8e;">&larr; Back</a>
</div>

@if($errors->any())
    <div class="alert" style="border:1px solid #7a2323;background:rgba(122,35,35,.15);color:#d44;">
        @foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach
    </div>
@endif

<form method="POST" action="{{ $task ? '/admin/dev-tasks/'.$task->id : '/admin/dev-tasks' }}" style="max-width:700px;">
    @csrf
    @if($task) @method('PUT') @endif

    <div style="display:grid;grid-template-columns:1fr 1fr 100px;gap:1rem;margin-bottom:1rem;">
        <div class="form-group">
            <label>Stack</label>
            <input type="text" name="stack" value="{{ old('stack', $task->stack ?? '') }}" placeholder="Laravel, Vue, etc.">
        </div>
        <div class="form-group">
            <label>Format</label>
            <input type="text" name="format" value="{{ old('format', $task->format ?? '') }}" placeholder="Remote / Full-time">
        </div>
        <div class="form-group">
            <label>Order</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $task->sort_order ?? 0) }}">
        </div>
    </div>

    <h3 style="font-size:.9rem;color:#6a7a6e;margin-bottom:.75rem;">Title</h3>
    <div class="form-row" style="margin-bottom:1rem;">
        <div class="form-group"><label>RU *</label><input type="text" name="title[ru]" value="{{ old('title.ru', $task->title['ru'] ?? '') }}" required></div>
        <div class="form-group"><label>EN</label><input type="text" name="title[en]" value="{{ old('title.en', $task->title['en'] ?? '') }}"></div>
        <div class="form-group"><label>AZ</label><input type="text" name="title[az]" value="{{ old('title.az', $task->title['az'] ?? '') }}"></div>
    </div>

    <h3 style="font-size:.9rem;color:#6a7a6e;margin-bottom:.75rem;">Description</h3>
    <div class="form-row" style="margin-bottom:1rem;">
        <div class="form-group"><label>RU *</label><textarea name="description[ru]" required>{{ old('description.ru', $task->description['ru'] ?? '') }}</textarea></div>
        <div class="form-group"><label>EN</label><textarea name="description[en]">{{ old('description.en', $task->description['en'] ?? '') }}</textarea></div>
        <div class="form-group"><label>AZ</label><textarea name="description[az]">{{ old('description.az', $task->description['az'] ?? '') }}</textarea></div>
    </div>

    <div class="form-group">
        <label class="checkbox-label">
            <input type="checkbox" name="active" {{ old('active', $task->active ?? true) ? 'checked' : '' }}>
            Active
        </label>
    </div>

    <button type="submit" class="btn btn-primary">{{ $task ? 'Update' : 'Create' }}</button>
</form>
@endsection
