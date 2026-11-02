<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Hiển thị danh sách, tìm kiếm và lọc bài viết.
     */
    public function index(Request $request)
    {
        $query = Post::with(['category', 'user'])
            ->latest();

        // Tìm theo tiêu đề, mô tả hoặc nội dung.
        if ($request->filled('keyword')) {
            $keyword = trim($request->input('keyword'));

            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                    ->orWhere('excerpt', 'like', "%{$keyword}%")
                    ->orWhere('content', 'like', "%{$keyword}%");
            });
        }

        // Lọc theo chuyên mục.
        if ($request->filled('category_id')) {
            $query->where(
                'category_id',
                $request->input('category_id')
            );
        }

        // Lọc theo trạng thái.
        if (in_array($request->input('status'), ['draft', 'published'], true)) {
            $query->where('status', $request->input('status'));
        }

        $posts = $query->paginate(10)->withQueryString();

        $categories = Category::orderBy('name')->get();

        return view(
            'admin.posts.index',
            compact('posts', 'categories')
        );
    }

    /**
     * Hiển thị biểu mẫu thêm bài viết.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Tạo slug không trùng lặp.
     */
    private function makeUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($title);

        if ($baseSlug === '') {
            $baseSlug = 'bai-viet';
        }

        $slug = $baseSlug;
        $counter = 1;

        while (
            Post::withTrashed()
                ->where('slug', $slug)
                ->when($ignoreId, function ($query) use ($ignoreId) {
                    $query->where('id', '!=', $ignoreId);
                })
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    /**
     * Lưu bài viết mới.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'excerpt' => ['nullable', 'string', 'max:1000'],
            'content' => ['required', 'string'],
            'thumbnail' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
            'status' => ['required', 'in:draft,published'],
        ]);

        $validated['user_id'] = Auth::id() ?? 1;
        $validated['slug'] = $this->makeUniqueSlug($validated['title']);
        $validated['views'] = 0;
        $validated['published_at'] =
            $validated['status'] === 'published' ? now() : null;

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request
                ->file('thumbnail')
                ->store('posts', 'public');
        }

        Post::create($validated);

        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Thêm bài viết thành công!');
    }

    /**
     * Xem chi tiết bài viết trong khu vực quản trị.
     */
    public function show(string $id)
    {
        $post = Post::with(['category', 'user', 'comments', 'tags'])
            ->findOrFail($id);

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Hiển thị biểu mẫu sửa bài viết.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::orderBy('name')->get();

        return view(
            'admin.posts.edit',
            compact('post', 'categories')
        );
    }

    /**
     * Cập nhật bài viết.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'excerpt' => ['nullable', 'string', 'max:1000'],
            'content' => ['required', 'string'],
            'thumbnail' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
            'status' => ['required', 'in:draft,published'],
        ]);

        if ($post->title !== $validated['title']) {
            $validated['slug'] = $this->makeUniqueSlug(
                $validated['title'],
                (int) $post->id
            );
        }

        $oldThumbnail = $post->thumbnail;
        $newThumbnail = null;

        if ($request->hasFile('thumbnail')) {
            $newThumbnail = $request
                ->file('thumbnail')
                ->store('posts', 'public');

            $validated['thumbnail'] = $newThumbnail;
        } else {
            unset($validated['thumbnail']);
        }

        $validated['published_at'] =
            $validated['status'] === 'published'
                ? ($post->published_at ?? now())
                : null;

        try {
            $post->update($validated);
        } catch (\Throwable $exception) {
            // Xóa ảnh mới nếu cập nhật database thất bại.
            if ($newThumbnail) {
                Storage::disk('public')->delete($newThumbnail);
            }

            throw $exception;
        }

        // Chỉ xóa ảnh cũ sau khi cập nhật thành công.
        if ($newThumbnail && $oldThumbnail) {
            Storage::disk('public')->delete($oldThumbnail);
        }

        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Cập nhật bài viết thành công!');
    }

    /**
     * Xóa mềm bài viết.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Đã chuyển bài viết vào thùng rác!');
    }
}
