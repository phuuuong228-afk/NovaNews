<?php

namespace App\Http\Controllers;

use App\Services\RssService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class RssController extends Controller
{
    public function index(Request $request, RssService $rssService)
    {
        $keyword = trim((string) $request->query('q', ''));

        $news = collect($rssService->getNews())
            ->filter(function ($item) use ($keyword) {
                return $keyword === ''
                    || str_contains(
                        mb_strtolower($item['title']),
                        mb_strtolower($keyword)
                    )
                    || str_contains(
                        mb_strtolower($item['source']),
                        mb_strtolower($keyword)
                    );
            })
            ->values();

        $perPage = 10;
        $page = LengthAwarePaginator::resolveCurrentPage();

        $items = $news->slice(($page - 1) * $perPage, $perPage)->values();

        $articles = new LengthAwarePaginator(
            $items,
            $news->count(),
            $perPage,
            $page,
            [
                'path' => $request->url(),
                'query' => $request->query(),
            ]
        );

        return view('rss.index', compact('articles', 'keyword'));
    }
}
