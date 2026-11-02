<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $baseQuery = Post::with(['category', 'user'])
            ->where('status', 'published');

        $featuredPost = (clone $baseQuery)
            ->latest('published_at')
            ->first();

        $query = Post::with(['category', 'user'])
            ->where('status', 'published');

        if ($request->filled('keyword')) {
            $keyword = trim($request->input('keyword'));

            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                    ->orWhere('excerpt', 'like', "%{$keyword}%")
                    ->orWhere('content', 'like', "%{$keyword}%");
            });
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        // Sắp xếp bài viết
        $sort = $request->input('sort', 'latest');

        if ($sort === 'popular') {
            $query->orderByDesc('views')
                ->orderByDesc('published_at');
        } else {
            $sort = 'latest';
            $query->latest('published_at');
        }

        $posts = $query
            ->paginate(9)
            ->withQueryString();

        $categories = Category::withCount([
            'posts' => function ($q) {
                $q->where('status', 'published');
            }
        ])->orderBy('name')->get();

        $totalPublished = Post::where('status', 'published')->count();
        // Lấy 3 bài viết mới nhất cho tiện ích Tin nhanh
$latestPosts = Post::with('category')
    ->where('status', 'published')
    ->whereNotNull('published_at')
    ->where('published_at', '<=', now())
    ->orderByDesc('published_at')
    ->orderByDesc('id')
    ->take(3)
    ->get();
        $coverflowPosts = Post::where('status', 'published')
                    ->orderByDesc('published_at')
                    ->orderByDesc('id')
                    ->take(5)
                    ->get();
        return view('welcome', compact(
    'posts',
    'featuredPost',
    'categories',
    'totalPublished',
    'sort',
    'coverflowPosts',
    'latestPosts'
));
        
    }
}
