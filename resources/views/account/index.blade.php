
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tài khoản cá nhân - NovaNews</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f4f6f9;
            font-family: Arial, sans-serif;
            color: #202938;
        }

        /* Navbar đồng bộ trang Quản lý tin tức */
        .navbar {
            background: #151515;
            min-height: 66px;
            padding-top: 0;
            padding-bottom: 0;
        }

        .navbar > .container {
            min-height: 66px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .navbar-brand {
            color: #4d83ff;
            font-weight: bold;
            font-size: 25px;
            margin: 0;
            padding: 0;
        }

        .navbar-brand:hover {
            color: #4d83ff;
        }

        .content {
            padding: 35px 0;
        }

        .page-heading {
            margin-bottom: 24px;
        }

        .page-heading h2 {
            color: #202938;
            font-size: 32px;
            margin-bottom: 8px;
        }

        .page-heading p {
            line-height: 1.6;
        }

        /* Các khung nội dung */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 3px 15px rgba(0, 0, 0, .06);
            margin-bottom: 24px;
        }

        .card-body {
            padding: 24px;
        }

        .section-title {
            font-size: 21px;
            font-weight: bold;
            margin-bottom: 8px;
            color: #202938;
        }

        .section-description {
            color: #6c757d;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-control {
            min-height: 44px;
            border-color: #ced4da;
            border-radius: 7px;
            font-size: 15px;
        }

        .form-control:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 .2rem rgba(13, 110, 253, .12);
        }

        .btn {
            border-radius: 7px;
            font-size: 14px;
            padding: 10px 16px;
        }

        .btn-primary {
            background: #0d6efd;
            border-color: #0d6efd;
        }

        .btn-primary:hover {
            background: #0b5ed7;
            border-color: #0a58ca;
        }

        .danger-card {
            border: 1px solid #f1c6ca;
        }

        .danger-card .section-title {
            color: #b02a37;
        }

        .footer {
            padding: 20px 12px;
            text-align: center;
            color: #6c757d;
            font-size: 13px;
        }

        @media (max-width: 768px) {
            .content {
                padding: 22px 0;
            }

            .page-heading h2 {
                font-size: 27px;
            }

            .card-body {
                padding: 18px;
            }
        }
    </style>
</head>

<body>

    <!-- Thanh điều hướng -->
    <nav class="navbar navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                NovaNews
            </a>

            <a href="{{ route('home') }}" class="btn btn-outline-light">
                Trang chủ
            </a>
        </div>
    </nav>

    <main class="container content">

        <!-- Tiêu đề -->
        <div class="page-heading">
            <h2 class="fw-bold">Tài khoản cá nhân</h2>
            <p class="text-secondary mb-0">
                Xin chào {{ $user->name }}! Quản lý thông tin và bảo mật
                tài khoản NovaNews của bạn.
            </p>
        </div>

        <!-- Thông báo thành công -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="Đóng"></button>
            </div>
        @endif

        <!-- Thông báo lỗi -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Thông tin cá nhân -->
        <section class="card">
            <div class="card-body">
                <h5 class="section-title">Thông tin cá nhân</h5>
                <p class="section-description">
                    Cập nhật họ tên và địa chỉ email của bạn.
                </p>

                <form action="{{ route('account.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Họ và tên</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-control"
                            value="{{ old('name', $user->name) }}"
                            maxlength="255"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Địa chỉ email</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email', $user->email) }}"
                            maxlength="255"
                            required
                        >
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Lưu thay đổi
                    </button>
                </form>
            </div>
        </section>

        <!-- Đổi mật khẩu -->
        <section class="card">
            <div class="card-body">
                <h5 class="section-title">Đổi mật khẩu</h5>
                <p class="section-description">
                    Nhập mật khẩu hiện tại để xác nhận, sau đó thiết lập mật khẩu mới.
                </p>

                <form action="{{ route('account.password') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="current_password" class="form-label">
                            Mật khẩu hiện tại
                        </label>
                        <input
                            type="password"
                            id="current_password"
                            name="current_password"
                            class="form-control"
                            autocomplete="current-password"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">
                            Mật khẩu mới
                        </label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-control"
                            minlength="8"
                            autocomplete="new-password"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">
                            Xác nhận mật khẩu mới
                        </label>
                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            class="form-control"
                            minlength="8"
                            autocomplete="new-password"
                            required
                        >
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Đổi mật khẩu
                    </button>
                </form>
            </div>
        </section>

        <!-- Xóa tài khoản -->
        <section class="card danger-card">
            <div class="card-body">
                <h5 class="section-title">Xóa tài khoản</h5>
                <p class="section-description">
                    Thao tác này sẽ xóa tài khoản của bạn và có thể ảnh hưởng
                    đến dữ liệu bài viết, bình luận liên quan. Hãy cân nhắc
                    trước khi tiếp tục.
                </p>

                <form
                    action="{{ route('account.destroy') }}"
                    method="POST"
                    onsubmit="return confirm('Bạn có chắc chắn muốn xóa tài khoản? Thao tác này có thể không thể hoàn tác.');"
                >
                    @csrf
                    @method('DELETE')

                    <div class="mb-3">
                        <label for="delete_password" class="form-label">
                            Nhập mật khẩu hiện tại để xác nhận
                        </label>
                        <input
                            type="password"
                            id="delete_password"
                            name="password"
                            class="form-control"
                            autocomplete="current-password"
                            required
                        >
                    </div>

                    <button type="submit" class="btn btn-danger">
                        Xóa tài khoản của tôi
                    </button>
                </form>
            </div>
        </section>

    </main>

    <footer class="footer">
        © {{ date('Y') }} NovaNews - Tạp chí điện tử
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
