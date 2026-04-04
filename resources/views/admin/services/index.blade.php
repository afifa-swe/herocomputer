@extends('admin.layout')

@section('content')
<div class="topbar">
    <h1>Services</h1>
    <a href="/admin/services/create" class="btn btn-primary">+ Add Service</a>
</div>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Title (RU)</th>
            <th>Title (EN)</th>
            <th>Order</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($services as $s)
        <tr>
            <td>{{ $s->num }}</td>
            <td>{{ $s->title['ru'] ?? '—' }}</td>
            <td>{{ $s->title['en'] ?? '—' }}</td>
            <td>{{ $s->sort_order }}</td>
            <td class="{{ $s->active ? 'status-active' : 'status-inactive' }}">{{ $s->active ? 'Active' : 'Inactive' }}</td>
            <td>
                <a href="/admin/services/{{ $s->id }}/edit" class="btn btn-sm btn-primary">Edit</a>
                <form action="/admin/services/{{ $s->id }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Del</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="6" style="color:#6a7a6e;">No services yet.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
