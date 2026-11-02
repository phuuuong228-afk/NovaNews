
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NOVANEWS · TẠP CHÍ ĐIỆN TỬ</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --bg: #111111;
            --surface: #1d1d1d;
            --surface-light: #252525;
            --border: #333333;
            --text: #f5f5f5;
            --muted: #aaaaaa;
            --primary: #2869d8;
            --primary-hover: #1d4ed8;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 24px;
        }

        body {
            margin: 0;
            background: var(--bg);
            color: var(--text);
            font-family: Arial, sans-serif;
            overflow-x: hidden;
        }

        /* BANNER CHÍNH */
        .novanews-banner {
            position: relative;
            width: 100%;
            height: clamp(320px, 36vw, 520px);
            overflow: hidden;
            margin: 0;
            border-radius: 0 0 16px 16px;
            background: #222222;
        }

        .novanews-banner-image {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center 55%;
        }

        .novanews-banner-overlay {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            padding: clamp(24px, 5vw, 76px);
            color: #ffffff;
            background: linear-gradient(
                90deg,
                rgba(0, 0, 0, 0.78) 0%,
                rgba(0, 0, 0, 0.48) 42%,
                rgba(0, 0, 0, 0.08) 100%
            );
        }

        .novanews-banner-label {
            margin-bottom: 16px;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 2px;
        }

        .novanews-banner-overlay h1 {
            max-width: 720px;
            margin-bottom: 18px;
            font-family: 'Be Vietnam Pro', Arial, sans-serif;
            font-size: clamp(30px, 4.2vw, 58px);
            font-weight: 700;
            line-height: 1.3;
            letter-spacing: -0.5px;
        }

        .novanews-banner-overlay p {
            max-width: 620px;
            margin-bottom: 26px;
            font-size: clamp(14px, 1.5vw, 18px);
            line-height: 1.7;
        }

        .novanews-banner-button {
            display: inline-block;
            padding: 13px 24px;
            border: 1px solid var(--primary);
            border-radius: 8px;
            background: var(--primary);
            color: #ffffff;
            font-weight: 700;
            text-decoration: none;
            transition: background 0.2s ease, transform 0.2s ease;
        }

        .novanews-banner-button:hover {
            background: var(--primary-hover);
            color: #ffffff;
            transform: translateY(-2px);
        }

        /* THANH ĐIỀU HƯỚNG */
        .navbar {
            background: #202020;
            border-bottom: 1px solid #303030;
            padding-top: 8px;
            padding-bottom: 8px;
        }

        .navbar-brand {
            display: inline-flex;
            align-items: center;
            font-weight: 800;
        }

        .brand-logo {
            display: block;
            width: auto;
            height: 70px;
            max-width: 180px;
            object-fit: contain;
        }

        .navbar .btn {
            white-space: nowrap;
        }

        /* NỘI DUNG CHÍNH */
        .main-content {
            padding-top: 32px;
            padding-bottom: 48px;
        }

        .muted {
            color: var(--muted);
        }

        .section-title {
            padding-left: 12px;
            border-left: 4px solid #5794ff;
        }

        /* TÌM KIẾM VÀ LỌC */
        .search-panel {
            margin-bottom: 36px;
            padding: 24px;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: var(--surface);
        }

        .search-panel-title {
            margin-bottom: 20px;
            font-size: 21px;
            font-weight: 700;
        }

        .form-control,
        .form-select {
            min-height: 44px;
            border-color: #444444;
            background-color: #202020;
            color: #ffffff;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #5794ff;
            background-color: #202020;
            color: #ffffff;
            box-shadow: 0 0 0 0.2rem rgba(87, 148, 255, 0.16);
        }

        .form-control::placeholder {
            color: #999999;
        }

        .form-select option {
            background: #202020;
            color: #ffffff;
        }

        .btn-primary {
            border-color: var(--primary);
            background: var(--primary);
        }

        .btn-primary:hover {
            border-color: var(--primary-hover);
            background: var(--primary-hover);
        }

        /* BÀI VIẾT NỔI BẬT */
        .featured {
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: var(--surface);
        }

        
        
        /* ẢNH BÀI VIẾT NỔI BẬT */
        .featured img {
            display: block;
            width: 100%;
            height: 100%;
            min-height: 280px;
            max-height: 430px;
            object-fit: cover;
            object-position: center;
        }

        /* CĂN ẢNH PHỦ KÍN NỬA BÊN TRÁI */
        .featured .row {
            align-items: stretch;
        }

        .featured img {
            width: 100%;
            height: 100%;
            min-height: 100%;
            max-height: none;
            object-fit: cover;
            object-position: center;
        }

        
        @media (max-width: 767.98px) {
            .featured img {
                height: 260px;
            }
        }


        .featured-placeholder {
            min-height: 280px;
            background: var(--surface-light);
        }

        /* DANH MỤC */
        .category-list {
            display: flex;
            flex-wrap: wrap;
            column-gap: 10px;
            row-gap: 10px;
            align-items: center;
        }

        .category-link {
            display: inline-block;
            padding: 8px 14px;
            border: 1px solid #444444;
            border-radius: 24px;
            color: #dddddd;
            text-decoration: none;
            transition: all 0.2s ease;
            margin: 0;
        }

        .category-link:hover,
        .category-link.active {
            border-color: #5794ff;
            background: #203b63;
            color: #ffffff;
        }

        /* THẺ BÀI VIẾT */
        .post-card {
            display: flex;
            height: 100%;
            flex-direction: column;
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: var(--surface);
            transition: transform 0.2s ease, border-color 0.2s ease;
        }

        .post-card:hover {
            transform: translateY(-4px);
            border-color: #397df5;
        }

        .post-image {
            display: block;
            width: 100%;
            height: 220px;
            object-fit: cover;
            background: var(--surface-light);
        }

        .post-body {
            display: flex;
            flex: 1;
            flex-direction: column;
            padding: 20px;
        }

        .post-body h3 {
            line-height: 1.45;
        }

        .post-body h3 a:hover {
            color: #79aaff !important;
        }

        .post-meta {
            margin-top: auto;
            padding-top: 12px;
        }

        a {
            color: #79aaff;
        }

        /* PHÂN TRANG */
        .pagination-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            overflow-x: auto;
        }

        .pagination-wrapper nav {
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .pagination-wrapper .pagination {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            gap: 6px;
            margin: 0;
            padding: 0;
        }

        .pagination-wrapper .page-item {
            margin: 0;
        }

        .pagination-wrapper .page-link {
            display: flex;
            justify-content: center;
            align-items: center;
            min-width: 40px;
            min-height: 38px;
            padding: 8px 12px;
            border: 1px solid #383838;
            border-radius: 6px;
            background: #202020;
            color: #79aaff;
            text-decoration: none;
            box-shadow: none;
        }

        .pagination-wrapper .page-link:hover {
            background: #303030;
            color: #ffffff;
            border-color: #79aaff;
        }

        .pagination-wrapper .page-item.active .page-link {
            background: #0d6efd;
            border-color: #0d6efd;
            color: #ffffff;
        }

        .pagination-wrapper .page-item.disabled .page-link {
            background: #151515;
            border-color: #383838;
            color: #666666;
        }

        .pagination-wrapper .page-link svg {
            width: 16px;
            height: 16px;
        }

        .pagination-wrapper .page-link:focus {
            box-shadow: none;
            outline: 2px solid #79aaff;
            outline-offset: 2px;
        }

        /* CHÂN TRANG */
        .site-footer {
            margin-top: 24px;
            border-top: 1px solid #383838;
            background: #202020;
        }

        .footer-link {
            color: #aaaaaa;
            text-decoration: none;
        }

        .footer-link:hover {
            color: #79aaff;
        }

        /* FOOTER NOVANEWS */
        .site-footer {
            margin-top: 48px;
            background: #1c1c1c;
            border-top: 1px solid #353535;
        }

        .site-footer .container {
            max-width: 1200px;
        }

        .footer-heading {
            position: relative;
            margin-bottom: 22px;
            padding-bottom: 12px;
            color: #ffffff;
            font-size: 16px;
            font-weight: 700;
        }

        .footer-heading::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            width: 34px;
            height: 2px;
            background: #0d6efd;
            border-radius: 2px;
        }

        .footer-list {
            display: flex;
            flex-direction: column;
            gap: 13px;
        }

        .footer-link {
            color: #b8b8b8;
            text-decoration: none;
            transition: color 0.2s ease, padding-left 0.2s ease;
        }

        .footer-link:hover {
            color: #79aaff;
            padding-left: 4px;
        }

        
        .site-footer .footer-social {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            border: 1px solid #3b3b3b;
            border-radius: 10px;
            background: #262626;
            color: #d8d8d8;
            font-size: 20px;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .site-footer .footer-social:hover {
            background: #0d6efd;
            border-color: #0d6efd;
            color: #ffffff;
            transform: translateY(-2px);
        }

        .site-footer .footer-contact-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            flex-shrink: 0;
            border-radius: 8px;
            background: #292929;
            color: #4d9aff;
            font-size: 16px;
        }


        .footer-social:hover {
            color: #ffffff;
            background: #0d6efd;
            border-color: #0d6efd;
        }

        .footer-contact {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #b8b8b8;
            text-decoration: none;
            overflow-wrap: anywhere;
        }

        .footer-contact:hover {
            color: #79aaff;
        }

        .footer-contact-icon {
            display: inline-flex;
            flex-shrink: 0;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            color: #79aaff;
            background: #292929;
            border-radius: 8px;
        }

        .footer-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 38px;
            padding-top: 22px;
            border-top: 1px solid #353535;
        }

        .footer-bottom-link {
            color: #929292;
            font-size: 13px;
            text-decoration: none;
        }

        .footer-bottom-link:hover {
            color: #79aaff;
        }

        @media (max-width: 767.98px) {
            .site-footer {
                margin-top: 30px;
            }

            .footer-bottom {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        .back-to-top {
            position: fixed;
            right: 20px;
            bottom: 20px;
            z-index: 1000;
            width: 44px;
            height: 44px;
            border-radius: 10px;
            font-size: 20px;
        }

        /* MÀN HÌNH NHỎ */
        @media (max-width: 768px) {
            .novanews-banner {
                height: 340px;
            }

            .novanews-banner-image {
                object-position: center;
            }

            .novanews-banner-overlay {
                padding: 24px;
                background: linear-gradient(
                    90deg,
                    rgba(0, 0, 0, 0.78),
                    rgba(0, 0, 0, 0.30)
                );
            }

            .novanews-banner-label {
                font-size: 11px;
                letter-spacing: 1.3px;
            }

            .novanews-banner-overlay h1 {
                max-width: 100%;
                font-size: clamp(28px, 7vw, 40px);
            }

            .novanews-banner-overlay p {
                font-size: 14px;
            }

            .main-content {
                padding-top: 24px;
            }

            .search-panel {
                padding: 18px;
            }

            .featured img {
                min-height: 220px;
                max-height: 300px;
            }

            .post-image {
                height: 210px;
            }

            .site-footer {
                margin-top: 12px;
            }

            .brand-logo {
                height: 36px;
                max-width: 150px;
            }
        }

        .post-views {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #a0a0a0;
            font-size: 13px;
            margin-top: 6px;
        }
        
        /* Banner NovaNews: bốn góc vuông */
        .novanews-banner,
        .novanews-banner-image,
        .novanews-banner-overlay {
            border-radius: 0 !important;
        }

        /* Căn lượt xem và nút đọc tiếp trên cùng một hàng */
        .post-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            margin-top: 12px;
        }

        .post-bottom .post-views {
            display: flex;
            align-items: center;
            gap: 6px;
            margin: 0;
            font-size: 13px;
            white-space: nowrap;
        }

        .read-more-btn {
            flex-shrink: 0;
            white-space: nowrap;
            border-radius: 6px;
            padding: 6px 12px;
        }

/* TIỆN ÍCH BANNER NOVANEWS */
.novanews-banner {
    position: relative;
}

.novanews-banner-overlay {
    position: absolute;
    inset: 0;
    z-index: 2;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: center;
    padding: 40px 5%;
    box-sizing: border-box;
}

.novanews-banner-overlay h1,
.novanews-banner-overlay p,
.novanews-banner-overlay .novanews-banner-label,
.novanews-banner-overlay .novanews-banner-button {
    max-width: 58%;
}

.novanews-utilities {
    position: absolute;
    top: 50%;
    right: 5%;
    transform: translateY(-50%);
    width: 290px;
    padding: 24px;
    border: 1px solid rgba(255, 255, 255, 0.25);
    border-radius: 18px;
    background: rgba(15, 18, 24, 0.78);
    backdrop-filter: blur(12px);
    color: #fff;
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.25);
}

