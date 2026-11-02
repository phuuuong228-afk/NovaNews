<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use SimpleXMLElement;
use Throwable;

class RssService
{
    private array $feeds = [
        [
            'name' => 'VnExpress',
            'url' => 'https://vnexpress.net/rss/tin-moi-nhat.rss',
        ],
        [
            'name' => 'Tuổi Trẻ',
            'url' => 'https://tuoitre.vn/rss/tin-moi-nhat.rss',
        ],
    ];

    public function getNews(): array
    {
        $news = [];

        foreach ($this->feeds as $feed) {
            try {
                $response = Http::timeout(10)
                    ->withHeaders([
                        'User-Agent' => 'NovaNews RSS Reader/1.0',
                    ])
                    ->get($feed['url']);

                if (! $response->successful()) {
                    continue;
                }

                $xml = simplexml_load_string(
                    $response->body(),
                    SimpleXMLElement::class,
                    LIBXML_NONET | LIBXML_NOCDATA
                );

                if (! $xml || ! isset($xml->channel->item)) {
                    continue;
                }

                foreach ($xml->channel->item as $item) {
                    $description = (string) ($item->description ?? '');

                    $news[] = [
                        'source' => $feed['name'],
                        'title' => trim((string) ($item->title ?? '')),
                        'link' => trim((string) ($item->link ?? '')),
                        'description' => trim(strip_tags($description)),
                        'published_at' => trim((string) ($item->pubDate ?? '')),
                    ];
                }
            } catch (Throwable $e) {
                report($e);
            }
        }

        usort($news, function ($a, $b) {
            $timeA = strtotime($a['published_at']) ?: 0;
            $timeB = strtotime($b['published_at']) ?: 0;

            return $timeB <=> $timeA;
        });

        return $news;
    }
}
