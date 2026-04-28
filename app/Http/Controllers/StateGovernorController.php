<?php

namespace App\Http\Controllers;

use App\Models\GovernmentOfficial;
use Illuminate\Support\Facades\DB;

class StateGovernorController extends Controller
{
    public function index($sortBy = '')
    {

        return view('governors', [
            'title' => 'Political Profile/Affiliation',
            'sortBy' => $sortBy,
            'stats' => [
                'byParty' => GovernmentOfficial::select('political_party', DB::Raw('count(id) as number_of_officials_by_political_party'))
                    ->when($sortBy, function ($query) use ($sortBy) {
                        $sort = 'asc';
                        if ($sortBy == 'number_of_officials_by_political_party') {
                            $sort = 'desc';
                        }

                        return $query->orderBy($sortBy, $sort);
                    })
                    ->orderBy('political_party')
                    ->groupBy('political_party')
                    ->isGovernor()
                    ->isActive()->get(),
            ],
        ]);
    }

    public function getPoliticalParty($parameter = '')
    {
        // get constituency
        $officials = GovernmentOfficial::orderBy('tenure_end', 'desc')
            ->orderBy('first_name')
            ->orderBy('last_name')
            ->where('political_party', $parameter)
            ->orderBy('tenure_end', 'desc')
            ->isGovernor()
            ->isActive()
            ->paginate(10);

        $title = 'Governors affiliated with: '.$parameter;

        return view('governors', compact('officials', 'title'));
    }

    public function sort($parameter = 'political_party')
    {
        return $this->index($parameter);
    }

    public function constituency($constituency)
    {
        $officials = GovernmentOfficial::orderBy('tenure_end', 'desc')
            ->orderBy('first_name')
            ->orderBy('last_name')
            ->when($constituency, function ($query) use ($constituency) {
                return $query->where('state_id', getIdFromSlug($constituency));
            })
            ->isGovernor()
            ->isActive()
            ->paginate(10);

        $title = 'Governors of '.config('dawodu.states')[getIdFromSlug($constituency)].' State.';

        return view('governors', compact('officials', 'title'));
    }
}
