
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm bài viết - NovaNews</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f4f6f9;
            color: #212529;
            font-family: Arial, sans-serif;
        }

        /* Navbar đồng bộ trang Quản lý tin tức */
        .navbar {
            min-height: 66px;
            padding: 0;
            background: #151515;
        }

        .navbar > .container {
            min-height: 66px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }

        .navbar-brand {
            margin: 0;
            padding: 0;
            color: #4d83ff;
            font-size: 25px;
            font-weight: 700;
        }

        .navbar-brand:hover {
            color: #4d83ff;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 42px;
            padding: 9px 15px;
            border: 1px solid #dee2e6;
            border-radius: 7px;
            background: transparent;
            color: #fff;
            font-size: 15px;
            text-decoration: none;
            white-space: nowrap;
        }

        .btn-back:hover {
            background: #343a40;
            color: #fff;
        }

        /* Nội dung trang */
        .page-content {
            padding-top: 35px;
            padding-bottom: 40px;
        }

        .page-heading {
            margin-bottom: 24px;
        }

        .page-heading h1 {
            margin: 0 0 8px;
            color: #212529;
            font-size: 32px;
            line-height: 1.3;
        }

        .page-heading p {
            margin: 0;
            color: #6c757d;
            font-size: 16px;
            line-height: 1.6;
        }

        /* Khung biểu mẫu */
        .form-card {
            border: 0;
            border-radius: 12px;
            background: #fff;
            box-shadow: 0 3px 15px rgba(0, 0, 0, .06);
        }

        .form-card .card-body {
            padding: 28px;
        }

        .form-label {
            margin-bottom: 8px;
            color: #212529;
            font-weight: 600;
        }

        .form-control,
        .form-select {
            min-height: 44px;
            border: 1px solid #ced4da;
            border-radius: 7px;
            font-size: 15px;
        }

        textarea.form-control {
            min-height: auto;
            line-height: 1.6;
            resize: vertical;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 .2rem rgba(13, 110, 253, .12);
        }

        .form-text {
            margin-top: 7px;
            color: #6c757d;
            line-height: 1.5;
        }

        .form-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 24px;
        }

        .form-actions .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 42px;
            padding: 10px 18px;
            border-radius: 7px;
            font-size: 14px;
        }

        .btn-primary {
            background: #0d6efd;
            border-color: #0d6efd;
        }

        .btn-primary:hover {
            background: #0b5ed7;
            border-color: #0a58ca;
        }

        .btn-cancel {
            border: 1px solid #6c757d;
            color: #6c757d;
            background: #fff;
            text-decoration: none;
        }

        .btn-cancel:hover {
            background: #6c757d;
            color: #fff;
        }

        .alert {
            border-radius: 9px;
            line-height: 1.6;
        }

        @media (max-width: 768px) {
            .page-content {
                padding-top: 24px;
            }

            .page-heading h1 {
                font-size: 27px;
            }

            .form-card .card-body {
                padding: 18px;
            }
        }

        @media (max-width: 480px) {
            .navbar > .container {
                gap: 10px;
            }

            .navbar-brand {
                font-size: 22px;
            }

            .btn-back {
                padding: 8px 10px;
                font-size: 13px;
            }

            .form-actions .btn {
                flex: 1;
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

            <a href="{{ route('admin.posts.index') }}" class="btn-back">
                Quay lại danh sách
            </a>
        </div>
    </nav>

    <main class="container page-content">

        <!-- Tiêu đề -->
        <section class="page-heading">
            <h1 class="fw-bold">Thêm bài viết mới</h1>
            <p>
                Nhập thông tin để tạo bài viết cho NovaNews.
            </p>
        </section>

        <!-- Hiển thị lỗi -->
        @if ($errors->any())
            <div class="alert alert-danger mb-4">
                <strong>Vui lòng kiểm tra lại thông tin:</strong>

                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Biểu mẫu tạo bài viết -->
        <section class="card form-card">
            <div class="card-body">

                <form method="POST"
                      action="{{ route('admin.posts.store') }}"
                      enctype="multipart/form-data">

                    @csrf

                    <!-- Tiêu đề -->
                    <div class="mb-4">
                        <label for="title" class="form-label">
                            Tiêu đề bài viết *
                        </label>

                        <input
                            type="text"
                            id="title"
                            name="title"
                            class="form-control"
                            value="{{ old('title') }}"
                            placeholder="Nhập tiêu đề bài viết"
                            maxlength="255"
                            required
                        >
                    </div>

                    <!-- Danh mục -->
                    <div class="mb-4">
                        <label for="category_id" class="form-label">
                            Danh mục *
                        </label>

                        <select
                            id="category_id"
                            name="category_id"
                            class="form-select"
                            required
                        >
                            <option value="">-- Chọn danh mục --</option>

                            @foreach ($categories as $category)
                                <option
                                    value="{{ $category->id }}"
                                    @selected(old('category_id') == $category->id)
                                >
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Mô tả ngắn -->
                    <div class="mb-4">
                        <label for="excerpt" class="form-label">
                            Mô tả ngắn
                        </label>

                        <textarea
                            id="excerpt"
                            name="excerpt"
                            class="form-control"
                            rows="3"
                            placeholder="Giới thiệu ngắn về bài viết"
                        >{{ old('excerpt') }}</textarea>
                    </div>

                    <!-- Nội dung -->
                    <div class="mb-4">
                        <label for="content" class="form-label">
                            Nội dung bài viết *
                        </label>

                        <textarea
                            id="content"
                            name="content"
                            class="form-control"
                            rows="12"
                            placeholder="Nhập nội dung bài viết..."
                            required
                        >{{ old('content') }}</textarea>
                    </div>

                    <!-- Ảnh đại diện -->
                    <div class="mb-4">
                        <label for="thumbnail" class="form-label">
                            Ảnh đại diện
                        </label>

                        <input
                            type="file"
                            id="thumbnail"
                            name="thumbnail"
                            class="form-control"
                            accept="image/jpeg,image/png,image/webp"
                        >

                        <div class="form-text">
                            Chọn ảnh JPG, PNG hoặc WEBP, tối đa 2 MB.
                        </div>
                    </div>

                    <!-- Trạng thái -->
                    <div class="mb-4">
                        <label for="status" class="form-label">
                            Trạng thái *
                        </label>

                        <select
                            id="status"
                            name="status"
                            class="form-select"
                            required
                        >
                            <option
                                value="draft"
                                @selected(old('status', 'draft') === 'draft')
                            >
                                Bản nháp
                            </option>

                            <option
                                value="published"
                                @selected(old('status') === 'published')
                            >
                                Xuất bản
                            </option>
                        </select>
                    </div>

                    <!-- Nút thao tác -->
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            Lưu bài viết
                        </button>

                        <a href="{{ route('admin.posts.index') }}"
                           class="btn btn-cancel">
                            Hủy
                        </a>
                    </div>

                </form>
            </div>
        </section>

    </main>

</body>
</html>
