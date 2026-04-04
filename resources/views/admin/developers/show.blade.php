@extends('admin.layout')

@section('content')
<div class="topbar">
    <h1>Developer Application #{{ $developer->id }}</h1>
    <a href="/admin/developers" class="btn btn-sm" style="border:1px solid #1a2a1e;color:#8a9a8e;">&larr; Back</a>
</div>

<div class="card" style="max-width:600px;">
    <div style="margin-bottom:1rem;">
        <div style="font-size:.72rem;color:#6a7a6e;text-transform:uppercase;letter-spacing:.05em;">Name</div>
        <div style="font-size:1rem;">{{ $developer->name }}</div>
    </div>
    <div style="margin-bottom:1rem;">
        <div style="font-size:.72rem;color:#6a7a6e;text-transform:uppercase;letter-spacing:.05em;">Telegram</div>
        <div style="font-size:1rem;">{{ $developer->telegram }}</div>
    </div>
    <div style="margin-bottom:1rem;">
        <div style="font-size:.72rem;color:#6a7a6e;text-transform:uppercase;letter-spacing:.05em;">Stack</div>
        <div style="font-size:1rem;">{{ $developer->stack }}</div>
    </div>
    <div style="margin-bottom:1rem;">
        <div style="font-size:.72rem;color:#6a7a6e;text-transform:uppercase;letter-spacing:.05em;">Experience</div>
        <div style="font-size:1rem;">{{ $developer->experience }}</div>
    </div>
    @if($developer->portfolio_link)
    <div style="margin-bottom:1rem;">
        <div style="font-size:.72rem;color:#6a7a6e;text-transform:uppercase;letter-spacing:.05em;">Portfolio</div>
        <div style="font-size:1rem;"><a href="{{ $developer->portfolio_link }}" target="_blank">{{ $developer->portfolio_link }}</a></div>
    </div>
    @endif
    <div style="margin-bottom:1rem;">
        <div style="font-size:.72rem;color:#6a7a6e;text-transform:uppercase;letter-spacing:.05em;">About</div>
        <div style="font-size:1rem;line-height:1.7;white-space:pre-wrap;">{{ $developer->about }}</div>
    </div>
    <div>
        <div style="font-size:.72rem;color:#6a7a6e;text-transform:uppercase;letter-spacing:.05em;">Date</div>
        <div style="font-size:.9rem;">{{ $developer->created_at->format('d.m.Y H:i:s') }}</div>
    </div>
</div>
@endsection
