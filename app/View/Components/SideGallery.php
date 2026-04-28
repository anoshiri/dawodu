<?php

namespace App\View\Components;

use App\Models\Gallery;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SideGallery extends Component
{
    public $gallery;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->gallery = Gallery::with('images')
            ->isActive()->orderBy('publication_date')->first();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render()
    {
        return view('components.side-gallery');
    }
}
