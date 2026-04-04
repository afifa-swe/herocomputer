@extends('admin.layout')

@section('content')
<div class="topbar">
    <h1>Developer Applications</h1>
</div>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Telegram</th>
            <th>Stack</th>
            <th>Experience</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($developers as $d)
        <tr class="{{ !$d->read ? 'unread' : '' }}">
            <td>{{ $d->name }}</td>
            <td>{{ $d->telegram }}</td>
            <td>{{ $d->stack }}</td>
            <td>{{ $d->experience }}</td>
            <td>{{ $d->created_at->format('d.m.Y H:i') }}</td>
            <td>
                <a href="/admin/developers/{{ $d->id }}" class="btn btn-sm btn-primary">View</a>
                <form action="/admin/developers/{{ $d->id }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Del</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="6" style="color:#6a7a6e;">No applications yet.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
