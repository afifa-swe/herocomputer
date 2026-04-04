@extends('admin.layout')

@section('content')
<div class="topbar">
    <h1>Contact Request #{{ $contact->id }}</h1>
    <a href="/admin/contacts" class="btn btn-sm" style="border:1px solid #1a2a1e;color:#8a9a8e;">&larr; Back</a>
</div>

<div class="card" style="max-width:600px;">
    <div style="margin-bottom:1rem;">
        <div style="font-size:.72rem;color:#6a7a6e;text-transform:uppercase;letter-spacing:.05em;">Name</div>
        <div style="font-size:1rem;">{{ $contact->name }}</div>
    </div>
    <div style="margin-bottom:1rem;">
        <div style="font-size:.72rem;color:#6a7a6e;text-transform:uppercase;letter-spacing:.05em;">Contact</div>
        <div style="font-size:1rem;">{{ $contact->contact }}</div>
    </div>
    <div style="margin-bottom:1rem;">
        <div style="font-size:.72rem;color:#6a7a6e;text-transform:uppercase;letter-spacing:.05em;">Type</div>
        <div style="font-size:1rem;">{{ $contact->type }}</div>
    </div>
    <div style="margin-bottom:1rem;">
        <div style="font-size:.72rem;color:#6a7a6e;text-transform:uppercase;letter-spacing:.05em;">Message</div>
        <div style="font-size:1rem;line-height:1.7;white-space:pre-wrap;">{{ $contact->message }}</div>
    </div>
    <div>
        <div style="font-size:.72rem;color:#6a7a6e;text-transform:uppercase;letter-spacing:.05em;">Date</div>
        <div style="font-size:.9rem;">{{ $contact->created_at->format('d.m.Y H:i:s') }}</div>
    </div>
</div>
@endsection
