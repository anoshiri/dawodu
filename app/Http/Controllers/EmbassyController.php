<?php

namespace App\Http\Controllers;

use App\Models\Embassy;

class EmbassyController extends Controller
{
    public function index($country = false)
    {
        $embassies = [];
        $countries = [];

        if ($country) {
            $embassies = Embassy::orderBy('city')->where('country', $country)->isActive()->get();
        } else {
            $countries = config('dawodu.countries');
            asort($countries);
            $keys = '"'.implode('","', array_keys($countries)).'"';

            // get all listed countries
            $countries = Embassy::select('country')
                ->orderByRaw('FIELD(country, '.$keys.')')->distinct('country')->isActive()->paginate(20);
        }

        return view('embassies', compact('embassies', 'countries'));
    }
}
