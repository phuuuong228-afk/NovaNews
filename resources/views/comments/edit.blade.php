
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sửa bình luận - NovaNews</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body class="bg-dark text-light">
    <div class="container py-5" style="max-width: 800px;">
        <h2 class="mb-4">Chỉnh sửa bình luận</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('comments.update', $comment->id) }}"
              method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="content" class="form-label">
                    Nội dung bình luận
                </label>

                <textarea
                    name="content"
                    id="content"
                    class="form-control"
                    rows="5"
                    maxlength="2000"
                    required>{{ old('content', $comment->content) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">
                Lưu thay đổi
            </button>

            <a href="{{ route('posts.show', $comment->post_id) }}"
               class="btn btn-outline-light ms-2">
                Hủy
            </a>
        </form>
    </div>
</body>
</html>
