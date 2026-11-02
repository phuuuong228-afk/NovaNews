<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class MarketDataController extends Controller
{
    public function gold()
    {
        try {
            $gold = Cache::remember('novanews_gold_sjc', 240, function () {
                $response = Http::timeout(10)
                    ->withHeaders([
                        'Accept' => 'application/json',
                    ])
                    ->get('https://taichinh.com/api/v1/gold');

                $response->throw();

                $data = $response->json();
                $doji = $data['sjc']['doji'] ?? null;

                if (!$doji ||
                    !isset($doji['buy'], $doji['sell'])) {
                    throw new \RuntimeException(
                        'Dữ liệu giá vàng không hợp lệ.'
                    );
                }

                return [
                    'buy' => $doji['buy'],
                    'sell' => $doji['sell'],
                    'observed_at' => $doji['observed_at'] ?? null,
                    'source' => 'DOJI / taichinh.com',
                    'unit' => 'VND/lượng',
                ];
            });

            return response()->json($gold);

        } catch (\Throwable $e) {
            report($e);

            return response()->json([
                'error' => 'Chưa lấy được dữ liệu giá vàng.',
            ], 502);
        }
    }
}
