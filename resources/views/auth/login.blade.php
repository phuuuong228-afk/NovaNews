
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập | NovaNews</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #111;
            color: #f5f5f5;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
        }
        .auth-card {
            width: 100%;
            max-width: 460px;
            padding: 32px;
            background: #202020;
            border: 1px solid #383838;
            border-radius: 16px;
        }
        .form-control {
            background: #151515;
            color: white;
            border-color: #444;
            padding: 11px;
        }
        .form-control:focus {
            background: #151515;
            color: white;
            border-color: #5794ff;
            box-shadow: none;
        }
        .form-control::placeholder { color: #999; }
        a { color: #79aaff; }
    </style>
</head>
<body>
<div class="container px-3">
    <div class="auth-card mx-auto">
        <a href="{{ route('home') }}" class="text-decoration-none fw-bold fs-4">NovaNews</a>
        <h1 class="h3 fw-bold mt-4">Chào mừng trở lại</h1>
        <p class="text-secondary">Đăng nhập để tiếp tục sử dụng tài khoản.</p>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" name="email" type="email"
                       class="form-control" value="{{ old('email') }}"
                       placeholder="name@example.com" required autocomplete="email">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <input id="password" name="password" type="password"
                       class="form-control" placeholder="Nhập mật khẩu"
                       required autocomplete="current-password">
            </div>

            <div class="form-check mb-4">
                <input id="remember" name="remember" type="checkbox" value="1"
                       class="form-check-input">
                <label for="remember" class="form-check-label">Ghi nhớ đăng nhập</label>
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2">Đăng nhập</button>
        </form>

        <p class="text-center mt-4 mb-0">
            Chưa có tài khoản?
            <a href="{{ route('register') }}">Đăng ký ngay</a>
        </p>
    </div>
</div>
</body>
</html>
