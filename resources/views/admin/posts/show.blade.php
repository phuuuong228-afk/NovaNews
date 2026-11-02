
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $post->title }} - NovaNews</title>
    <meta name="description" content="{{ $post->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($post->content), 155) }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --bg: #101114;
            --surface: #191a1f;
            --border: #30323a;
            --text: #f5f6fa;
            --muted: #a7adbb;
            --blue: #4385ff;
        }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: Arial, sans-serif;
        }

        a {
            text-decoration: none;
        }

        .navbar, footer {
            background: #17181c;
            border-bottom: 1px solid var(--border);
        }

        .navbar-brand {
            color: var(--blue) !important;
            font-size: 26px;
            font-weight: 800;
        }

        .article {
            max-width: 900px;
            margin: 0 auto;
        }

        .breadcrumb-link {
            color: #9ebeff;
            font-size: 14px;
        }

        .category-label {
            display: inline-block;
            color: #80adff;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 14px;
        }

        .article-title {
            font-size: clamp(30px, 4vw, 46px);
            line-height: 1.25;
            font-weight: 800;
            overflow-wrap: anywhere;
        }

        .article-meta {
            color: var(--muted);
            font-size: 14px;
        }

        .article-image {
            display: block;
            width: 100%;
            max-height: 520px;
            object-fit: cover;
            border-radius: 12px;
            border: 1px solid var(--border);
        }

        .article-excerpt {
            color: #d0d5df;
            font-size: 19px;
            line-height: 1.8;
            border-left: 4px solid var(--blue);
            padding-left: 18px;
        }

        .article-content {
            color: #e0e2e8;
            font-size: 17px;
            line-height: 1.95;
            overflow-wrap: anywhere;
            white-space: normal;
        }

        .article-content p {
            margin-bottom: 1.3rem;
        }

        .article-footer {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 20px;
        }

        .related-card {
            height: 100%;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 10px;
            overflow: hidden;
            transition: border-color .2s ease, transform .2s ease;
        }

        .related-card:hover {
            transform: translateY(-3px);
            border-color: var(--blue);
        }

        .related-image {
            width: 100%;
            height: 160px;
            object-fit: cover;
        }

        .related-title {
            color: var(--text);
            font-size: 16px;
            font-weight: bold;
            line-height: 1.5;
        }

        .related-title:hover {
            color: #80adff;
        }

        .section-heading {
            font-size: 23px;
            font-weight: bold;
        }

        .section-heading::before {
            content: "";
            display: inline-block;
            width: 5px;
            height: 23px;
            margin-right: 10px;
            vertical-align: -4px;
            border-radius: 3px;
            background: var(--blue);
        }

        footer {
            color: var(--muted);
            border-top: 1px solid var(--border);
            border-bottom: 0;
        }

        @media (max-width: 576px) {
            .article-title {
                font-size: 29px;
            }

            .article-content {
                font-size: 16px;
            }

            .article-excerpt {
                font-size: 17px;
            }
        }
        .comments-section {
    color: var(--text);
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 10px;
}

.comments-section .form-label {
    color: var(--text);
}

.comments-section .form-control {
    background: #24252b;
    color: var(--text);
    border-color: var(--border);
}

.comments-section .form-control::placeholder {
    color: var(--muted);
}

.comment-list .border {
    border-color: var(--border) !important;
}
    </style>
</head>

<body>

<nav class="navbar navbar-dark">
    <div class="container py-2">
        <a class="navbar-brand" href="{{ route('home') }}">NovaNews.</a>

        <a href="{{ route('home') }}" class="btn btn-outline-light btn-sm">
            Trang chủ
        </a>
    </div>
</nav>

