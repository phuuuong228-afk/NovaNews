<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lý thống kê | NovaNews</title>

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

        /* Nút bấm giống trang quản lý danh mục */
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

        /* Nội dung chính */
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

        /* Các thẻ thống kê */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
            margin-bottom: 26px;
        }

        .stat-card {
            position: relative;
            overflow: hidden;
            background: #fff;
            border: 1px solid #edf0f4;
            border-radius: 14px;
            padding: 24px;
            box-shadow: 0 5px 18px rgba(33, 37, 41, 0.06);
        }

        .stat-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: #0d6efd;
        }

        .stat-card.green::before {
            background: #198754;
        }

        .stat-card.orange::before {
            background: #fd7e14;
        }

        .stat-card.purple::before {
            background: #6f42c1;
        }

        .stat-card.teal::before {
            background: #20c997;
        }

        .stat-card.red::before {
            background: #dc3545;
        }

        .stat-label {
            margin-bottom: 12px;
            color: #6c757d;
            font-size: 15px;
            font-weight: 600;
        }

        .stat-value {
            margin: 0;
            color: #212529;
            font-size: 32px;
            font-weight: 700;
            overflow-wrap: anywhere;
        }

        .stat-note {
            margin-top: 8px;
            color: #6c757d;
            font-size: 13px;
        }

        /* Khung nội dung */
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

        .charts-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .chart-title {
            margin: 0 0 16px;
            font-size: 18px;
            color: #212529;
        }

        .chart-box {
            min-width: 0;
            height: 330px;
            position: relative;
        }

        /* Bảng bài viết */
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

        .post-title {
            color: #212529;
            font-weight: 700;
        }

        .muted {
            color: #6c757d;
        }

        .status-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status-published {
            color: #0f5132;
            background: #d1e7dd;
        }

        .status-draft {
            color: #664d03;
            background: #fff3cd;
        }

        .status-other {
            color: #41464b;
            background: #e2e3e5;
        }

        .empty-message {
            padding: 24px;
            color: #6c757d;
            text-align: center;
        }

        .page-footer {
            padding: 8px 0 20px;
            color: #6c757d;
            text-align: center;
            font-size: 13px;
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

            .stats-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .charts-grid {
                grid-template-columns: 1fr;
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
                width: 100%;
                flex-wrap: wrap;
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

            .stats-grid {
                grid-template-columns: 1fr;
                gap: 14px;
            }

            .stat-card {
                padding: 20px;
            }

            .stat-value {
                font-size: 28px;
            }

            .panel {
                padding: 16px;
                border-radius: 10px;
            }

            .panel h2 {
                font-size: 21px;
            }

            .chart-box {
                height: 280px;
            }

            th,
            td {
                padding: 12px 10px;
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
                   href="{{ route('admin.categories.index') }}">
                    Quản lý danh mục
                </a>

                <a class="btn btn-outline"
                   href="{{ route('home') }}">
                    Trang chủ
                </a>
            </div>
        </div>
    </header>

    <main class="container">

        <!-- Tiêu đề trang -->
        <section class="page-heading">
            <div>
                <h1>Quản lý thống kê</h1>
                <p>
                    Theo dõi tình hình hoạt động, nội dung và lượt xem
                    của hệ thống NovaNews.
                </p>
            </div>

            <div class="heading-actions">
                <a class="btn"
                   href="{{ route('admin.posts.index') }}">
                    ← Quay lại bài viết
                </a>
            </div>
        </section>

        <!-- Sáu thẻ thống kê -->
        <section class="stats-grid">

            <div class="stat-card">
                <div class="stat-label">Tổng số bài viết</div>
                <p class="stat-value">
                    {{ number_format($totalPosts) }}
                </p>
                <div class="stat-note">Tất cả bài viết trong hệ thống</div>
            </div>

            <div class="stat-card green">
                <div class="stat-label">Bài viết đã xuất bản</div>
                <p class="stat-value">
                    {{ number_format($publishedPosts) }}
                </p>
                <div class="stat-note">Bài viết có trạng thái published</div>
            </div>

            <div class="stat-card orange">
                <div class="stat-label">Bài viết bản nháp</div>
                <p class="stat-value">
                    {{ number_format($draftPosts) }}
                </p>
                <div class="stat-note">Bài viết có trạng thái draft</div>
            </div>

            <div class="stat-card purple">
                <div class="stat-label">Tổng số danh mục</div>
                <p class="stat-value">
                    {{ number_format($totalCategories) }}
                </p>
                <div class="stat-note">Các chủ đề trên NovaNews</div>
            </div>

            <div class="stat-card teal">
                <div class="stat-label">Tổng số người dùng</div>
                <p class="stat-value">
                    {{ number_format($totalUsers) }}
                </p>
                <div class="stat-note">Tài khoản trong hệ thống</div>
            </div>

            <div class="stat-card red">
                <div class="stat-label">Tổng lượt xem</div>
                <p class="stat-value">
                    {{ number_format($totalViews) }}
                </p>
                <div class="stat-note">Tổng lượt xem của tất cả bài viết</div>
            </div>

        </section>

        <!-- Biểu đồ thống kê -->
        <section class="panel">
            <h2>Biểu đồ thống kê</h2>
            <p class="panel-description">
                Theo dõi số bài viết được xuất bản theo tháng và phân bố
                bài viết theo trạng thái.
            </p>

            <div class="charts-grid">
                <div>
                    <h3 class="chart-title">Bài viết xuất bản theo tháng</h3>
                    <div class="chart-box">
                        <canvas id="monthlyPostsChart"></canvas>
                    </div>
                </div>

                <div>
                    <h3 class="chart-title">Bài viết theo trạng thái</h3>
                    <div class="chart-box">
                        <canvas id="postsStatusChart"></canvas>
                    </div>
                </div>
            </div>
        </section>

        <!-- Top 5 bài viết -->
        <section class="panel">
            <h2>Top 5 bài viết có lượt xem cao nhất</h2>
            <p class="panel-description">
                Danh sách những bài viết thu hút nhiều lượt xem nhất.
            </p>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Thứ hạng</th>
                            <th>Tiêu đề bài viết</th>
                            <th>Trạng thái</th>
                            <th>Lượt xem</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($topPosts as $index => $post)
                            <tr>
                                <td>{{ $index + 1 }}</td>

                                <td>
                                    <div class="post-title">
                                        {{ $post->title }}
                                    </div>
                                </td>

                                <td>
                                    @if ($post->status === 'published')
                                        <span class="status-badge status-published">
                                            Đã xuất bản
                                        </span>
                                    @elseif ($post->status === 'draft')
                                        <span class="status-badge status-draft">
                                            Bản nháp
                                        </span>
                                    @else
                                        <span class="status-badge status-other">
                                            {{ $post->status ?: 'Chưa xác định' }}
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    <strong>{{ number_format($post->views ?? 0) }}</strong>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="empty-message">
                                    Chưa có bài viết nào để thống kê.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

        <div class="page-footer">
            NovaNews &copy; {{ date('Y') }} — Trang quản lý thống kê
        </div>

    </main>

    <!-- Thư viện biểu đồ -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const monthlyLabels = {{ Illuminate\Support\Js::from($monthlyLabels) }};
            const monthlyValues = {{ Illuminate\Support\Js::from($monthlyValues) }};
            const statusLabels = {{ Illuminate\Support\Js::from($statusLabels) }};
            const statusValues = {{ Illuminate\Support\Js::from($statusValues) }};

            // Biểu đồ bài viết xuất bản theo tháng
            const monthlyCanvas = document.getElementById('monthlyPostsChart');

            if (monthlyCanvas) {
                new Chart(monthlyCanvas, {
                    type: 'bar',
                    data: {
                        labels: monthlyLabels,
                        datasets: [{
                            label: 'Số bài viết',
                            data: monthlyValues,
                            backgroundColor: 'rgba(13, 110, 253, 0.75)',
                            borderColor: '#0d6efd',
                            borderWidth: 1,
                            borderRadius: 6
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    precision: 0
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: true,
                                position: 'bottom'
                            }
                        }
                    }
                });
            }

            // Biểu đồ phân bố bài viết theo trạng thái
            const statusCanvas = document.getElementById('postsStatusChart');

            if (statusCanvas) {
                const statusNames = statusLabels.map(function (status) {
                    if (status === 'published') {
                        return 'Đã xuất bản';
                    }

                    if (status === 'draft') {
                        return 'Bản nháp';
                    }

                    return status || 'Chưa xác định';
                });

                new Chart(statusCanvas, {
                    type: 'doughnut',
                    data: {
                        labels: statusNames,
                        datasets: [{
                            label: 'Số bài viết',
                            data: statusValues,
                            backgroundColor: [
                                '#198754',
                                '#fd7e14',
                                '#0d6efd',
                                '#6f42c1',
                                '#20c997',
                                '#dc3545'
                            ],
                            borderWidth: 2,
                            borderColor: '#ffffff'
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: true,
                                position: 'bottom'
                            }
                        }
                    }
                });
            }
        });
    </script>

</body>
</html>