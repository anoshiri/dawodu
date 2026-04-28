<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'events' => Event::orderBy('sort')
                ->orderBy('start_date')
                ->orderBy('start_time')
                ->whereDate('end_date', '>', new Carbon('yesterday'))
                ->isActive()->paginate(10),

            'past' => Event::orderBy('sort')
                ->orderBy('end_date', 'desc')
                ->orderBy('start_time', 'desc')
                ->whereDate('end_date', '<', new Carbon('today'))
                ->isActive()->paginate(10),
        ]);
    }

    public function show($slug, $file = false)
    {
        $event = Event::findOrFail(getIdFromSlug($slug));

        // get document if $file
        if ($file) {
            $file_id = getIdFromSlug($file);

            return Storage::download($event->documents[$file_id]);
        }

        return response()->json([
            'event' => Event::isActive()->find(getIdFromSlug($slug)),
        ]);
    }
}
