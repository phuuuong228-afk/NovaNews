
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa bài viết - NovaNews</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            background: #212121;
            color: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background: #111;
            border-bottom: 1px solid #333;
        }

        .brand {
            color: #4385ff;
            font-size: 25px;
            font-weight: bold;
            text-decoration: none;
        }

        .form-card {
            background: #111;
            border: 1px solid #303030;
            border-radius: 12px;
            padding: 28px;
        }

        .form-label {
            font-weight: 600;
            color: #f5f5f5;
        }

        .form-control,
        .form-select {
            background-color: #171717;
            color: #f5f5f5;
            border-color: #444;
        }

        .form-control:focus,
        .form-select:focus {
            background-color: #171717;
            color: #fff;
            border-color: #4385ff;
            box-shadow: 0 0 0 .2rem #4385ff30;
        }

        .form-control::placeholder {
            color: #999;
        }

        .form-select option {
            background: #171717;
            color: #fff;
        }

        .form-text {
            color: #aaa;
        }

        .btn-primary {
            background: #1769ff;
            border-color: #1769ff;
        }

        .current-image {
            max-width: 220px;
            max-height: 160px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #444;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-dark">
    <div class="container">
        <a href="{{ route('admin.posts.index') }}" class="brand">
            NovaNews
        </a>

        <a href="{{ route('admin.posts.index') }}"
           class="btn btn-outline-light btn-sm">
            Quay lại danh sách
        </a>
    </div>
</nav>

<main class="container py-4" style="max-width: 850px">
    <div class="mb-4">
        <h2 class="fw-bold">Sửa bài viết</h2>
        <p class="text-secondary">
            Cập nhật nội dung bài viết trên NovaNews.
        </p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Vui lòng kiểm tra lại thông tin:</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.posts.update', $post->id) }}"
          method="POST"
          enctype="multipart/form-data"
          class="form-card">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">
                Tiêu đề bài viết *
            </label>

            <input type="text"
                   id="title"
                   name="title"
                   class="form-control"
                   value="{{ old('title', $post->title) }}"
                   placeholder="Nhập tiêu đề bài viết"
                   required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">
                Danh mục *
            </label>

            <select id="category_id"
                    name="category_id"
                    class="form-select"
                    required>
                <option value="">-- Chọn danh mục --</option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ (string) old('category_id', $post->category_id) === (string) $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="excerpt" class="form-label">
                Mô tả ngắn
            </label>

            <textarea id="excerpt"
                      name="excerpt"
                      class="form-control"
                      rows="3"
                      placeholder="Giới thiệu ngắn về bài viết">{{ old('excerpt', $post->excerpt) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">
                Nội dung bài viết *
            </label>

            <textarea id="content"
                      name="content"
                      class="form-control"
                      rows="10"
                      placeholder="Nhập nội dung bài viết..."
                      required>{{ old('content', $post->content) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="thumbnail" class="form-label">
                Ảnh đại diện
            </label>

            @if ($post->thumbnail)
                <div class="mb-3">
                    <p class="form-text">Ảnh hiện tại:</p>
                    <img
                        src="{{ asset('storage/' . $post->thumbnail) }}"
                        alt="Ảnh đại diện bài viết"
                        class="current-image">
                </div>
            @endif

            <input type="file"
                   id="thumbnail"
                   name="thumbnail"
                   class="form-control"
                   accept=".jpg,.jpeg,.png,.webp">

            <div class="form-text">
                Chọn ảnh mới nếu muốn thay ảnh hiện tại. Tối đa 2 MB.
            </div>
        </div>

        <div class="mb-4">
            <label for="status" class="form-label">
                Trạng thái *
            </label>

            <select id="status"
                    name="status"
                    class="form-select"
                    required>
                <option value="draft"
                    {{ old('status', $post->status) === 'draft' ? 'selected' : '' }}>
                    Bản nháp
                </option>

                <option value="published"
                    {{ old('status', $post->status) === 'published' ? 'selected' : '' }}>
                    Xuất bản
                </option>
            </select>
        </div>

        <div class="d-flex flex-wrap gap-2">
            <button type="submit" class="btn btn-primary px-4">
                Lưu thay đổi
            </button>

            <a href="{{ route('admin.posts.index') }}"
               class="btn btn-outline-light">
                Hủy
            </a>
        </div>
    </form>
</main>
</body>
</html>
