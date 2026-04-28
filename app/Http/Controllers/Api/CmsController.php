<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cms;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CmsController extends Controller
{
    public function show(Request $request): JsonResponse
    {
        $slug = $request->route('slug');

        return response()->json([
            'data' => Cms::whereSlug(trim($slug))->first(),
        ]);
    }
}
