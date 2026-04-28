<?php

namespace App\View\Components;

use App\Models\News;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Topbar extends Component
{
    public $flash;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $date = News::orderBy('publication_date', 'desc')->first()->publication_date ?? date('Y-m-d');
        $this->flash = News::where('publication_date', $date)
            ->orderBy('publication_date', 'desc')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render()
    {
        return view('partials.topbar');
    }
}
