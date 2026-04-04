<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — HeroComputer</title>
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family: 'Segoe UI', sans-serif; background:#0f1110; color:#e8e8e8; min-height:100vh; display:flex; }
        a { color:#237a4d; text-decoration:none; }
        a:hover { text-decoration:underline; }

        .sidebar { width:220px; background:#0a0d0b; border-right:1px solid #1a2a1e; padding:1.5rem 0; position:fixed; top:0; left:0; bottom:0; overflow-y:auto; }
        .sidebar-logo { padding:0 1.25rem 1.5rem; font-weight:800; font-size:1.1rem; color:#237a4d; border-bottom:1px solid #1a2a1e; margin-bottom:1rem; }
        .sidebar a { display:block; padding:.6rem 1.25rem; color:#8a9a8e; font-size:.85rem; transition:background .15s; }
        .sidebar a:hover, .sidebar a.active { background:#1a2a1e; color:#e8e8e8; text-decoration:none; }
        .sidebar .badge { background:#237a4d; color:#fff; font-size:.7rem; padding:1px 6px; border-radius:8px; margin-left:.5rem; }

        .main { margin-left:220px; flex:1; padding:2rem 2.5rem; min-height:100vh; }
        .topbar { display:flex; justify-content:space-between; align-items:center; margin-bottom:2rem; padding-bottom:1rem; border-bottom:1px solid #1a2a1e; }
        .topbar h1 { font-size:1.4rem; font-weight:700; }

        .btn { display:inline-block; padding:.5rem 1.2rem; border-radius:4px; font-size:.85rem; border:none; cursor:pointer; text-decoration:none !important; }
        .btn-primary { background:#237a4d; color:#fff; }
        .btn-primary:hover { background:#1b5e3b; }
        .btn-danger { background:#7a2323; color:#fff; }
        .btn-danger:hover { background:#5e1b1b; }
        .btn-sm { padding:.3rem .8rem; font-size:.78rem; }

        table { width:100%; border-collapse:collapse; }
        th, td { text-align:left; padding:.65rem .8rem; border-bottom:1px solid #1a2a1e; font-size:.85rem; }
        th { color:#6a7a6e; font-weight:600; text-transform:uppercase; font-size:.72rem; letter-spacing:.05em; }
        tr:hover { background:#111814; }

        .card { background:#111814; border:1px solid #1a2a1e; padding:1.5rem; border-radius:6px; }
        .cards-grid { display:grid; grid-template-columns:repeat(auto-fill, minmax(200px, 1fr)); gap:1rem; margin-bottom:2rem; }
        .card-num { font-size:2rem; font-weight:800; color:#237a4d; }
        .card-label { font-size:.78rem; color:#6a7a6e; margin-top:.25rem; }

        .form-group { margin-bottom:1rem; }
        .form-group label { display:block; font-size:.8rem; color:#8a9a8e; margin-bottom:.3rem; }
        .form-group input, .form-group textarea, .form-group select { width:100%; background:#0a0d0b; border:1px solid #1a2a1e; color:#e8e8e8; padding:.5rem .75rem; font-size:.85rem; border-radius:4px; }
        .form-group textarea { min-height:80px; resize:vertical; }
        .form-group input:focus, .form-group textarea:focus { outline:none; border-color:#237a4d; }
        .form-row { display:grid; grid-template-columns:1fr 1fr 1fr; gap:1rem; }
        .form-inline { display:flex; align-items:center; gap:.5rem; }
        .checkbox-label { display:flex; align-items:center; gap:.5rem; font-size:.85rem; cursor:pointer; }
        .checkbox-label input[type=checkbox] { width:auto; }

        .alert { padding:.75rem 1rem; border-radius:4px; margin-bottom:1.5rem; font-size:.85rem; }
        .alert-success { background:rgba(35,122,77,.15); border:1px solid #237a4d; color:#237a4d; }

        .status-active { color:#237a4d; }
        .status-inactive { color:#7a6a23; }
        .unread { font-weight:700; }
    </style>
</head>
<body>
    <nav class="sidebar">
        <div class="sidebar-logo">HC Admin</div>
        <a href="/admin" class="{{ request()->is('admin') && !request()->is('admin/*') ? 'active' : '' }}">Dashboard</a>
        <a href="/admin/services" class="{{ request()->is('admin/services*') ? 'active' : '' }}">Services</a>
        <a href="/admin/cases" class="{{ request()->is('admin/cases*') ? 'active' : '' }}">Cases</a>
        <a href="/admin/dev-tasks" class="{{ request()->is('admin/dev-tasks*') ? 'active' : '' }}">Dev Tasks</a>
        <a href="/admin/contacts" class="{{ request()->is('admin/contacts*') ? 'active' : '' }}">
            Contacts
            @if(($unread = \App\Models\ContactRequest::where('read', false)->count()) > 0)
                <span class="badge">{{ $unread }}</span>
            @endif
        </a>
        <a href="/admin/developers" class="{{ request()->is('admin/developers*') ? 'active' : '' }}">
            Dev Applications
            @if(($unreadDev = \App\Models\DevApplication::where('read', false)->count()) > 0)
                <span class="badge">{{ $unreadDev }}</span>
            @endif
        </a>
        <a href="/" target="_blank" style="margin-top:2rem;border-top:1px solid #1a2a1e;padding-top:1rem;">View Site &rarr;</a>
        <form action="/admin/logout" method="POST" style="padding:0 1.25rem;margin-top:1rem;">
            @csrf
            <button type="submit" class="btn btn-sm" style="background:transparent;color:#6a7a6e;border:1px solid #1a2a1e;width:100%;">Logout</button>
        </form>
    </nav>
    <div class="main">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @yield('content')
    </div>
</body>
</html>
