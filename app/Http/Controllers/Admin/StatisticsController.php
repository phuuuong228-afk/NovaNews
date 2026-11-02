<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function index()
    {
        // Thống kê tổng quan
        $totalPosts = Post::count();

        $publishedPosts = Post::where('status', 'published')->count();

        $draftPosts = Post::where('status', 'draft')->count();

        $totalCategories = Category::count();

        $totalUsers = User::count();

        $totalViews = (int) Post::sum('views');

        $totalComments = Comment::count();

        // Top 5 bài viết có lượt xem cao nhất
        $topPosts = Post::orderByDesc('views')
            ->take(5)
            ->get();

        // Số bài viết theo trạng thái
        $postsByStatus = Post::select('status', DB::raw('COUNT(*) as total'))
            ->groupBy('status')
            ->get();

        // Số bài viết xuất bản theo 6 tháng gần nhất
        $monthlyPosts = Post::whereNotNull('published_at')
            ->where('status', 'published')
            ->where('published_at', '>=', now()->subMonths(5)->startOfMonth())
            ->selectRaw("DATE_FORMAT(published_at, '%Y-%m') as month, COUNT(*) as total")
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Chuẩn bị dữ liệu biểu đồ trong Controller
$monthlyLabels = $monthlyPosts->map(function ($item) {
    return \Carbon\Carbon::createFromFormat(
        'Y-m',
        $item->month
    )->format('m/Y');
})->values();

$monthlyValues = $monthlyPosts->pluck('total')->values();

$statusLabels = $postsByStatus->pluck('status')->values();

$statusValues = $postsByStatus->pluck('total')->values();

return view('admin.statistics.index', compact(
    'totalPosts',
    'publishedPosts',
    'draftPosts',
    'totalCategories',
    'totalUsers',
    'totalViews',
    'totalComments',
    'topPosts',
    'postsByStatus',
    'monthlyPosts',
    'monthlyLabels',
    'monthlyValues',
    'statusLabels',
    'statusValues'
));
    }
}