<main class="container py-4 py-md-5">

    <article class="article">

        <div class="mb-4">
            <a href="{{ route('home') }}" class="breadcrumb-link">
                ← Quay lại trang tin tức
            </a>
        </div>

        <header class="mb-4">
            <div class="category-label">
                {{ $post->category?->name ?? 'Tin tức tổng hợp' }}
            </div>

            <h1 class="article-title mb-4">
                {{ $post->title }}
            </h1>

            <div class="article-meta d-flex flex-wrap gap-2">
                <span>
                    Tác giả: {{ $post->user?->name ?? 'Ban biên tập NovaNews' }}
                </span>

                <span>·</span>

                <span>
                    {{ $post->published_at?->format('d/m/Y') ?? 'Chưa có ngày đăng' }}
                </span>

                <span>·</span>

                <span>{{ $post->views ?? 0 }} lượt xem</span>
            </div>
        </header>
               
        @if ($post->thumbnail)
            @php
                $thumbnailPath = $post->thumbnail;
                $thumbnailUrl = str_starts_with($thumbnailPath, 'posts/')
                    ? asset('storage/' . $thumbnailPath)
                    : asset('images/' . basename($thumbnailPath));
            @endphp

            <img src="{{ $thumbnailUrl }}"
                alt="{{ $post->title }}"
                class="article-image mb-4">
        @endif




        <div class="article-content">
            {!! nl2br(e($post->content)) !!}
        </div>

        <div class="article-footer mt-5">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div>
                    <div class="fw-bold">Bạn đang đọc NovaNews</div>
                    <div class="small text-secondary mt-1">
                        Tin tức tổng hợp · Công nghệ · Du lịch · Đời sống
                    </div>
                </div>

                <button
                    type="button"
                    class="btn btn-outline-primary btn-sm"
                    onclick="shareArticle()"
                >
                    Chia sẻ bài viết
                </button>
            </div>
        </div>

    </article>
{{-- Khu vực bình luận --}}
<section class="comments-section mt-5 p-4"
         id="comments"
             <h3 class="mb-4">Bình luận bài viết</h3>

    {{-- Thông báo --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Lỗi nhập liệu --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    {{-- Form gửi bình luận --}}
    <form action="{{ route('comments.store', $post->id) }}"
          method="POST"
          class="mb-5">
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
       @forelse ($post->comments->where('status', 'approved') as $comment)
            <div class="border rounded p-3 mb-3">
                <div class="d-flex justify-content-between mb-2">
                    <strong>
                        {{ $comment->user?->name ?? 'Độc giả' }}
                    </strong>

                    <small class="text-muted">
                        {{ $comment->created_at->format('d/m/Y H:i') }}
                    </small>
                </div>

                <p class="mb-0" style="white-space: pre-line;">{{ $comment->content }}</p>
            </div>
        @empty
            <p class="text-muted">
                Chưa có bình luận nào được duyệt. Hãy là người đầu tiên chia sẻ ý kiến!
            </p>
        @endforelse
    </div>
</section>

    @if (isset($relatedPosts) && $relatedPosts->isNotEmpty())
        <section class="mt-5">
            <h2 class="section-heading mb-4">Bài viết liên quan</h2>

            <div class="row g-4">
                @foreach ($relatedPosts as $relatedPost)
                    <div class="col-12 col-md-6 col-lg-4">
                        <article class="related-card">
                            <a href="{{ route('posts.show', $relatedPost->id) }}">
                                

                @if ($relatedPost->thumbnail)
                    <img
                        src="{{ asset('images/' . basename($relatedPost->thumbnail)) }}"
                        alt="{{ $relatedPost->title }}"
                        class="related-image"
                        loading="lazy"
                    >
                @endif


                            </a>

                            <div class="p-3">
                                <div class="category-label">
                                    {{ $relatedPost->category?->name ?? 'Tin tức' }}
                                </div>

                                <a
                                    href="{{ route('posts.show', $relatedPost->id) }}"
                                    class="related-title d-block"
                                >
                                    {{ $relatedPost->title }}
                                </a>

                                <div class="article-meta mt-2">
                                    {{ $relatedPost->published_at?->format('d/m/Y') ?? '' }}
                                </div>
                            </div>
                        </article>
                                           </div>
                @endforeach
            </div>
        </section>
    @endif

    <div class="text-center mt-5">
        <a href="{{ route('home') }}" class="btn btn-primary px-4">
            Khám phá thêm tin tức
        </a>
    </div>

</main>

<footer class="text-center py-4 mt-4">
    <div class="container">
        <p class="mb-1">&copy; {{ date('Y') }} NovaNews</p>
        <small>Website tin tức tổng hợp</small>
    </div>
</footer>

<script>
    function shareArticle() {
        const articleData = {
            title: document.title,
            url: window.location.href
        };

        if (navigator.share) {
            navigator.share(articleData).catch(() => {});
        } else if (navigator.clipboard) {
            navigator.clipboard.writeText(articleData.url)
                .then(() => alert('Đã sao chép liên kết bài viết!'))
                .catch(() => prompt('Sao chép liên kết bài viết:', articleData.url));
        } else {
            prompt('Sao chép liên kết bài viết:', articleData.url);
        }
    }
</script>

</body>
</html>
