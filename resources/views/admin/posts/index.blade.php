<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tin tức - NovaNews</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
            font-family: Arial, sans-serif;
            color: #202938;
        }

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
}

        .navbar-brand {
    color: #4d83ff;
    font-weight: bold;
    font-size: 25px;
    margin: 0;
}

        .content {
            padding: 35px 0;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 3px 15px rgba(0, 0, 0, .06);
        }

        .table th {
            background: #f0f3f8;
            white-space: nowrap;
        }

        .filter-title {
            font-weight: bold;
            margin-bottom: 16px;
        }

        .post-title {
            font-weight: bold;
            min-width: 220px;
        }

        .table td {
            vertical-align: middle;
        }

        .pagination {
            margin-bottom: 0;
        }

        @media (max-width: 768px) {
            .content {
                padding: 20px 0;
            }

            .page-heading {
                flex-direction: column;
                align-items: flex-start !important;
                gap: 16px;
            }
        }
    </style>
</head>

<body>

<nav class="navbar navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">NovaNews</a>

        <a href="{{ route('home') }}" class="btn btn-outline-light">
            Trang chủ
        </a>
    </div>
</nav>

<main class="container content">

    <div class="d-flex justify-content-between align-items-center mb-4 page-heading">
        <div>
            <h2 class="fw-bold">Quản lý tin tức</h2>
            <p class="text-secondary mb-0">
                Quản lý bài viết, chuyên mục và trạng thái xuất bản của NovaNews
            </p>
        </div>

        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
    + Thêm bài viết
</a>

<a href="{{ route('admin.statistics.index') }}"
   class="btn btn-outline-primary">
    Quản lý thống kê
</a>

<a href="{{ route('admin.categories.index') }}"
   class="btn btn-outline-primary">
    Quản lý danh mục
</a>

</div>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
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

    <div class="card mb-4">
        <div class="card-body p-4">
            <h5 class="filter-title">Tìm kiếm và lọc tin tức</h5>

            <form method="GET" action="{{ route('admin.posts.index') }}">
                <div class="row g-3">

                    <div class="col-lg-5 col-md-6">
                        <label for="keyword" class="form-label">Từ khóa</label>
                        <input
                            type="text"
                            id="keyword"
                            name="keyword"
                            class="form-control"
                            placeholder="Nhập tiêu đề, mô tả hoặc nội dung..."
                            value="{{ request('keyword') }}"
                        >
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <label for="category_id" class="form-label">Chuyên mục</label>
                        <select
                            name="category_id"
                            id="category_id"
                            class="form-select"
                        >
                            <option value="">Tất cả chuyên mục</option>

                            @foreach ($categories as $category)
                                <option
                                    value="{{ $category->id }}"
                                    @selected((string) request('category_id') === (string) $category->id)
                                >
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-2 col-md-6">
                        <label for="status" class="form-label">Trạng thái</label>
                        <select name="status" id="status" class="form-select">
                            <option value="">Tất cả trạng thái</option>
                            <option value="draft" @selected(request('status') === 'draft')>
                                Bản nháp
                            </option>
                            <option value="published" @selected(request('status') === 'published')>
                                Đã xuất bản
                            </option>
                        </select>
                    </div>

                    <div class="col-lg-2 col-md-6 d-flex align-items-end gap-2">
                        <button type="submit" class="btn btn-dark flex-grow-1">
                            Tìm kiếm
                        </button>
                    </div>

                    <div class="col-12">
                        <a
                            href="{{ route('admin.posts.index') }}"
                            class="btn btn-outline-secondary btn-sm"
                        >
                            Xóa bộ lọc
                        </a>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body p-3 p-md-4">

            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                <h5 class="fw-bold mb-0">Danh sách bài viết</h5>
                <span class="text-secondary small">
                    {{ $posts->total() }} bài viết
                </span>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tiêu đề</th>
                            <th>Chuyên mục</th>
                            <th>Tác giả</th>
                            <th>Trạng thái</th>
                            <th>Lượt xem</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>

                                <td>
                                    <div class="post-title">
                                        {{ $post->title }}
                                    </div>
                                    <div class="small text-secondary">
                                        {{ $post->slug }}
                                    </div>
                                </td>

                                <td>
                                    {{ $post->category?->name ?? 'Chưa phân loại' }}
                                </td>

                                <td>
                                    {{ $post->user?->name ?? 'Không xác định' }}
                                </td>

                                <td>
                                    @if ($post->status === 'published')
                                        <span class="badge bg-success">Đã xuất bản</span>
                                    @else
                                        <span class="badge bg-secondary">Bản nháp</span>
                                    @endif
                                </td>

                                <td>{{ $post->views ?? 0 }}</td>

                                <td>
                                    <div class="d-flex gap-2">
                                        <a
                                            href="{{ route('admin.posts.show', $post->id) }}"
                                            class="btn btn-sm btn-outline-info"
                                        >
                                            Xem
                                        </a>

                                        <a
                                            href="{{ route('admin.posts.edit', $post->id) }}"
                                            class="btn btn-sm btn-outline-primary"
                                        >
                                            Sửa
                                        </a>

                                        <form
                                            method="POST"
                                            action="{{ route('admin.posts.destroy', $post->id) }}"
                                            onsubmit="return confirm('Bà có chắc muốn xóa bài viết này không?')"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-outline-danger"
                                            >
                                                Xóa
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5">
                                    <p class="mb-2">Không tìm thấy bài viết phù hợp.</p>
                                    <a href="{{ route('admin.posts.index') }}">
                                        Xóa bộ lọc và xem lại danh sách
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $posts->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
