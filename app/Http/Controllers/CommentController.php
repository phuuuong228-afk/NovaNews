<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, string $id)
    {
        $validated = $request->validate([
            'content' => ['required', 'string', 'min:2', 'max:2000'],
        ], [
            'content.required' => 'Bà hãy nhập nội dung bình luận.',
            'content.min' => 'Bình luận phải có ít nhất 2 ký tự.',
            'content.max' => 'Bình luận không được vượt quá 2000 ký tự.',
        ]);

        $post = Post::where('status', 'published')->findOrFail($id);

        Comment::create([
            'post_id' => $post->id,
            'user_id' => Auth::id(),
            'content' => $validated['content'],
            'status' => 'approved',
        ]);

        return redirect()
            ->route('posts.show', $post->id)
            ->with('success', 'Bình luận của bạn đã được đăng thành công!');
    }

    // Hiển thị trang sửa bình luận
    public function edit(string $id)
    {
        $comment = Comment::findOrFail($id);

        $this->authorizeComment($comment);

        return view('comments.edit', compact('comment'));
    }

    // Lưu nội dung bình luận đã sửa
    public function update(Request $request, string $id)
    {
        $comment = Comment::findOrFail($id);

        $this->authorizeComment($comment);

        $validated = $request->validate([
            'content' => ['required', 'string', 'min:2', 'max:2000'],
        ]);

        $comment->update([
            'content' => $validated['content'],
        ]);

        return redirect()
            ->route('posts.show', $comment->post_id)
            ->with('success', 'Bình luận đã được cập nhật!');
    }

    // Xóa bình luận
    public function destroy(string $id)
    {
        $comment = Comment::findOrFail($id);

        $this->authorizeComment($comment);

        $postId = $comment->post_id;
        $comment->delete();

        return redirect()
            ->route('posts.show', $postId)
            ->with('success', 'Bình luận đã được xóa!');
    }

    // Chỉ chủ bình luận hoặc admin được sửa, xóa
    private function authorizeComment(Comment $comment): void
    {
        abort_unless(
            Auth::check()
            && (
                Auth::user()->role === 'admin'
                || (int) $comment->user_id === (int) Auth::id()
            ),
            403,
            'Bà không có quyền chỉnh sửa hoặc xóa bình luận này.'
        );
    }
}
