<?php

namespace App\Http\Controllers;

use App\Models\FederalConstituency;
use App\Models\GovernmentOfficial;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FederalRepresentativeController extends Controller
{
    public function index($sortBy = '')
    {
        $constituencies = $this->getConstituencies();

        return view('representative', [
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
                    ->isRepresentative()->isActive()->get(),
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
            ->isRepresentative()
            ->isActive()
            ->paginate(10);

        $constituencies = $this->getConstituencies();
        $title = 'Federal representatives affiliated with: '.$parameter;

        return view('representative', compact('officials', 'constituencies', 'title'));
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
                return $query->where('constituency_id', getIdFromSlug($constituency));
            })
            ->isRepresentative()
            ->isActive()
            ->paginate(10);

        $constituencies = $this->getConstituencies();
        $title = 'Members representing '.Str::title(str_replace('-', ' ', $constituency)).' federal constituency.';

        return view('representative', compact('officials', 'constituencies', 'title'));
    }

    private function getConstituencies()
    {
        $items = FederalConstituency::select('state_id', 'title')->get();
        $constituencies = [];

        foreach ($items as $item) {
            $stateId = $item->state_id->value;

            if (! isset($constituencies[$stateId])) {
                $constituencies[$stateId] = [];
            }

            $url = '/federal-representatives/'.Str::slug($item->title.' '.$item->id);
            array_push($constituencies[$stateId], ['url' => $url, 'title' => $item->title]);
        }

        return $constituencies;
    }
}
