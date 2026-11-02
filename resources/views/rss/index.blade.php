
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tin tổng hợp khác - NovaNews</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            color: #212529;
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

        .home-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 42px;
            padding: 9px 15px;
            border: 1px solid #dee2e6;
            border-radius: 7px;
            color: #fff;
            background: transparent;
            font-size: 15px;
            text-decoration: none;
        }

        .home-btn:hover {
            color: #fff;
            background: #343a40;
        }

        /* Nội dung chính */
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

        /* Tìm kiếm */
        .search-panel {
            margin-bottom: 24px;
            padding: 22px;
            border: 0;
            border-radius: 12px;
            background: #fff;
            box-shadow: 0 3px 15px rgba(0, 0, 0, .06);
        }

        .search-panel .form-control {
            min-height: 42px;
            padding: 10px 14px;
            border-color: #ced4da;
            border-radius: 7px;
            font-size: 15px;
        }

        .search-panel .form-control:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 .2rem rgba(13, 110, 253, .12);
        }

        .search-panel .btn {
            min-height: 42px;
            padding: 9px 18px;
            border-radius: 7px;
            font-size: 14px;
        }

        /* Thẻ tin */
        .article-card {
            height: 100%;
            border: 0;
            border-radius: 12px;
            background: #fff;
            box-shadow: 0 3px 15px rgba(0, 0, 0, .06);
            transition: box-shadow .2s ease;
        }

        .article-card:hover {
            box-shadow: 0 6px 20px rgba(0, 0, 0, .09);
        }

        .article-card .card-body {
            padding: 24px;
        }

        .source-badge {
            display: inline-block;
            max-width: 100%;
            padding: 6px 10px;
            border-radius: 6px;
            background: #e7f0ff;
            color: #0d6efd;
            font-size: 13px;
            font-weight: 700;
            overflow-wrap: anywhere;
        }

        .article-date {
            color: #6c757d;
            font-size: 13px;
        }

        .article-title {
            margin: 12px 0;
            color: #212529;
            font-size: 20px;
            font-weight: 700;
            line-height: 1.5;
            overflow-wrap: anywhere;
        }

        .article-description {
            margin-bottom: 18px;
            color: #6c757d;
            font-size: 15px;
            line-height: 1.7;
            overflow-wrap: anywhere;
        }

        .read-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 38px;
            padding: 8px 14px;
            border: 1px solid #0d6efd;
            border-radius: 7px;
            color: #0d6efd;
            background: #fff;
            font-size: 14px;
            text-decoration: none;
        }

        .read-btn:hover {
            color: #fff;
            background: #0d6efd;
        }

        .empty-alert {
            padding: 18px 20px;
            border-radius: 10px;
            line-height: 1.6;
        }

        /* Phân trang */
        .pagination-area {
            margin-top: 24px;
        }

        .pagination-area nav p {
            margin-bottom: 0;
        }

        .pagination-area nav a,
        .pagination-area nav span {
            font-size: 14px;
        }

        .pagination-area svg {
            width: 18px;
            height: 18px;
        }

        @media (max-width: 768px) {
            .page-content {
                padding-top: 24px;
            }

            .page-heading h1 {
                font-size: 27px;
            }

            .search-panel {
                padding: 16px;
            }

            .article-card .card-body {
                padding: 18px;
            }

            .article-title {
                font-size: 18px;
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

            <a class="home-btn" href="{{ route('home') }}">
                Trang chủ
            </a>
        </div>
    </nav>

    <main class="container page-content">

        <!-- Tiêu đề trang -->
        <section class="page-heading">
            <h1 class="fw-bold">Tin tổng hợp khác</h1>

            <p>
                Tổng hợp tin từ các nguồn bên ngoài. Nhấn đọc bài gốc
                để xem nội dung đầy đủ trên trang báo.
            </p>
        </section>

        <!-- Tìm kiếm tin RSS -->
        <section class="search-panel">
            <form method="GET" action="{{ route('rss.index') }}">
                <div class="input-group">
                    <input
                        type="search"
                        name="q"
                        class="form-control"
                        placeholder="Tìm theo tiêu đề hoặc nguồn tin..."
                        value="{{ $keyword }}"
                        aria-label="Tìm theo tiêu đề hoặc nguồn tin"
                    >

                    <button class="btn btn-primary" type="submit">
                        Tìm kiếm
                    </button>
                </div>
            </form>
        </section>

        <!-- Danh sách tin tổng hợp -->
        @if ($articles->isEmpty())

            <div class="alert alert-info empty-alert">
                Chưa có tin RSS để hiển thị. Nguồn tin có thể đang tạm thời
                không phản hồi hoặc không có kết quả phù hợp.
            </div>

        @else

            <div class="row g-4">
                @foreach ($articles as $article)
                    <div class="col-12">
                        <article class="card article-card">
                            <div class="card-body">

                                <div class="d-flex flex-wrap gap-2 align-items-center mb-2">
                                    <span class="source-badge">
                                        {{ $article['source'] }}
                                    </span>

                                    @if ($article['published_at'])
                                        <span class="article-date">
                                            {{ $article['published_at'] }}
                                        </span>
                                    @endif
                                </div>

                                <h2 class="article-title">
                                    {{ $article['title'] }}
                                </h2>

                                @if ($article['description'])
                                    <p class="article-description">
                                        {{ $article['description'] }}
                                    </p>
                                @endif

                                @if (
                                    filter_var($article['link'], FILTER_VALIDATE_URL)
                                    && in_array(
                                        parse_url($article['link'], PHP_URL_SCHEME),
                                        ['https', 'http'],
                                        true
                                    )
                                )
                                    <a
                                        href="{{ $article['link'] }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="read-btn"
                                    >
                                        Đọc bài gốc
                                    </a>
                                @endif

                            </div>
                        </article>
                    </div>
                @endforeach
            </div>

            <!-- Phân trang -->
            <div class="pagination-area">
                {{ $articles->links() }}
            </div>

        @endif

    </main>

</body>
</html>
