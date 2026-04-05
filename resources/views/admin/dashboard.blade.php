@extends('admin.layout')

@section('content')
<div class="topbar">
    <h1>Dashboard</h1>
</div>

<div class="cards-grid">
    <div class="card">
        <div class="card-num">{{ $contactsCount }}</div>
        <div class="card-label">Contact Requests</div>
        @if($unreadContacts > 0)
            <div style="margin-top:.5rem;font-size:.78rem;color:#4F8EFF;">{{ $unreadContacts }} unread</div>
        @endif
    </div>
    <div class="card">
        <div class="card-num">{{ $devsCount }}</div>
        <div class="card-label">Dev Applications</div>
        @if($unreadDevs > 0)
            <div style="margin-top:.5rem;font-size:.78rem;color:#4F8EFF;">{{ $unreadDevs }} unread</div>
        @endif
    </div>
    <div class="card">
        <div class="card-num">{{ $servicesCount }}</div>
        <div class="card-label">Services</div>
    </div>
    <div class="card">
        <div class="card-num">{{ $casesCount }}</div>
        <div class="card-label">Case Studies</div>
    </div>
    <div class="card">
        <div class="card-num">{{ $tasksCount }}</div>
        <div class="card-label">Dev Tasks</div>
    </div>
</div>

<h2 style="font-size:1.1rem;margin-bottom:1rem;">Quick Links</h2>
<div style="display:flex;gap:.75rem;flex-wrap:wrap;">
    <a href="/admin/contacts" class="btn btn-primary">View Contacts</a>
    <a href="/admin/developers" class="btn btn-primary">View Dev Apps</a>
    <a href="/admin/services/create" class="btn btn-primary">Add Service</a>
    <a href="/admin/cases/create" class="btn btn-primary">Add Case</a>
    <a href="/admin/dev-tasks/create" class="btn btn-primary">Add Dev Task</a>
</div>
@endsection
