<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Settings\GeneralSettings;
use Illuminate\Http\JsonResponse;

class OptionController extends Controller
{
    public function index(): JsonResponse
    {
        $settings = app(GeneralSettings::class);

        return response()->json([
            'data' => [
                'street' => $settings->street,
                'locality' => $settings->locality,
                'city' => $settings->city,
                'state' => $settings->state,
                'code' => $settings->code,
                'country' => $settings->country,
                'phone' => $settings->phone,
                'email' => $settings->email,
                'twitter' => $settings->twitter,
                'facebook' => $settings->facebook,
                'instagram' => $settings->instagram,
                'tiktok' => $settings->tiktok,
                'linkedin' => $settings->linkedin,
                'whatsapp' => $settings->whatsapp,
                'youtube' => $settings->youtube,
                'news_rss_feed' => $settings->news_rss_feed,
            ],
        ]);
    }
}
