<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SiteLink;
use Illuminate\Http\JsonResponse;

class SiteLinksController extends Controller
{
    public function infolinks()
    {
        return $this->getSites(5); // info-links = 5
    }

    private function getSites($type = 1): JsonResponse
    {
        return response()->json([
            'data' => SiteLink::orderBy('sort')
                ->orderBy('title')
                ->where('xtype', $type)
                ->isActive()
                ->paginate(10),
        ]);
    }

    public function show($slug)
    {
        return response()->json([
            'data' => SiteLink::isActive()->find(getIdFromSlug($slug)),
        ]);
    }
}
