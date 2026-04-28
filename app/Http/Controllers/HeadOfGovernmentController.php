<?php

namespace App\Http\Controllers;

use App\Models\GovernmentOfficial;

class HeadOfGovernmentController extends Controller
{
    public function index()
    {
        $officials = GovernmentOfficial::orderBy('tenure_end', 'desc')
            ->orderBy('first_name')
            ->orderBy('last_name')
            ->isHeadOfGovernment()
            ->isActive()
            ->paginate(10);

        return view('heads_of_government', compact('officials'));
    }
}