/* KHU VỰC GIÁ VÀNG VÀ CHỨNG KHOÁN */
.novanews-finance {
    margin-top: 18px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
}

.novanews-finance-item {
    min-width: 0;
    padding: 12px;
    border: 1px solid rgba(255, 255, 255, 0.18);
    border-radius: 12px;
    background: rgba(255, 255, 255, 0.08);
    color: #fff;
}

.novanews-finance-row {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 8px;
    margin-top: 10px;
    font-size: 12px;
}

.novanews-finance-row strong {
    text-align: right;
    overflow-wrap: anywhere;
}

.novanews-finance-source {
    margin-top: 10px;
    font-size: 10px;
    opacity: 0.75;
    line-height: 1.5;
}

.novanews-stock-index {
    margin-top: 12px;
    font-size: 20px;
    font-weight: 700;
}

.novanews-stock-change {
    margin-top: 6px;
    font-size: 12px;
    overflow-wrap: anywhere;
}

@media (max-width: 480px) {
    .novanews-finance {
        grid-template-columns: 1fr;
    }
}

.novanews-clock {
    font-size: 38px;
    font-weight: 700;
    letter-spacing: 1px;
    color: #fff;
    font-variant-numeric: tabular-nums;
}

.novanews-date {
    margin-top: 5px;
    color: #d4d9e2;
    font-size: 14px;
}

.novanews-weather {
    margin-top: 20px;
    padding-top: 16px;
    border-top: 1px solid rgba(255, 255, 255, 0.2);
}

