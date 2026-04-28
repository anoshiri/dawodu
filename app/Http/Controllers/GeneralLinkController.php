<?php

namespace App\Http\Controllers;

use App\Models\SiteLink;
use Illuminate\Http\Request;

class GeneralLinkController extends Controller
{
    public function index()
    {
        $sites = SiteLink::orderBy('sort')->orderBy('title')->isGeneralLink()->isActive()->paginate(10);

        return view('general_links', compact('sites'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'param' => 'required',
        ]);

        $param = $request->param;

        // get the param
        $sites = SiteLink::where('title', 'like', '%'.$request->param.'%')
            ->orWhere('url', 'like', '%'.$request->param.'%')
            ->orWhere('short', 'like', '%'.$request->param.'%')
            ->orWhere('blog', 'like', '%'.$request->param.'%')
            ->orWhere('tags', 'like', '%'.$request->param.'%')
            ->orderBy('sort')->orderBy('title')
            ->isGeneralLink()
            ->isActive()->paginate(10)->withQueryString();

        return view('general_links', compact('sites', 'param'));
    }
}
