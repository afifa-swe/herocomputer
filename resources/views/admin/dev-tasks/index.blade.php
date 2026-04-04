@extends('admin.layout')

@section('content')
<div class="topbar">
    <h1>Dev Tasks</h1>
    <a href="/admin/dev-tasks/create" class="btn btn-primary">+ Add Task</a>
</div>

<table>
    <thead>
        <tr>
            <th>Title (RU)</th>
            <th>Stack</th>
            <th>Format</th>
            <th>Order</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($tasks as $t)
        <tr>
            <td>{{ $t->title['ru'] ?? '—' }}</td>
            <td>{{ $t->stack }}</td>
            <td>{{ $t->format }}</td>
            <td>{{ $t->sort_order }}</td>
            <td class="{{ $t->active ? 'status-active' : 'status-inactive' }}">{{ $t->active ? 'Active' : 'Inactive' }}</td>
            <td>
                <a href="/admin/dev-tasks/{{ $t->id }}/edit" class="btn btn-sm btn-primary">Edit</a>
                <form action="/admin/dev-tasks/{{ $t->id }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Del</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="6" style="color:#6a7a6e;">No tasks yet.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
