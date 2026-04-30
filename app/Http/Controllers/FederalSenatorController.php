<?php

namespace App\Http\Controllers;

use App\Models\GovernmentOfficial;
use App\Models\SenatorialZone;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FederalSenatorController extends Controller
{
    public function index($sortBy = '')
    {
        $constituencies = $this->getConstituencies();

        return view('senate', [
            'title' => 'Political Profile/Affiliation',
            'constituencies' => $constituencies,
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
                    ->isSenator()
                    ->isActive()->get(),
            ],
        ]);
    }

    public function getPoliticalParty($parameter = '')
    {
        // get constituency
        $officials = GovernmentOfficial::orderBy('tenure_end', 'desc')
            ->orderBy('first_name', 'asc')
            ->orderBy('last_name', 'asc')
            ->where('political_party', $parameter)
            ->isSenator()
            ->isActive()
            ->paginate(10);

        $constituencies = $this->getConstituencies();
        $title = 'Senators affiliated with: '.$parameter;

        return view('senate', compact('officials', 'constituencies', 'title'));
    }

    public function sort($parameter = 'political_party')
    {
        return $this->index($parameter);
    }

    public function constituency($constituency)
    {
        // get constituency
        $officials = GovernmentOfficial::orderBy('tenure_end', 'desc')
            ->orderBy('first_name', 'asc')
            ->orderBy('last_name', 'asc')
            ->when($constituency, function ($query) use ($constituency) {
                return $query->where('constituency_id', getIdFromSlug($constituency));
            })
            ->isSenator()
            ->isActive()
            ->paginate(10);

        $constituencies = $this->getConstituencies();

        $title = 'Members representing '.Str::title(str_replace('-', ' ', $constituency)).' senatorial zone.';

        return view('senate', compact('officials', 'constituencies', 'title'));
    }

    private function getConstituencies()
    {
        $items = SenatorialZone::select('state_id', 'title')->get();
        $constituencies = [];

        foreach ($items as $item) {
            $stateId = $item->state_id->value;

            if (! isset($constituencies[$stateId])) {
                $constituencies[$stateId] = [];
            }

            $url = '/federal-senators/'.Str::slug($item->title.' '.$item->id);
            array_push($constituencies[$stateId], ['url' => $url, 'title' => $item->title]);
        }

        return $constituencies;
    }
}
