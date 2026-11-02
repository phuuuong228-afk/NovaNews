
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} - NovaNews</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #111;
            color: #f5f5f5;
            font-family: Arial, sans-serif;
        }
        .navbar, footer {
            background: #202020;
        }
        .article {
            max-width: 900px;
            margin: auto;
        }
        .article-image {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
            border-radius: 10px;
            margin: 25px 0;
        }
        .category {
            color: #79aaff;
            margin-bottom: 12px;
        }
        .article-content {
            font-size: 1.05rem;
            line-height: 1.9;
            overflow-wrap: anywhere;
            white-space: normal;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark">
        <div class="container py-2">
            <a class="navbar-brand fw-bold text-primary" href="{{ route('home') }}">NovaNews</a>
            <a href="{{ route('home') }}" class="btn btn-outline-primary btn-sm">Trang chủ</a>
        </div>
    </nav>

    <main class="container py-5">
        <article class="article">
            <a href="{{ route('home') }}" class="text-primary text-decoration-none">
                &larr; Quay lại trang chủ
            </a>

            <header class="mt-4">
                <div class="category">
                    {{ $post->category->name ?? 'Chưa phân loại' }}
                </div>

                <h1 class="fw-bold mb-3">{{ $post->title }}</h1>

                

                <p class="text-secondary">
                    Tác giả: {{ $post->user->name ?? 'NovaNews' }}
                    |
                    Ngày đăng: {{ $post->published_at?->format('d/m/Y') ?? '' }}
                </p>
                <div class="post-views">
                    <span>👁</span>
                    <span>{{ number_format($post->views ?? 0) }} lượt xem</span>
                </div>
            </header>

            @if ($post->thumbnail)
                <img
                    src="{{ asset('storage/' . $post->thumbnail) }}"
                    alt="{{ $post->title }}"
                    class="article-image"
                    loading="eager"
                >
            @endif

            @if ($post->excerpt)
                <p class="lead text-secondary mt-4">{{ $post->excerpt }}</p>
            @endif

            <div class="article-content mt-4">
                {!! nl2br(e($post->content)) !!}
            </div>

            <hr class="border-secondary my-5">

            <a href="{{ route('home') }}" class="btn btn-outline-primary">
                &larr; Quay lại danh sách bài viết
            </a>
        </article>
        <section id="comments" class="comments-section mt-5 p-4">
    <h3 class="mb-4">Bình luận bài viết</h3>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif

<form action="{{ route('comments.store', $post->id) }}"
      method="POST"
      class="mb-4">
    @csrf

    <div class="mb-3">
        <label for="content" class="form-label">
            Nội dung bình luận
        </label>

        <textarea
            name="content"
            id="content"
            class="form-control"
            rows="4"
            maxlength="2000"
            placeholder="Chia sẻ suy nghĩ của bạn..."
            required>{{ old('content') }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">
        Gửi bình luận
    </button>
</form>

{{-- Danh sách bình luận đã duyệt --}}
<div class="comment-list">
    @forelse ($post->comments as $comment)
        <div class="border rounded p-3 mb-3">
            <div class="d-flex justify-content-between mb-2">
                <strong>
                    {{ $comment->user?->name ?? 'Độc giả' }}
                </strong>

                <small class="text-muted">
                    {{ $comment->created_at?->format('d/m/Y H:i') }}
                </small>
            </div>

            <p class="mb-0" style="white-space: pre-line;">{{ $comment->content }}</p>
            
@if (auth()->check() &&
    (auth()->user()->role === 'admin' ||
     (int) auth()->id() === (int) $comment->user_id))

    <div class="mt-3 d-flex gap-2">
        <a href="{{ route('comments.edit', $comment->id) }}"
           class="btn btn-sm btn-outline-primary">
            Sửa
        </a>

        <form action="{{ route('comments.destroy', $comment->id) }}"
              method="POST"
              onsubmit="return confirm('Bà có chắc muốn xóa bình luận này không?')">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-sm btn-outline-danger">
                Xóa
            </button>
        </form>
    </div>

@endif

        </div>
    @empty
        <p>Chưa có bình luận nào. Hãy là người đầu tiên chia sẻ ý kiến!</p>
    @endforelse
</div>

</section>
    </main>

    <footer class="text-center py-4 mt-4">
        <p class="mb-0">&copy; 2026 NovaNews &amp; Tạp chí điện tử</p>
    </footer>
</body>
</html>
