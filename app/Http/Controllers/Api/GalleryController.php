<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => Gallery::isActive()
                ->orderBy('sort')
                ->orderBy('publication_date', 'desc')
                ->orderBy('title')->paginate(10),
        ]);
    }

    public function latest()
    {
        return response()->json([
            'gallery' => Gallery::with('images')->isActive()->orderBy('publication_date')->first(),
        ]);
    }

    public function show($slug)
    {
        return response()->json([
            'data' => Gallery::with(['images' => function ($query) {
                return $query->orderBy('sort');
            }])->findOrFail(getIdFromSlug($slug)),
        ]);
    }
}
