
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lý danh mục | NovaNews</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f3f5f9;
            color: #212529;
            font-family: Arial, sans-serif;
        }

        a {
            text-decoration: none;
        }

        /* Thanh điều hướng */
        .navbar {
            width: 100%;
            background: #111;
            color: #fff;
        }

        .navbar-inner {
            width: 100%;
            max-width: 1320px;
            min-height: 66px;
            margin: 0 auto;
            padding: 0 12px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .brand {
            color: #4d83ff;
            font-size: 25px;
            font-weight: bold;
            margin: 0;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Nút bấm */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 40px;
            padding: 9px 14px;
            border: 1px solid #3984ff;
            border-radius: 7px;
            background: #0d6efd;
            color: #fff;
            font-size: 15px;
            font-family: inherit;
            white-space: nowrap;
            cursor: pointer;
            transition: background 0.2s, color 0.2s;
        }

        .btn:hover {
            background: #0b5ed7;
            color: #fff;
        }

        .btn-outline {
            background: transparent;
            border-color: #dee2e6;
            color: #fff;
        }

        .btn-outline:hover {
            background: #343a40;
            color: #fff;
        }

        .btn-edit {
            background: #fff;
            color: #0d6efd;
            border-color: #0d6efd;
        }

        .btn-edit:hover {
            background: #0d6efd;
            color: #fff;
        }

        .btn-danger {
            background: #fff;
            color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background: #dc3545;
            color: #fff;
        }

        /* Nội dung */
        .container {
            width: 100%;
            max-width: 1320px;
            margin: 0 auto;
            padding: 36px 12px;
        }

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 26px;
        }

        .page-heading h1 {
            margin: 0 0 10px;
            font-size: 34px;
            line-height: 1.25;
            color: #212529;
        }

        .page-heading p {
            margin: 0;
            color: #6c757d;
            font-size: 16px;
            line-height: 1.6;
        }

        .heading-actions {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 10px;
            flex-shrink: 0;
        }

        /* Khung danh sách */
        .panel {
            background: #fff;
            border: 1px solid #edf0f4;
            border-radius: 14px;
            padding: 26px;
            margin-bottom: 26px;
            box-shadow: 0 5px 18px rgba(33, 37, 41, 0.06);
        }

        .panel h2 {
            margin: 0 0 12px;
            font-size: 23px;
            color: #212529;
        }

        .panel-description {
            margin: 0 0 22px;
            color: #6c757d;
            line-height: 1.6;
        }

        /* Thông báo */
        .message {
            padding: 14px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .success {
            background: #d1e7dd;
            color: #0f5132;
            border: 1px solid #badbcc;
        }

        .error {
            background: #f8d7da;
            color: #842029;
            border: 1px solid #f5c2c7;
        }

        /* Bảng danh mục */
        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 12px;
            background: #fff;
        }

        th,
        td {
            padding: 15px 12px;
            text-align: left;
            vertical-align: middle;
            border-bottom: 1px solid #dee2e6;
            line-height: 1.5;
        }

        th {
            background: #eef2f7;
            color: #212529;
            font-weight: 700;
            white-space: nowrap;
        }

        tbody tr:hover {
            background: #f8faff;
        }

        .category-name {
            color: #212529;
            font-weight: 700;
        }

        .muted {
            color: #6c757d;
        }

        .category-description {
            margin-top: 4px;
            color: #6c757d;
        }

        .table-actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        form.inline {
            display: inline;
            margin: 0;
        }

        /* Phân trang */
        .pagination-wrap {
            margin-top: 24px;
            overflow-x: auto;
        }

        .pagination-wrap nav {
            display: flex;
            justify-content: flex-end;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .navbar-inner {
                padding: 14px 20px;
            }

            .nav-actions {
                flex-wrap: wrap;
            }

            .container {
                padding: 26px 20px;
            }

            .page-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .heading-actions {
                width: 100%;
                justify-content: flex-start;
            }
        }

        @media (max-width: 600px) {
            .navbar-inner {
                padding: 16px;
                align-items: center;
            }

            .brand {
                font-size: 25px;
            }

            .nav-actions {
                width: auto;
            }

            .nav-actions .btn {
                white-space: normal;
                text-align: center;
            }

            .container {
                padding: 22px 12px;
            }

            .page-heading h1 {
                font-size: 28px;
            }

            .panel {
                padding: 16px;
                border-radius: 10px;
            }

            .panel h2 {
                font-size: 21px;
            }

            th,
            td {
                padding: 12px 10px;
            }

            .table-actions {
                flex-wrap: wrap;
            }
        }
    </style>
</head>

<body>

    <!-- Thanh điều hướng -->
    <header class="navbar">
        <div class="navbar-inner">
            <a class="brand" href="{{ route('admin.posts.index') }}">
                NovaNews
            </a>

            <div class="nav-actions">
                <a class="btn btn-outline"
                   href="{{ route('admin.posts.index') }}">
                    Quản lý bài viết
                </a>

                <a class="btn btn-outline"
                   href="{{ route('home') }}">
                    Trang chủ
                </a>
            </div>
        </div>
    </header>

    <main class="container">

        <!-- Tiêu đề và nút thêm danh mục -->
        <section class="page-heading">
            <div>
                <h1>Quản lý danh mục</h1>
                <p>
                    Quản lý chủ đề hiển thị trên trang chủ
                    và trong bộ lọc bài viết của NovaNews.
                </p>
            </div>

            <div class="heading-actions">
                <a class="btn"
                   href="{{ route('admin.categories.create') }}">
                    + Thêm danh mục
                </a>
            </div>
        </section>

        <!-- Thông báo -->
        @if (session('success'))
            <div class="message success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="message error">
                {{ session('error') }}
            </div>
        @endif

        <!-- Danh sách danh mục -->
        <section class="panel">
            <h2>Danh sách danh mục</h2>

            <p class="panel-description">
                Quản lý các danh mục bài viết trên hệ thống.
            </p>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên danh mục</th>
                            <th>Slug</th>
                            <th>Số bài viết</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>

                                <td>
                                    <div class="category-name">
                                        {{ $category->name }}
                                    </div>

                                    @if ($category->description)
                                        <div class="category-description">
                                            {{ $category->description }}
                                        </div>
                                    @endif
                                </td>

                                <td>{{ $category->slug }}</td>

                                <td>{{ $category->posts_count }}</td>

                                <td>
                                    <div class="table-actions">
                                        <a
                                            class="btn btn-edit"
                                            href="{{ route('admin.categories.edit', $category) }}">
                                            Sửa
                                        </a>

                                        <form
                                            class="inline"
                                            method="POST"
                                            action="{{ route('admin.categories.destroy', $category) }}"
                                            onsubmit="return confirm('Bà có chắc muốn xóa danh mục này không?')">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                class="btn btn-danger"
                                                type="submit">
                                                Xóa
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="muted">
                                    Chưa có danh mục nào.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Phân trang -->
            <div class="pagination-wrap">
                {{ $categories->links() }}
            </div>
        </section>

    </main>

</body>
</html>
