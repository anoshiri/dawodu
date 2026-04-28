<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::orderBy('featured', 'desc')
            ->orderBy('publication_date', 'desc')
            ->isActive()->paginate(11);

        return view('videos', compact('videos'));
    }

    public function show($slug)
    {
        $video = Video::findOrFail(getIdFromSlug($slug));

        return view('video', compact('video'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'param' => 'required',
        ]);

        $param = $request->param;

        // get the param
        $videos = Video::where('title', 'like', '%'.$request->param.'%')
            ->orWhere('url', 'like', '%'.$request->param.'%')
            ->orWhere('length', 'like', '%'.$request->param.'%')
            ->orWhere('blog', 'like', '%'.$request->param.'%')
            ->orWhere('tags', 'like', '%'.$request->param.'%')
            ->orderBy('featured', 'desc')
            ->orderBy('publication_date', 'desc')->orderBy('title')
            ->isActive()->paginate(11)->withQueryString();

        return view('videos', compact('videos', 'param'));
    }
}
