
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký | NovaNews</title>
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
        .form-control::placeholder {
            color: #999;
        }
        a { color: #79aaff; }
    </style>
</head>
<body>
<div class="container px-3">
    <div class="auth-card mx-auto">
        <a href="{{ route('home') }}" class="text-decoration-none fw-bold fs-4">NovaNews</a>
        <h1 class="h3 fw-bold mt-4">Tạo tài khoản</h1>
        <p class="text-secondary">Tham gia cộng đồng độc giả NovaNews.</p>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Họ và tên</label>
                <input id="name" name="name" type="text"
                       class="form-control" value="{{ old('name') }}"
                       placeholder="Nhập họ tên" required maxlength="255" autocomplete="name">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" name="email" type="email"
                       class="form-control" value="{{ old('email') }}"
                       placeholder="name@example.com" required autocomplete="email">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <input id="password" name="password" type="password"
                       class="form-control" placeholder="Ít nhất 8 ký tự"
                       required minlength="8" autocomplete="new-password">
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="form-label">Xác nhận mật khẩu</label>
                <input id="password_confirmation" name="password_confirmation"
                       type="password" class="form-control"
                       placeholder="Nhập lại mật khẩu" required
                       minlength="8" autocomplete="new-password">
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2">Đăng ký</button>
        </form>

        <p class="text-center mt-4 mb-0">
            Đã có tài khoản?
            <a href="{{ route('login') }}">Đăng nhập</a>
        </p>
    </div>
</div>
</body>
</html>
