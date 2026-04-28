<?php

namespace App\Http\Controllers;

use App\Models\SiteLink;
use Illuminate\Http\Request;

class PoliticalPartyController extends Controller
{
    public function index()
    {
        $sites = SiteLink::orderBy('title')->isPoliticalParty()->isActive()->paginate(10);

        return view('political_parties', compact('sites'));
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
            ->orderBy('title')
            ->isPoliticalParty()
            ->isActive()->paginate(10)->withQueryString();

        return view('political_parties', compact('sites', 'param'));
    }
}
