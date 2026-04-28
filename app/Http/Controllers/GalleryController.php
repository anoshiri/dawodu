<?php

namespace App\Http\Controllers;

use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::isActive()->orderBy('sort')->orderBy('publication_date', 'desc')
            ->orderBy('title')->paginate(10);

        return view('galleries', compact('galleries'));
    }

    public function show($slug)
    {
        $gallery = Gallery::with(['images' => function ($query) {
            return $query->orderBy('sort');
        }])->findOrFail(getIdFromSlug($slug));

        return view('gallery', compact('gallery'));
    }
}
