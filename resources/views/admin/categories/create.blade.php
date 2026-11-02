
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thêm danh mục | NovaNews</title>
    <style>
        body { margin:0; background:#111; color:#f5f5f5; font-family:Arial,sans-serif; }
        .container { max-width:760px; margin:40px auto; padding:0 18px; }
        .panel { background:#1e1e1e; border:1px solid #333; border-radius:12px; padding:26px; }
        label { display:block; margin:18px 0 8px; }
        input, textarea {
            width:100%; padding:12px; border:1px solid #444;
            border-radius:6px; background:#151515; color:white; font-size:15px;
        }
        textarea { min-height:120px; resize:vertical; }
        .btn { display:inline-block; padding:11px 16px; border-radius:6px; border:1px solid #3984ff; background:#2167d5; color:white; cursor:pointer; text-decoration:none; }
        .secondary { background:transparent; border-color:#555; }
        .error { color:#ff9999; font-size:14px; margin-top:6px; }
        .muted { color:#aaa; }
        .actions { display:flex; gap:10px; margin-top:22px; flex-wrap:wrap; }
    </style>
</head>
<body>
<div class="container">
    <div class="panel">
        <h1 style="color:#3984ff">Thêm danh mục mới</h1>
        <p class="muted">Danh mục sẽ tự động được đưa vào bộ lọc trên trang chủ.</p>

        <form method="POST" action="{{ route('admin.categories.store') }}">
            @csrf

            <label for="name">Tên danh mục <span style="color:#ff7777">*</span></label>
            <input id="name" name="name" type="text"
                   value="{{ old('name') }}" maxlength="100"
                   placeholder="Ví dụ: Kinh tế – Tài chính" required>
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="description">Mô tả</label>
            <textarea id="description" name="description" maxlength="1000"
                      placeholder="Giới thiệu ngắn về chủ đề này...">{{ old('description') }}</textarea>
            @error('description')
                <div class="error">{{ $message }}</div>
            @enderror

            <p class="muted">Đường dẫn slug sẽ được tạo tự động từ tên danh mục.</p>

            <div class="actions">
                <button class="btn" type="submit">Lưu danh mục</button>
                <a class="btn secondary" href="{{ route('admin.categories.index') }}">Quay lại</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>
