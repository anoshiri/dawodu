<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function show($slug, $file = false)
    {
        $event = Event::findOrFail(getIdFromSlug($slug));

        // get document if $file
        if ($file) {
            $file_id = getIdFromSlug($file);

            return Storage::download($event->documents[$file_id]);
        }
    }
}
