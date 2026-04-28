<?php

namespace App\View\Components;

use App\Models\Advert;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SideAdvert extends Component
{
    public $adverts;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->adverts = Advert::isActive()
            ->isSideButton()->limit(2)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render()
    {
        return view('components.side-advert');
    }
}