.novanews-weather-title {
    font-size: 14px;
    color: #b8c4d8;
    margin-bottom: 8px;
}

.novanews-weather-info {
    font-size: 15px;
    line-height: 1.6;
}

@media (max-width: 768px) {
    .novanews-banner {
        min-height: 620px;
    }

    .novanews-banner-image {
        height: 620px;
        object-fit: cover;
    }

    .novanews-banner-overlay {
        justify-content: flex-start;
        padding: 45px 24px;
    }

    .novanews-banner-overlay h1,
    .novanews-banner-overlay p,
    .novanews-banner-overlay .novanews-banner-label,
    .novanews-banner-overlay .novanews-banner-button {
        max-width: 100%;
    }

    .novanews-utilities {
        top: auto;
        bottom: 22px;
        left: 24px;
        right: 24px;
        transform: none;
        width: auto;
        padding: 16px 20px;
    }

    .novanews-clock {
        font-size: 30px;
    }

    .novanews-weather {
        margin-top: 12px;
        padding-top: 10px;
    }
}




/* THANH DÒNG SỰ KIỆN - NOVANEWS */
.news-ticker {
    display: flex;
    align-items: center;
    gap: 18px;
    min-height: 64px;
    padding: 10px 24px;
    overflow: hidden;
    background: #181818;
    border-top: 1px solid #303030;
    border-bottom: 1px solid #303030;
    color: #f1f5f9;
}


/* NHÃN DÒNG SỰ KIỆN */
.news-ticker-label {
    display: flex;
    align-items: center;
    gap: 8px;
    flex-shrink: 0;
    color: #4d8dff;
    white-space: nowrap;
    font-family: Arial, "Segoe UI", sans-serif;
    font-size: 18px;
    font-weight: 700;
    font-style: normal;
    letter-spacing: 0;
    line-height: 1.4;
}

.news-ticker-label span {
    font-family: Arial, "Segoe UI", sans-serif;
    font-size: 20px;
    font-weight: bold;
}


/* KHUNG CHỨA TIN CHẠY */
.news-ticker-window {
    flex: 1;
    min-width: 0;
    overflow: hidden;
}

/* DẢI TIN CHẠY NGANG */
.news-ticker-track {
    display: flex;
    align-items: center;
    width: max-content;
    gap: 14px;
    animation: novanews-ticker-scroll 45s linear infinite;
}

.news-ticker:hover .news-ticker-track {
    animation-play-state: paused;
}

/* TỪNG TIN TỨC */
.news-ticker-item {
    display: inline-block;
    flex-shrink: 0;
    padding: 9px 16px;
    border: 1px solid #383838;
    border-radius: 24px;
    background: #222222;
    color: #e5e7eb;
    text-decoration: none !important;
    white-space: nowrap;
    transition: background 0.2s, border-color 0.2s, color 0.2s;
}

.news-ticker-item:hover {
    background: #292f3a;
    border-color: #4d8dff;
    color: #ffffff;
    text-decoration: none !important;
}

/* HIỆU ỨNG CHẠY NGANG */
@keyframes novanews-ticker-scroll {
    from {
        transform: translateX(0);
    }

    to {
        transform: translateX(-50%);
    }
}

/* GIAO DIỆN ĐIỆN THOẠI */
@media (max-width: 576px) {
    .news-ticker {
        gap: 10px;
        padding: 10px 12px;
        min-height: 56px;
    }

    .news-ticker-label {
        gap: 5px;
        font-size: 12px;
    }

    .news-ticker-label span {
        font-size: 16px;
    }

    .news-ticker-item {
        padding: 8px 12px;
        font-size: 13px;
    }

    .news-ticker-track {
        animation-duration: 35s;
    }
}

/* TÔN TRỌNG THIẾT LẬP GIẢM CHUYỂN ĐỘNG */
@media (prefers-reduced-motion: reduce) {
    .news-ticker-track {
        animation: none;
    }
}

/* KHU VỰC VIDEO NOVANEWS */
.novanews-video-section {
    max-width: 1000px;
    margin: 60px auto;
    padding: 0 20px;
}

.novanews-video-heading {
    margin-bottom: 24px;
    text-align: center;
}

.novanews-video-label {
    color: #4d8dff;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 2px;
}

.novanews-video-heading h2 {
    margin: 10px 0;
    color: #f5f5f5;
    font-size: 28px;
    font-weight: 700;
}

.novanews-video-heading p {
    color: #aeb4bf;
    margin-bottom: 0;
}

.novanews-video-frame {
    position: relative;
    width: 100%;
    aspect-ratio: 16 / 9;
    overflow: hidden;
    border: 1px solid #343434;
    border-radius: 16px;
    background: #181818;
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.25);
}

.novanews-video-frame iframe {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    border: 0;
}

@media (max-width: 576px) {
    .novanews-video-section {
        margin: 40px auto;
        padding: 0 14px;
    }

    .novanews-video-heading h2 {
        font-size: 23px;
    }

    .novanews-video-frame {
        border-radius: 10px;
    }
}

/* SỬA BỐ CỤC TIỆN ÍCH TRÊN BANNER NOVANEWS */
.novanews-utilities-layout {
    position: absolute;
    top: 50%;
    right: 5%;
    transform: translateY(-50%);
    width: min(550px, 43%);
    display: grid;
    grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
    gap: 10px;
    align-items: center;
    z-index: 5;
}

/* Hai ô tài chính bên trái */
.novanews-utilities-layout .novanews-finance {
    display: grid;
    grid-template-columns: 1fr;
    gap: 10px;
    min-width: 0;
    margin: 0;
}

/* Khung giờ và thời tiết bên phải */
.novanews-utilities-layout aside.novanews-utilities {
    position: relative;
    top: auto;
    right: auto;
    bottom: auto;
    left: auto;
    transform: none;
    width: 100%;
    min-width: 0;
    height: auto;
    padding: 14px;
    box-sizing: border-box;
    margin: 0;
}

/* Tránh chữ dài làm vỡ khung */
.novanews-utilities-layout .novanews-finance-item {
    min-width: 0;
    overflow-wrap: anywhere;
    box-sizing: border-box;
}

.novanews-utilities-layout .novanews-finance-row {
    display: flex;
    justify-content: space-between;
    gap: 8px;
}

/* Thu nhỏ trên màn hình nhỏ */
@media (max-width: 900px) {
    .novanews-utilities-layout {
        position: relative;
        top: auto;
        right: auto;
        transform: none;
        width: 90%;
        margin: 24px auto;
        grid-template-columns: 1fr 1fr;
    }
}

@media (max-width: 560px) {
    .novanews-utilities-layout {
        grid-template-columns: 1fr;
    }
}


.novanews-finance-item {
    min-width: 0;
    overflow: hidden;
}

.novanews-stock-index {
    margin-top: 10px;
    font-size: 18px;
    font-weight: 700;
}

#novanews-stock-widget {
    width: 100%;
    min-width: 0;
    overflow: hidden;
}

#novanews-stock-widget iframe {
    max-width: 100%;
}


/* ===== NOVANEWS CURRENCY CONVERTER ===== */

