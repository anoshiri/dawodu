<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SocialShare extends Component
{
    public $title;

    public $url;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = 'Dawodu', $url = 'https://dawodu.com')
    {
        $this->title = $title;
        $this->url = url($url);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render()
    {
        return view('components.social-share');
    }
}
