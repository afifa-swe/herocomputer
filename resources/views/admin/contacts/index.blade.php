@extends('admin.layout')

@section('content')
<div class="topbar">
    <h1>Contact Requests</h1>
</div>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Contact</th>
            <th>Message</th>
            <th>Type</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($contacts as $c)
        <tr class="{{ !$c->read ? 'unread' : '' }}">
            <td>{{ $c->name }}</td>
            <td>{{ $c->contact }}</td>
            <td style="max-width:300px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">{{ $c->message }}</td>
            <td>{{ $c->type }}</td>
            <td>{{ $c->created_at->format('d.m.Y H:i') }}</td>
            <td>
                <a href="/admin/contacts/{{ $c->id }}" class="btn btn-sm btn-primary">View</a>
                <form action="/admin/contacts/{{ $c->id }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Del</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="6" style="color:#6a7a6e;">No contact requests yet.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