.novanews-currency-card {
    box-sizing: border-box;
    min-width: 0;
    padding: 12px;
    border: 1px solid rgba(255, 255, 255, 0.18);
    border-radius: 14px;
    background: rgba(30, 32, 38, 0.88);
    color: #fff;
    overflow: hidden;
}

.novanews-currency-caption,
.novanews-currency-result-label {
    margin-top: 16px;
    margin-bottom: 7px;
    color: #cbd5e1;
    font-size: 11px;
}

.novanews-currency-input {
    width: 100%;
    box-sizing: border-box;
    padding: 8px 10px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 9px;
    outline: none;
    background: rgba(255, 255, 255, 0.08);
    color: #fff;
    font-size: 16px;
    font-weight: 700;
}

.novanews-currency-input:focus,
.novanews-currency-select:focus {
    border-color: #e8bd69;
}

.novanews-currency-input::-webkit-inner-spin-button,
.novanews-currency-input::-webkit-outer-spin-button {
    opacity: 1;
}

.novanews-currency-selectors {
    display: grid;
    grid-template-columns: minmax(0, 1fr) 34px minmax(0, 1fr);
    align-items: center;
    gap: 8px;
    margin-top: 10px;
}

.novanews-currency-select {
    width: 100%;
    min-width: 0;
    height: 42px;
    padding: 0 8px;
    border: 1px solid rgba(255, 255, 255, 0.18);
    border-radius: 9px;
    outline: none;
    background: #30343d;
    color: #fff;
    font-size: 12px;
    box-sizing: border-box;
}

.novanews-currency-select option {
    background: #30343d;
    color: #fff;
}

.novanews-currency-swap {
    width: 34px;
    height: 34px;
    min-width: 34px;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    box-sizing: border-box;

    border: 1px solid rgba(240, 198, 116, 0.45);
    border-radius: 9px;
    background: rgba(240, 198, 116, 0.12);
    color: #f0c674;

    font-size: 18px;
    line-height: 1;
    cursor: pointer;
    transition: background 0.2s ease, border-color 0.2s ease;
}

.novanews-currency-swap:hover {
    background: rgba(240, 198, 116, 0.24);
    border-color: #f0c674;
}

.novanews-currency-result-label {
    margin-top: 17px;
}

.novanews-currency-result {
    overflow-wrap: anywhere;
    color: #f0c674;
    font-size: 22px;
    font-weight: 800;
    line-height: 1.3;
}

.novanews-currency-detail {
    margin-top: 7px;
    color: #cbd5e1;
    font-size: 11px;
    line-height: 1.5;
    overflow-wrap: anywhere;
}

.novanews-currency-divider {
    margin: 15px 0 10px;
    border-top: 1px solid rgba(255, 255, 255, 0.14);
}

.novanews-currency-footer {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    gap: 8px;
    color: #c3c7d0;
    font-size: 10px;
}

.novanews-currency-footer button {
    padding: 5px 9px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 6px;
    background: transparent;
    color: #fff;
    font-size: 10px;
    cursor: pointer;
}

.novanews-currency-footer button:hover {
    background: rgba(255, 255, 255, 0.1);
}

@media (max-width: 560px) {
    .novanews-currency-card {
        padding: 14px;
    }

    .novanews-currency-result {
        font-size: 23px;
    }
}

/* ===== NOVANEWS LATEST NEWS ===== */

.novanews-latest-news {
    margin-top: 14px;
    padding-top: 12px;
    border-top: 1px solid rgba(255, 255, 255, 0.15);
}

.novanews-latest-news-heading {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
    margin-bottom: 12px;
    color: #f0c674;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 0.3px;
}

.novanews-latest-news-dot {
    width: 7px;
    height: 7px;
    flex: 0 0 7px;
    border-radius: 50%;
    background: #63d99a;
    box-shadow: 0 0 8px rgba(99, 217, 154, 0.5);
}

.novanews-latest-news-item {
    display: flex;
    align-items: flex-start;
    gap: 7px;
    padding: 7px 0;
    color: #fff;
    text-decoration: none;
    border-bottom: 1px solid rgba(255, 255, 255, 0.09);
}

.novanews-latest-news-item:last-child {
    border-bottom: none;
}

.novanews-latest-news-item:hover
.novanews-latest-news-title {
    color: #f0c674;
}

.novanews-latest-news-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 25px;
    height: 25px;
    flex: 0 0 25px;
    border-radius: 7px;
    background: rgba(240, 198, 116, 0.13);
    color: #f0c674;
    font-size: 11px;
    font-weight: 700;
}

.novanews-latest-news-content {
    display: flex;
    flex: 1;
    flex-direction: column;
    gap: 5px;
    min-width: 0;
}


.novanews-latest-news-title {
    display: -webkit-box;
    overflow: hidden;
    color: #f4f4f5;
    font-size: 11px;
    font-weight: 600;
    line-height: 1.4;
    overflow-wrap: anywhere;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
    line-clamp: 2;
}


.novanews-latest-news-category {
    color: #aeb7c5;
    font-size: 10px;
}

.novanews-latest-news-arrow {
    color: #aeb7c5;
    font-size: 14px;
}

.novanews-latest-news-empty {
    color: #cbd5e1;
    font-size: 12px;
    line-height: 1.6;
}

@media (max-width: 560px) {
    .novanews-latest-news {
        margin-top: 16px;
    }
}

.novanews-latest-news {
    margin-top: 10px;
    padding-top: 10px;
}

.novanews-latest-news-heading {
    margin-bottom: 5px;
}

.novanews-latest-news-item {
    padding: 5px 0;
    gap: 6px;
}

.novanews-latest-news-category {
    font-size: 9px;
}

.novanews-latest-news-title {
    font-size: 10px;
    line-height: 1.35;
    -webkit-line-clamp: 2;
    line-clamp: 2;
}


/* ===== RESPONSIVE BANNER VÀ TIỆN ÍCH NOVANEWS ===== */

/* Giữ banner làm vùng chứa ảnh nền và tiện ích */
.novanews-banner {
    position: relative;
    isolation: isolate;
    overflow: hidden;
}

/* Ảnh nền luôn phủ toàn banner */
.novanews-banner-image {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: -2;
}

/* Lớp phủ nền */
.novanews-banner::before {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(
        90deg,
        rgba(0, 0, 0, 0.72),
        rgba(0, 0, 0, 0.18)
    );
    z-index: -1;
    pointer-events: none;
}

/* Nội dung giới thiệu */
.novanews-banner-overlay {
    position: absolute;
    inset: 0;
    z-index: 2;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: center;
    padding: 40px 5%;
    box-sizing: border-box;
    pointer-events: none;
}

.novanews-banner-overlay h1,
.novanews-banner-overlay p,
.novanews-banner-overlay .novanews-banner-label,
.novanews-banner-overlay .novanews-banner-button {
    max-width: 48%;
    pointer-events: auto;
}

/* Hai cột tiện ích bên phải */
.novanews-utilities-layout {
    position: absolute;
    top: 50%;
    right: 3%;
    transform: translateY(-50%);
    width: min(550px, 48%);
    display: grid;
    grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
    gap: 10px;
    align-items: center;
    z-index: 5;
    box-sizing: border-box;
}

.novanews-utilities-layout > * {
    min-width: 0;
}

