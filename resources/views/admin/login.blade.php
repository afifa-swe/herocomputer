<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — HeroComputer Admin</title>
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family:'Segoe UI',sans-serif; background:#080810; color:#e8e8e8; min-height:100vh; display:flex; align-items:center; justify-content:center; }
        .login-box { width:100%; max-width:380px; padding:2.5rem; background:#0F0F1A; border:1px solid #1A1A2E; border-radius:8px; }
        .login-box h1 { font-size:1.4rem; font-weight:800; margin-bottom:.5rem; color:#4F8EFF; }
        .login-box p { font-size:.85rem; color:#475569; margin-bottom:2rem; }
        .form-group { margin-bottom:1rem; }
        .form-group label { display:block; font-size:.8rem; color:#94A3B8; margin-bottom:.3rem; }
        .form-group input { width:100%; background:#080810; border:1px solid #1A1A2E; color:#e8e8e8; padding:.6rem .75rem; font-size:.85rem; border-radius:4px; }
        .form-group input:focus { outline:none; border-color:#4F8EFF; }
        .btn { width:100%; padding:.6rem; background:#4F8EFF; color:#fff; border:none; border-radius:4px; font-size:.9rem; cursor:pointer; margin-top:.5rem; }
        .btn:hover { background:#3A6FD8; }
        .error { color:#d44; font-size:.82rem; margin-bottom:1rem; }
        .checkbox-row { display:flex; align-items:center; gap:.5rem; margin-bottom:1rem; font-size:.82rem; color:#94A3B8; }
    </style>
</head>
<body>
    <div class="login-box">
        <h1>HeroComputer</h1>
        <p>Admin Panel</p>
        @if($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif
        <form method="POST" action="/admin/login">
            @csrf
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <div class="checkbox-row">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember me</label>
            </div>
            <button type="submit" class="btn">Sign In</button>
        </form>
    </div>
</body>
</html>
