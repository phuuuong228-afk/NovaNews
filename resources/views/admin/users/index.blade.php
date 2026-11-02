
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý người dùng - NovaNews</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f5f9;
            color: #212529;
        }

        a {
            text-decoration: none;
        }

        /* Thanh điều hướng */
        .topbar {
    background: #151515;
    min-height: 66px;
    padding-top: 0;
    padding-bottom: 0;
}

.topbar-inner {
    width: 100%;
    max-width: 1320px;
    min-height: 66px;
    margin: 0 auto;
    padding: 0 12px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

        .brand {
            margin: 0;
            color: #4d83ff;
            font-size: 25px;
            font-weight: 700;
            line-height: 1.2;
            text-decoration: none;
        }

        .topbar nav {
            display: flex;
            align-items: center;
        }

        .topbar nav a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 42px;
            padding: 9px 14px;
            border: 1px solid #dee2e6;
            border-radius: 7px;
            color: #fff;
            background: transparent;
            font-family: Arial, sans-serif;
            font-size: 15px;
            font-weight: 400;
            white-space: nowrap;
            transition: background 0.2s ease;
        }

        .topbar nav a:hover {
            background: #343a40;
        }

        /* Nội dung chính */
       .container {
    width: 100%;
    max-width: 1320px;
    margin: 0 auto;
    padding: 35px 12px;
}
        .page-heading {
            margin-bottom: 26px;
        }

        .page-heading h1 {
            margin: 0 0 10px;
            color: #212529;
            font-size: 34px;
            font-weight: 700;
            line-height: 1.25;
        }

        .page-heading p {
            margin: 0;
            color: #6c757d;
            font-size: 16px;
            line-height: 1.6;
        }

        /* Thông báo */
        .alert {
            margin-bottom: 20px;
            padding: 14px 16px;
            border-radius: 8px;
            font-size: 14px;
        }

        .alert-success {
            color: #0f5132;
            background: #d1e7dd;
            border: 1px solid #badbcc;
        }

        .alert-error {
            color: #842029;
            background: #f8d7da;
            border: 1px solid #f5c2c7;
        }

        /* Thẻ thống kê */
        .stats {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 26px;
        }

        .stat-card {
            min-height: 116px;
            padding: 24px;
            border: 1px solid #e1e7ef;
            border-radius: 14px;
            background: #fff;
            box-shadow: 0 5px 18px rgba(33, 37, 41, 0.04);
        }

        .stat-label {
            color: #6c757d;
            font-size: 15px;
        }

        .stat-number {
            margin-top: 8px;
            color: #212529;
            font-size: 34px;
            font-weight: 700;
            line-height: 1.2;
        }

        /* Khung tìm kiếm và bảng */
        .panel {
            padding: 26px;
            border: 1px solid #e1e7ef;
            border-radius: 14px;
            background: #fff;
            box-shadow: 0 5px 18px rgba(33, 37, 41, 0.05);
        }

        .toolbar {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .search-form {
            display: flex;
            align-items: stretch;
            flex: 1;
            min-width: 0;
            gap: 10px;
            margin: 0;
        }

        input[type="text"] {
            display: block;
            width: 100%;
            min-width: 0;
            min-height: 42px;
            padding: 10px 14px;
            border: 1px solid #ced4da;
            border-radius: 7px;
            background: #fff;
            color: #212529;
            font-family: Arial, sans-serif;
            font-size: 15px;
            outline: none;
        }

        input[type="text"]:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.12);
        }

        /* Nút bấm */
        button,
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 40px;
            padding: 9px 14px;
            border: 1px solid transparent;
            border-radius: 7px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: 600;
            line-height: 1.4;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: background 0.2s ease;
        }

        .btn-primary {
            flex-shrink: 0;
            background: #0d6efd;
            border-color: #0d6efd;
            color: #fff;
        }

        .btn-primary:hover {
            background: #0b5ed7;
            border-color: #0a58ca;
        }

        .btn-secondary {
            background: #fff;
            border-color: #adb5bd;
            color: #6c757d;
        }

        .btn-secondary:hover {
            background: #f1f3f5;
        }

        .btn-warning {
            background: #fff0c2;
            border-color: #fff0c2;
            color: #805600;
        }

        .btn-warning:hover {
            background: #ffe69c;
        }

        .btn-danger {
            background: #dc3545;
            border-color: #dc3545;
            color: #fff;
        }

        .btn-danger:hover {
            background: #bb2d3b;
        }

        /* Bảng người dùng */
        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
        }

        th,
        td {
            padding: 14px 12px;
            border-bottom: 1px solid #dee2e6;
            text-align: left;
            vertical-align: middle;
            line-height: 1.5;
        }

        th {
            background: #eef2f7;
            color: #212529;
            font-size: 14px;
            font-weight: 700;
            white-space: nowrap;
        }

        td {
            color: #212529;
            font-size: 15px;
        }

        tbody tr:hover {
            background: #f8faff;
        }

        .user-name {
            color: #212529;
            font-weight: 700;
        }

        .user-email {
            margin-top: 4px;
            color: #6c757d;
            font-size: 13px;
            overflow-wrap: anywhere;
        }

        /* Nhãn vai trò */
        .role-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            background: #e0ecff;
            color: #1d4ed8;
            font-size: 13px;
            font-weight: 700;
            white-space: nowrap;
        }

        .role-admin {
            background: #f3e8ff;
            color: #7e22ce;
        }

        /* Các thao tác tài khoản */
        .actions {
            display: flex;
            align-items: center;
            gap: 7px;
            flex-wrap: wrap;
        }

        .actions form {
            display: flex;
            align-items: center;
            gap: 7px;
            margin: 0;
        }

        .role-select {
            min-height: 40px;
            padding: 8px 10px;
            border: 1px solid #ced4da;
            border-radius: 7px;
            background: #fff;
            color: #212529;
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        .empty {
            padding: 30px;
            color: #6c757d;
            text-align: center;
        }

        /* Phân trang Laravel */
        .pagination {
            margin-top: 24px;
        }

        .pagination nav > div {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
        }

        .pagination nav p {
            margin: 0;
        }

        .pagination nav a,
        .pagination nav span {
            font-size: 14px;
        }

        .pagination svg {
            width: 18px;
            height: 18px;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .topbar-inner {
                padding: 0 20px;
            }

            .container {
                width: calc(100% - 40px);
                padding: 28px 0;
            }

            .panel {
                padding: 20px;
            }
        }

        @media (max-width: 650px) {
            .topbar,
            .topbar-inner {
                height: auto;
                min-height: 66px;
            }

            .topbar-inner {
                padding: 16px;
            }

            .container {
                width: calc(100% - 24px);
                padding: 22px 0;
            }

            .page-heading h1 {
                font-size: 28px;
            }

            .stats {
                grid-template-columns: 1fr;
                gap: 12px;
            }

            .stat-card {
                padding: 20px;
            }

            .panel {
                padding: 14px;
            }

            .toolbar,
            .search-form {
                width: 100%;
            }

            .search-form {
                flex-direction: column;
            }

            .search-form button {
                width: 100%;
            }

            .actions,
            .actions form {
                flex-wrap: wrap;
            }
        }
    </style>
</head>

<body>

    <!-- Thanh điều hướng: chỉ giữ nút Trang chủ -->
    <header class="topbar">
        <div class="topbar-inner">
            <a class="brand" href="{{ route('admin.posts.index') }}">
                NovaNews
            </a>

            <nav>
                <a href="{{ route('home') }}">Trang chủ</a>
            </nav>
        </div>
    </header>

    <main class="container">

        <!-- Tiêu đề trang -->
        <section class="page-heading">
            <h1>Quản lý người dùng</h1>
            <p>Xem tài khoản, tìm kiếm và quản lý quyền truy cập NovaNews.</p>
        </section>

        <!-- Thông báo thành công -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Thông báo lỗi -->
        @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <!-- Thống kê tài khoản -->
        <section class="stats">
            <div class="stat-card">
                <div class="stat-label">Tổng tài khoản</div>
                <div class="stat-number">{{ $totalUsers }}</div>
            </div>

            <div class="stat-card">
                <div class="stat-label">Tài khoản quản trị</div>
                <div class="stat-number">{{ $totalAdmins }}</div>
            </div>
        </section>

        <!-- Tìm kiếm và danh sách tài khoản -->
        <section class="panel">

            <div class="toolbar">
                <form
                    method="GET"
                    action="{{ route('admin.users.index') }}"
                    class="search-form"
                >
                    <input
                        type="text"
                        name="keyword"
                        value="{{ request('keyword') }}"
                        placeholder="Tìm theo tên hoặc email..."
                        aria-label="Tìm theo tên hoặc email"
                    >

                    <button type="submit" class="btn-primary">
                        Tìm kiếm
                    </button>
                </form>

                @if (request('keyword'))
                    <a
                        class="btn btn-secondary"
                        href="{{ route('admin.users.index') }}"
                    >
                        Xóa lọc
                    </a>
                @endif
            </div>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Người dùng</th>
                            <th>Vai trò</th>
                            <th>Ngày đăng ký</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>

                                <td>
                                    <div class="user-name">
                                        {{ $user->name }}
                                    </div>

                                    <div class="user-email">
                                        {{ $user->email }}
                                    </div>
                                </td>

                                <td>
                                    <span class="role-badge {{ $user->role === 'admin' ? 'role-admin' : '' }}">
                                        {{ $user->role === 'admin' ? 'Admin' : 'Người dùng' }}
                                    </span>
                                </td>

                                <td>
                                    {{ $user->created_at?->format('d/m/Y H:i') ?? '—' }}
                                </td>

                                <td>
                                    <div class="actions">
                                        @if (auth()->id() !== $user->id)

                                            <!-- Cập nhật quyền -->
                                            <form
                                                method="POST"
                                                action="{{ route('admin.users.updateRole', $user) }}"
                                                onsubmit="return confirm('Xác nhận thay đổi quyền tài khoản này?')"
                                            >
                                                @csrf
                                                @method('PATCH')

                                                <select
                                                    name="role"
                                                    class="role-select"
                                                    aria-label="Vai trò người dùng"
                                                >
                                                    <option
                                                        value="user"
                                                        {{ $user->role === 'user' ? 'selected' : '' }}
                                                    >
                                                        User
                                                    </option>

                                                    <option
                                                        value="admin"
                                                        {{ $user->role === 'admin' ? 'selected' : '' }}
                                                    >
                                                        Admin
                                                    </option>
                                                </select>

                                                <button
                                                    type="submit"
                                                    class="btn-warning"
                                                >
                                                    Lưu quyền
                                                </button>
                                            </form>

                                            <!-- Xóa tài khoản -->
                                            <form
                                                method="POST"
                                                action="{{ route('admin.users.destroy', $user) }}"
                                                onsubmit="return confirm('Bạn chắc chắn muốn xóa tài khoản này? Thao tác này không thể hoàn tác.')"
                                            >
                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="btn-danger"
                                                >
                                                    Xóa
                                                </button>
                                            </form>

                                        @else
                                            <span class="user-email">
                                                Tài khoản của bạn
                                            </span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="empty">
                                    Không tìm thấy người dùng phù hợp.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Phân trang -->
            <div class="pagination">
                {{ $users->links() }}
            </div>

        </section>

    </main>

</body>
</html>