/* Giá vàng và chuyển đổi tiền tệ */
.novanews-utilities-layout .novanews-finance {
    display: grid;
    grid-template-columns: minmax(0, 1fr);
    gap: 10px;
    min-width: 0;
    margin: 0;
}

.novanews-utilities-layout .novanews-finance-item,
.novanews-currency-card {
    min-width: 0;
    max-width: 100%;
    box-sizing: border-box;
    overflow-wrap: anywhere;
}

/* Đồng hồ, thời tiết và tin nhanh */
.novanews-utilities-layout aside.novanews-utilities {
    position: relative;
    inset: auto;
    transform: none;
    width: 100%;
    min-width: 0;
    height: auto;
    margin: 0;
    padding: 14px;
    box-sizing: border-box;
}

/* Màn hình vừa: chuyển tiện ích xuống dưới nội dung giới thiệu */

/* Màn hình nhỏ và cửa sổ bị thu hẹp */
@media (max-width: 1000px) {
    .novanews-banner {
        display: flex;
        flex-direction: column;
        height: auto;
        min-height: 0;
        overflow: hidden;
        position: relative;
        background-size: cover;
        background-position: center;
    }

    .novanews-banner-image {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .novanews-banner-overlay {
        position: relative;
        inset: auto;
        width: 100%;
        min-height: 320px;
        padding: 32px 5%;
        justify-content: center;
        background: transparent;
    }

    .novanews-banner-overlay h1,
    .novanews-banner-overlay p,
    .novanews-banner-overlay .novanews-banner-label,
    .novanews-banner-overlay .novanews-banner-button {
        max-width: 100%;
    }

    .novanews-utilities-layout {
        position: relative;
        top: auto;
        right: auto;
        transform: none;
        width: 90%;
        max-width: 700px;
        margin: 0 auto 24px;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        align-items: start;
        gap: 14px;
    }
}

/* Điện thoại */
@media (max-width: 560px) {
    .novanews-banner-overlay {
        min-height: 280px;
        padding: 28px 20px;
    }

    .novanews-utilities-layout {
        width: calc(100% - 28px);
        max-width: none;
        grid-template-columns: minmax(0, 1fr);
        gap: 12px;
        margin: 0 auto 20px;
    }

    .novanews-utilities-layout aside.novanews-utilities {
        width: 100%;
        min-width: 0;
        padding: 14px;
    }

    .novanews-clock {
        font-size: 28px;
    }
}



    </style>
</head>
<body>

    <!-- BANNER CHÍNH -->
    <section class="novanews-banner">
        <img
            src="{{ asset('images/banner-home.png') }}"
            alt="NovaNews - Góc đọc tin tức và khám phá kiến thức"
            class="novanews-banner-image"
        >

        <div class="novanews-banner-overlay">
            <span class="novanews-banner-label">
                NOVANEWS · TẠP CHÍ ĐIỆN TỬ
            </span>

            <h1>Khám phá thế giới qua <br> từng  trang viết</h1>

            <p>
                Cập nhật công nghệ, du lịch và phong cách sống mỗi ngày.
            </p>

            <a href="#danh-sach-bai-viet" class="novanews-banner-button">
                Khám phá bài viết
            </a>
        </div>
        
        

<!-- BẢNG TIỆN ÍCH NOVANEWS -->
<div class="novanews-utilities-layout">

    <!-- CỘT BÊN TRÁI: THỊ TRƯỜNG TÀI CHÍNH -->
    <div class="novanews-finance">

        <!-- GIÁ VÀNG SJC -->
        <div class="novanews-finance-item">
            <div class="novanews-weather-title">
                <span>🪙</span> GIÁ VÀNG SJC
            </div>

            <div class="novanews-finance-row">
                <span>Mua vào</span>
                <strong id="novanews-gold-buy">Đang tải...</strong>
            </div>

            <div class="novanews-finance-row">
                <span>Bán ra</span>
                <strong id="novanews-gold-sell">Đang tải...</strong>
            </div>

            <div class="novanews-finance-source">
                Nguồn: taichinh.com
            </div>
        </div>

        

<div class="novanews-finance-item novanews-currency-card">
    <div class="novanews-weather-title">
        <span>💱</span> CHUYỂN ĐỔI TIỀN TỆ
    </div>

    <div class="novanews-currency-caption">Số tiền cần chuyển</div>

    <input
        type="number"
        id="novanews-currency-amount"
        class="novanews-currency-input"
        value="100"
        min="0"
        step="any"
        placeholder="Nhập số tiền"
    >

    <div class="novanews-currency-selectors">
        <select id="novanews-currency-from" class="novanews-currency-select">
            <option value="VND" selected>🇻🇳 VND</option>
            <option value="USD">🇺🇸 USD</option>
            <option value="EUR">🇪🇺 EUR</option>
            <option value="JPY">🇯🇵 JPY</option>
            <option value="KRW">🇰🇷 KRW</option>
        </select>

        <button
            type="button"
            id="novanews-currency-swap"
            class="novanews-currency-swap"
            aria-label="Đảo chiều chuyển đổi"
            title="Đảo chiều"
        >⇄</button>

        <select id="novanews-currency-to" class="novanews-currency-select">
            <option value="VND">🇻🇳 VND</option>
            <option value="USD" selected>🇺🇸 USD</option>
            <option value="EUR">🇪🇺 EUR</option>
            <option value="JPY">🇯🇵 JPY</option>
            <option value="KRW">🇰🇷 KRW</option>
        </select>
    </div>

    <div class="novanews-currency-result-label">Kết quả tham khảo</div>

    <div id="novanews-currency-result" class="novanews-currency-result">
        0 USD
    </div>

    <div id="novanews-currency-detail" class="novanews-currency-detail">
        1 USD = 26.000 VND
    </div>

    <div class="novanews-currency-divider"></div>

    <div class="novanews-currency-footer">
        <span>💡 Tỷ giá minh họa</span>
        <button type="button" id="novanews-currency-reset">
            Đặt lại
        </button>
    </div>
</div>





    </div>

    <!-- CỘT BÊN PHẢI: GIỜ HIỆN TẠI VÀ THỜI TIẾT -->
    <aside class="novanews-utilities">

        <!-- GIỜ HIỆN TẠI -->
        <div class="novanews-weather-title">
            GIỜ HIỆN TẠI
        </div>

        <div id="novanews-clock" class="novanews-clock">
            --:--:--
        </div>

        <div id="novanews-date" class="novanews-date">
            Đang cập nhật ngày tháng...
        </div>

        <!-- THỜI TIẾT -->
        <div class="novanews-weather">
            <div class="novanews-weather-title">
                <span>🌤️</span> THỜI TIẾT
            </div>

            <div class="novanews-weather-info">
                <div id="novanews-weather-location">
                    Tân Phú, TP Hồ Chí Minh
                </div>

                <div id="novanews-weather-temperature">
                    Đang tải thời tiết...
                </div>
            </div>
        </div>

<div class="novanews-latest-news">
    <div class="novanews-latest-news-heading">
        <span>📰 TIN NHANH TRONG NGÀY</span>
        <span class="novanews-latest-news-dot"></span>
    </div>

    @forelse(($latestPosts ?? collect()) as $post)
        <a
            
            href="{{ route('posts.show', ['id' => $post->id]) }}"

            class="novanews-latest-news-item"
        >
            <span class="novanews-latest-news-icon">
                {{ $loop->iteration }}
            </span>

            <span class="novanews-latest-news-content">
                <span class="novanews-latest-news-title">
                    {{ $post->title }}
                </span>

                <span class="novanews-latest-news-category">
                    {{ $post->category->name ?? 'Tin mới' }}
                </span>
            </span>

            <span class="novanews-latest-news-arrow">↗</span>
        </a>
    @empty
        <p class="novanews-latest-news-empty">
            Chưa có bài viết mới để hiển thị.
        </p>
    @endforelse
</div>

    </aside>

</div>



    </section>

    <!-- THANH ĐIỀU HƯỚNG -->
    <nav class="navbar navbar-dark">
        <div class="container py-2 d-flex flex-wrap align-items-center gap-3">

            <a class="navbar-brand text-primary me-auto"
               href="{{ route('home') }}">
                <img
                    src="{{ asset('images/logo.png') }}"
                    alt="NovaNews"
                    class="brand-logo"
                >
            </a>

            <a href="{{ route('home') }}"
               class="btn btn-outline-primary btn-sm">
                Trang chủ
            </a>
            <a href="{{ route('rss.index') }}"
            class="btn btn-outline-primary btn-sm">
                Tin tổng hợp khác
            </a>
            @auth
                @if (auth()->user()->role === 'admin')
                    <a href="{{ route('admin.posts.index') }}"
                       class="btn btn-primary btn-sm">
                        Quản lý tin tức
                    </a>
                    <a href="{{ route('admin.users.index') }}"
                        class="btn btn-primary btn-sm">
                            Quản lý người dùng
    </a>
    
                @endif
<a href="{{ route('account.index') }}"
   class="btn btn-outline-light btn-sm">
    Tài khoản cá nhân
</a>
                <span class="text-light">
                    Xin chào, {{ auth()->user()->name }}
                </span>

                <form action="{{ route('logout') }}"
                      method="POST"
                      class="d-inline">
                    @csrf

                    <button type="submit" class="btn btn-outline-danger btn-sm">
                        Đăng xuất
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}"
                   class="btn btn-outline-primary btn-sm">
                    Đăng nhập
                </a>

                <a href="{{ route('register') }}"
                   class="btn btn-primary btn-sm">
                    Đăng ký
                </a>
            @endauth

        </div>
    </nav>

    <!-- THANH DÒNG SỰ KIỆN -->
    <section class="news-ticker">
        <div class="news-ticker-label">
            <span>↗</span>
            <strong>DÒNG SỰ KIỆN:</strong>
        </div>

        <div class="news-ticker-window">
            <div class="news-ticker-track">
                @foreach ($posts->getCollection() as $post)
                    <a href="{{ route('posts.show', $post->id) }}"
                       class="news-ticker-item">
                        {{ $post->title }}
                    </a>
                @endforeach

                @foreach ($posts->getCollection() as $post)
                    <a href="{{ route('posts.show', $post->id) }}"
                       class="news-ticker-item"
                       aria-hidden="true"
                       tabindex="-1">
                        {{ $post->title }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- NỘI DUNG CHÍNH -->
    <main class="container main-content">

        <!-- TÌM KIẾM VÀ LỌC -->
        <section class="search-panel" aria-label="Tìm kiếm và lọc bài viết">

            <h2 class="search-panel-title">Tìm kiếm và lọc tin tức</h2>

            <form action="{{ route('home') }}" method="GET">
                <div class="row g-3 align-items-end">

                    <div class="col-lg-6">
                        <label for="keyword" class="form-label">
                            Từ khóa
                        </label>

                        <input
                            type="search"
                            id="keyword"
                            name="keyword"
                            class="form-control"
                            placeholder="Nhập tiêu đề hoặc nội dung bài viết..."
                            value="{{ request('keyword') }}"
                        >
                    </div>

                    <div class="col-lg-3">
                        <label for="category_id" class="form-label">
                            Danh mục
                        </label>

                        <select
                            name="category_id"
                            id="category_id"
                            class="form-select"
                        >
                            <option value="">Tất cả danh mục</option>

                            @foreach ($categories as $category)
                                <option
                                    value="{{ $category->id }}"
                                    {{ (string) request('category_id') === (string) $category->id ? 'selected' : '' }}
                                >
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-3">
                        <label for="sort" class="form-label">
                            Sắp xếp
                        </label>

                        <select name="sort" id="sort" class="form-select">
                            <option value="latest"
                                {{ ($sort ?? 'latest') === 'latest' ? 'selected' : '' }}>
                                Mới nhất
                            </option>

                            <option value="popular"
                                {{ ($sort ?? 'latest') === 'popular' ? 'selected' : '' }}>
                                Xem nhiều nhất
                            </option>
                        </select>
                    </div>

                    <div class="col-lg-3 d-flex gap-2">
                        <button type="submit"
                                class="btn btn-primary flex-grow-1">
                            Tìm kiếm
                        </button>

                        <a href="{{ route('home') }}"
                           class="btn btn-outline-secondary">
                            Xóa lọc
                        </a>
                    </div>

                </div>
            </form>
        </section>

        <!-- BÀI VIẾT NỔI BẬT -->
        @if (!request()->filled('keyword') && !request()->filled('category_id') && !request()->filled('sort') && $featuredPost)
            <section class="mb-5">
                <h2 class="section-title h4 mb-4">
                    Bài viết nổi bật
                </h2>

                <div class="featured row g-0">

                    <div class="col-lg-6">
                        @if ($featuredPost->thumbnail)
                            <img
                                src="{{ asset('storage/' . $featuredPost->thumbnail) }}"
                                alt="{{ $featuredPost->title }}"
                                loading="lazy"
                            >
                        @else
                            <div class="featured-placeholder d-flex align-items-center justify-content-center p-5 muted">
                                NovaNews
                            </div>
                        @endif
                    </div>

                    <div class="col-lg-6 p-4 p-lg-5 d-flex flex-column justify-content-center">

                        <p class="text-primary mb-2">
                            {{ $featuredPost->category->name ?? 'Chưa phân loại' }}
                        </p>

                        <h2 class="fw-bold mb-3">
                            {{ $featuredPost->title }}
                        </h2>

                        <p class="muted">
                            {{ $featuredPost->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($featuredPost->content), 180) }}
                        </p>

                        <p class="small muted">
                            Tác giả: {{ $featuredPost->user->name ?? 'NovaNews' }}
                            @if ($featuredPost->published_at)
                                | {{ $featuredPost->published_at->format('d/m/Y') }}
                            @endif
                        </p>

                        <a
                            href="{{ route('posts.show', $featuredPost->id) }}"
                            class="btn btn-primary align-self-start"
                        >
                            Đọc bài viết →
                        </a>

                    </div>
                </div>
            </section>
        @endif

        <!-- DANH MỤC BÀI VIẾT -->
        <section class="mb-5">
            <h2 class="section-title h4 mb-4">Danh mục bài viết</h2>

            <div class="category-list">
                <a
                    href="{{ route('home') }}"
                    class="category-link {{ !request('category_id') ? 'active' : '' }}"
                >
                    Tất cả
                </a>

                @foreach ($categories as $category)
                    <a
                        href="{{ route('home', array_merge(request()->query(), ['category_id' => $category->id, 'page' => null])) }}"
                        class="category-link {{ (string) request('category_id') === (string) $category->id ? 'active' : '' }}"
                    >
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </section>

        <!-- DANH SÁCH BÀI VIẾT -->
        <section id="danh-sach-bai-viet" class="mb-5">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
                <h2 class="section-title h4 mb-0">
                    @if (request('keyword'))
                        Kết quả tìm kiếm
                    @elseif (request('category_id'))
                        Bài viết theo danh mục
                    @elseif (($sort ?? 'latest') === 'popular')
                        Bài viết được xem nhiều
                    @else
                        Bài viết mới nhất
                    @endif
                </h2>

                <span class="muted small">
                    @if (method_exists($posts, 'total'))
                        {{ $posts->total() }} bài viết
                    @else
                        {{ $posts->count() }} bài viết
                    @endif
                </span>
            </div>

            @if ($posts->count() > 0)
                <div class="row g-4">
                    @foreach ($posts as $post)
                        <div class="col-md-6 col-lg-4">
                            <article class="post-card">

                                <a
                                    href="{{ route('posts.show', $post->id) }}"
                                    class="text-decoration-none"
                                >
                                    @if ($post->thumbnail)
                                        <img
                                            src="{{ asset('storage/' . $post->thumbnail) }}"
                                            alt="{{ $post->title }}"
                                            class="post-image"
                                            loading="lazy"
                                        >
                                    @else
                                        <div class="post-image d-flex align-items-center justify-content-center muted">
                                            NovaNews
                                        </div>
                                    @endif
                                </a>

                                <div class="post-body">
                                    <div class="mb-2">
                                        <a
                                            href="{{ route('home', array_merge(request()->query(), ['category_id' => $post->category_id, 'page' => null])) }}"
                                            class="text-primary text-decoration-none small"
                                        >
                                            {{ $post->category->name ?? 'Chưa phân loại' }}
                                        </a>
                                    </div>

                                    <h3 class="h5 fw-bold mb-3">
                                        <a
                                            href="{{ route('posts.show', $post->id) }}"
                                            class="text-light text-decoration-none"
                                        >
                                            {{ $post->title }}
                                        </a>
                                    </h3>

                                    <p class="muted small">
                                        {{ $post->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($post->content), 120) }}
                                    </p>

                                    <div class="post-meta">
                                        <div class="small muted">
                                            <span>
                                                {{ $post->user->name ?? 'NovaNews' }}
                                            </span>

                                            @if ($post->published_at)
                                                <span> · {{ $post->published_at->format('d/m/Y') }}</span>
                                            @endif
                                        </div>

                                        <div class="post-bottom">
                                            <div class="post-views">
                                                <span>👁</span>
                                                <span>{{ number_format($post->views ?? 0) }} lượt xem</span>
                                            </div>

                                            <a
                                                href="{{ route('posts.show', $post->id) }}"
                                                class="btn btn-outline-primary btn-sm read-more-btn"
                                            >
                                                Đọc tiếp →
                                            </a>
                                        </div>

                                    </div>
                                </div>

                            </article>
                        </div>
                    @endforeach
                </div>

                <!-- PHÂN TRANG -->
                @if (method_exists($posts, 'links'))
                    <div class="pagination-wrapper mt-5">
                        {{ $posts->withQueryString()->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            @else
                <div class="text-center py-5 px-3 rounded-3"
                     style="background: var(--surface); border: 1px solid var(--border);">
                    <h3 class="h5 mb-3">Chưa tìm thấy bài viết phù hợp</h3>

                    <p class="muted mb-4">
                        Thử từ khóa khác hoặc bỏ bớt điều kiện lọc.
                    </p>

                    <a href="{{ route('home') }}" class="btn btn-primary">
                        Xem tất cả bài viết
                    </a>
                </div>
            @endif
        </section>

    </main>
@include('partials.news-coverflow')
<!-- VIDEO GIỚI THIỆU NOVANEWS -->
<section class="novanews-video-section">
    <div class="novanews-video-heading">
        <span class="novanews-video-label">KHÁM PHÁ NOVANEWS</span>
        <h2>Góc nhìn qua video</h2>
        <p>Khám phá những câu chuyện và thông tin thú vị qua hình ảnh.</p>
    </div>

    <div class="novanews-video-frame">
        <iframe
            src="https://www.youtube.com/embed/k0wqQDU7_84?si=hTOayDl7eQU5vIqo"
            title="Video giới thiệu NovaNews"
            loading="lazy"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin"
            allowfullscreen>
        </iframe>
    </div>
</section>


<!-- CHÂN TRANG -->
<footer class="site-footer">
    <div class="container py-5">
        <div class="row g-5">

            <!-- THƯƠNG HIỆU -->
            <div class="col-lg-4 col-md-6">
                <a href="{{ route('home') }}"
                   class="d-inline-flex align-items-center text-decoration-none mb-3">
                    <img
                        src="{{ asset('images/logo.png') }}"
                        alt="NovaNews"
                        style="width: 170px; max-width: 100%; height: auto; object-fit: contain;"
                    >
                </a>

                <p class="muted mb-3" style="line-height: 1.9;">
                    NovaNews mang đến những bài viết về công nghệ,
                    đời sống, du lịch, kinh doanh và nhiều chủ đề hữu ích,
                    giúp bạn cập nhật kiến thức và khám phá những góc nhìn mới mỗi ngày.
                </p>

                
                <div class="d-flex align-items-center gap-3">
                    <a href="https://www.facebook.com/"
                    class="footer-social"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="Facebook"
                    title="Facebook">
                        <i class="bi bi-facebook"></i>
                    </a>

                    <a href="https://www.tiktok.com/"
                    class="footer-social"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="TikTok"
                    title="TikTok">
                        <i class="bi bi-tiktok"></i>
                    </a>
                </div>

            </div>

            <!-- LIÊN KẾT -->
            <div class="col-lg-2 col-md-6">
                <h3 class="footer-heading">Khám phá</h3>

                <ul class="list-unstyled footer-list">
                    <li>
                        <a href="{{ route('home') }}" class="footer-link">
                            Trang chủ
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('home') }}#danh-sach-bai-viet"
                           class="footer-link">
                            Bài viết mới nhất
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('home') }}#danh-sach-bai-viet"
                           class="footer-link">
                            Bài viết nổi bật
                        </a>
                    </li>
                </ul>
            </div>

            <!-- DANH MỤC -->
            <div class="col-lg-3 col-md-6">
                <h3 class="footer-heading">Danh mục bài viết</h3>

                <ul class="list-unstyled footer-list">
                    @foreach ($categories as $category)
                        <li>
                            <a
                                href="{{ route('home', ['category_id' => $category->id]) }}"
                                class="footer-link"
                            >
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- LIÊN HỆ -->
            <div class="col-lg-3 col-md-6">
                <h3 class="footer-heading">Liên hệ</h3>

                <p class="muted mb-3" style="line-height: 1.8;">
                    Kết nối với NovaNews để cập nhật những nội dung mới nhất.
                </p>

                <a href="mailto:contact@novanews.local"
                   class="footer-contact">                
                    <span class="footer-contact-icon" aria-hidden="true">
                        <i class="bi bi-envelope-fill"></i>
                    </span>

                    <span>contact@novanews.local</span>
                </a>
            </div>

        </div>

        <!-- BẢN QUYỀN -->
        <div class="footer-bottom">
            <p class="muted small mb-0">
                © {{ date('Y') }} NovaNews. Bảo lưu mọi quyền.
            </p>

            <a href="{{ route('home') }}" class="footer-bottom-link">
                Góc nhìn mới · Kiến thức mỗi ngày
            </a>
        </div>
    </div>
