<?php

namespace App\View\Components;

use App\Models\Video;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SideVideos extends Component
{
    public $videos;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->videos = Video::isActive()
            ->orderBy('featured', 'desc')
            ->orderBy('publication_date', 'desc')
            ->isActive()
            ->limit(4)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render()
    {
        return view('components.side-videos');
    }
}
