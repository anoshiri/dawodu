<?php

namespace App\View\Components;

use App\Models\Contributor;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SideContributor extends Component
{
    public $contributors;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->contributors = Contributor::withCount('articles')->isActive()->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render()
    {
        return view('components.side-contributor');
    }
}