</footer>


    <!-- NÚT CUỘN LÊN ĐẦU TRANG -->
    <button
        type="button"
        class="btn btn-primary back-to-top"
        id="backToTop"
        aria-label="Cuộn lên đầu trang"
        title="Lên đầu trang"
    >
        ↑
    </button>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>

    <script>
        const backToTopButton = document.getElementById('backToTop');

        if (backToTopButton) {
            backToTopButton.addEventListener('click', function () {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });

            window.addEventListener('scroll', function () {
                backToTopButton.style.display =
                    window.scrollY > 300 ? 'block' : 'none';
            });

            backToTopButton.style.display = 'none';
        }
    </script>

<script>
    function updateNovaNewsClock() {
        const now = new Date();

        document.getElementById('novanews-clock').textContent =
            now.toLocaleTimeString('vi-VN', {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: false
            });

        document.getElementById('novanews-date').textContent =
            now.toLocaleDateString('vi-VN', {
                weekday: 'long',
                day: '2-digit',
                month: '2-digit',
                year: 'numeric'
            });
    }

    updateNovaNewsClock();
    setInterval(updateNovaNewsClock, 1000);

    async function loadNovaNewsWeather() {
        const temperature =
            document.getElementById('novanews-weather-temperature');

        try {
            const response = await fetch(
                'https://api.open-meteo.com/v1/forecast?latitude=10.405&longitude=106.165&current=temperature_2m,relative_humidity_2m,apparent_temperature,weather_code&timezone=Asia%2FBangkok'
            );

            if (!response.ok) {
                throw new Error('Không tải được dữ liệu thời tiết');
            }

            const data = await response.json();
            const current = data.current;

            const weatherDescriptions = {
                0: 'Trời quang',
                1: 'Trời khá quang',
                2: 'Có mây rải rác',
                3: 'Nhiều mây',
                45: 'Sương mù',
                48: 'Sương mù dày',
                51: 'Mưa phùn nhẹ',
                53: 'Mưa phùn',
                55: 'Mưa phùn dày',
                61: 'Mưa nhẹ',
                63: 'Mưa vừa',
                65: 'Mưa lớn',
                80: 'Mưa rào nhẹ',
                81: 'Mưa rào',
                82: 'Mưa rào lớn',
                95: 'Có dông'
            };

            const description =
                weatherDescriptions[current.weather_code] ??
                'Thời tiết biến đổi';

            temperature.textContent =
                `${description} · ${current.temperature_2m}°C`;

            const humidity = document.createElement('div');
            humidity.textContent =
                `Độ ẩm: ${current.relative_humidity_2m}%`;

            temperature.appendChild(humidity);
        } catch (error) {
            temperature.textContent =
                'Chưa tải được thời tiết. Thử tải lại trang.';
        }
    }

    loadNovaNewsWeather();

    
