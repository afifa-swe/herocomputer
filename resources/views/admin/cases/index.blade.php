@extends('admin.layout')

@section('content')
<div class="topbar">
    <h1>Case Studies</h1>
    <a href="/admin/cases/create" class="btn btn-primary">+ Add Case</a>
</div>

<table>
    <thead>
        <tr>
            <th>Label</th>
            <th>Title (RU)</th>
            <th>Category</th>
            <th>Order</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($cases as $c)
        <tr>
            <td>{{ $c->label }}</td>
            <td>{{ $c->title['ru'] ?? '—' }}</td>
            <td>{{ $c->category }}</td>
            <td>{{ $c->sort_order }}</td>
            <td class="{{ $c->active ? 'status-active' : 'status-inactive' }}">{{ $c->active ? 'Active' : 'Inactive' }}</td>
            <td>
                <a href="/admin/cases/{{ $c->id }}/edit" class="btn btn-sm btn-primary">Edit</a>
                <form action="/admin/cases/{{ $c->id }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Del</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="6" style="color:#6a7a6e;">No cases yet.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
