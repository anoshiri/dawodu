<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tourism;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TourismController extends Controller
{
    public function index($number = 20): JsonResponse
    {
        $sites = Tourism::orderBy('sort')->orderBy('title')->isActive()->paginate($number);

        return response()->json([
            'data' => [
                'sites' => $sites,
            ],
        ]);
    }

    public function show($slug): JsonResponse
    {
        // if number is sent instead of slug
        if (is_numeric($slug) && $slug > 0) {
            return $this->index($slug);
        }

        // get slug
        if (! $site = Tourism::isActive()->find(getIdFromSlug($slug))) {
            return $this->index();
        }

        return response()->json([
            'data' => [
                'site' => $site,
                'sites' => Tourism::where('id', '<>', $site->id ?? '')->orderBy('sort')->orderBy('title')->isActive()->limit(20)->get(),
                'others' => $this->getPreviousNext($site),
            ],
        ]);
    }

    public function search(Request $request): JsonResponse
    {
        $request->validate([
            'param' => 'required',
        ]);

        // get the title
        $sites = Tourism::where('title', 'like', '%'.$request->title.'%')
            ->orWhere('title', 'sounds like', $request->title)
            ->orderBy('sort', 'asc')
            ->orderBy('title', 'asc')
            ->isActive()
            ->paginate(10);

        return response()->json([
            'data' => [
                'sites' => $sites,
                'others' => [],
            ],
        ]);
    }

    private function getPreviousNext($site)
    {
        $previous = Tourism::where('id', '<', $site->id)->orderBy('id', 'desc')->first();
        $next = Tourism::where('id', '>', $site->id)->orderBy('id', 'desc')->first();

        return ['previous' => $previous, 'next' => $next];
    }
}
