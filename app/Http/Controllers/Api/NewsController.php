<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsSource;
use Illuminate\Http\JsonResponse;

class NewsController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'data' => News::orderBy('publication_date', 'desc')->paginate(10),
        ]);
    }

    public function sources(): JsonResponse
    {
        foreach (config('dawodu.source_type') as $key => $source) {
            $sources[$key] = NewsSource::where('xtype', $key)->orderBy('title')->isActive()->get();
        }

        return response()->json([
            'sources' => $sources,
            'types' => config('dawodu.source_type'),
        ]);
    }
}
