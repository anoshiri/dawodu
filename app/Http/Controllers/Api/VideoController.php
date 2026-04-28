<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => Video::isActive()
                ->orderBy('featured')
                ->orderBy('publication_date', 'desc')
                ->orderBy('title')->paginate(10),
        ]);
    }

    public function show($slug)
    {
        return response()->json([
            'data' => Video::findOrFail(getIdFromSlug($slug)),
        ]);
    }

    public function search(Request $request)
    {
        $request->validate([
            'param' => 'required',
        ]);

        $param = $request->param;

        // get the param
        return response()->json([
            'data' => Video::where('title', 'like', '%'.$request->param.'%')
                ->orWhere('url', 'like', '%'.$request->param.'%')
                ->orWhere('length', 'like', '%'.$request->param.'%')
                ->orWhere('blog', 'like', '%'.$request->param.'%')
                ->orWhere('tags', 'like', '%'.$request->param.'%')
                ->orderBy('featured', 'desc')
                ->orderBy('publication_date', 'desc')->orderBy('title')
                ->isActive()->paginate(11)->withQueryString(),
        ]);
    }
}