async function loadNovaNewsGold() {
    const buyElement = document.getElementById('novanews-gold-buy');
    const sellElement = document.getElementById('novanews-gold-sell');

    if (!buyElement || !sellElement) return;

    try {
        const response = await fetch('/market/gold');

        if (!response.ok) {
            throw new Error('Không thể tải giá vàng');
        }

        const data = await response.json();

        const formatVND = (value) =>
            new Intl.NumberFormat('vi-VN').format(value) + ' đ';

        buyElement.textContent = formatVND(data.buy);
        sellElement.textContent = formatVND(data.sell);

        // Hiển thị thời điểm dữ liệu được ghi nhận.
        const sourceElement = document.querySelector(
            '.novanews-finance-item .novanews-finance-source'
        );

        if (sourceElement) {
            let timeText = 'Thời điểm cập nhật chưa rõ';

            if (data.observed_at) {
                timeText = new Date(data.observed_at).toLocaleString(
                    'vi-VN',
                    { timeZone: 'Asia/Ho_Chi_Minh' }
                );
            }

            sourceElement.textContent =
                'Nguồn: ' + data.source + ' · ' + timeText;
        }
    } catch (error) {
        buyElement.textContent = 'Chưa có dữ liệu';
        sellElement.textContent = 'Chưa có dữ liệu';
        console.error('Lỗi tải giá vàng:', error);
    }
}

