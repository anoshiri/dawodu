<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PartnerController extends Controller
{
    public function index(): View
    {
        $partners = Partner::orderBy('sort')->orderBy('title')
            ->isActive()->paginate(10);

        return view('partners', compact('partners'));
    }

    public function show(Request $request): View
    {
        $itemId = getIdFromSlug($request->route('slug'));
        $partner = Partner::findOrFail($itemId);

        return view('partners', compact('partner'));
    }
}