loadNovaNewsGold();

(function () {
    const amountInput = document.getElementById('novanews-currency-amount');
    const fromSelect = document.getElementById('novanews-currency-from');
    const toSelect = document.getElementById('novanews-currency-to');
    const swapButton = document.getElementById('novanews-currency-swap');
    const resetButton = document.getElementById('novanews-currency-reset');
    const resultElement = document.getElementById('novanews-currency-result');
    const detailElement = document.getElementById('novanews-currency-detail');

    // Tỷ giá minh họa: số VND tương ứng với 1 đơn vị ngoại tệ.
    // Cần cập nhật thủ công; đây không phải tỷ giá trực tiếp.
    const rates = {
        VND: 1,
        USD: 26000,
        EUR: 30000,
        JPY: 175,
        KRW: 18
    };

    const numberFormat = new Intl.NumberFormat('vi-VN', {
        maximumFractionDigits: 4
    });

    function formatNumber(value) {
        return numberFormat.format(value);
    }

    function updateCurrency() {
        const amount = Number(amountInput.value);
        const from = fromSelect.value;
        const to = toSelect.value;

        if (amountInput.value.trim() === '' || !Number.isFinite(amount) || amount < 0) {
            resultElement.textContent = 'Nhập số tiền hợp lệ';
            detailElement.textContent = 'Số tiền phải lớn hơn hoặc bằng 0.';
            return;
        }

        const amountInVND = amount * rates[from];
        const result = amountInVND / rates[to];

        resultElement.textContent = formatNumber(result) + ' ' + to;
        detailElement.textContent =
            '1 ' + from + ' ≈ ' +
            formatNumber(rates[from] / rates[to]) + ' ' + to;
    }

    amountInput.addEventListener('input', updateCurrency);
    fromSelect.addEventListener('change', updateCurrency);
    toSelect.addEventListener('change', updateCurrency);

    swapButton.addEventListener('click', function () {
        const previousFrom = fromSelect.value;
        fromSelect.value = toSelect.value;
        toSelect.value = previousFrom;
        updateCurrency();
    });

    resetButton.addEventListener('click', function () {
        amountInput.value = '100';
        fromSelect.value = 'VND';
        toSelect.value = 'USD';
        updateCurrency();
    });

    updateCurrency();
})();

</script>
</body>
</html>

</body>
</html>
