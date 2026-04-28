<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ReturnToPreviousPage extends Component
{
    public $url;

    public $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($url = '', $title = 'Index Page')
    {
        $this->url = url()->previous();

        if ($url) {
            $this->url = $url;
        }

        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render()
    {
        return view('components.return-to-previous-page');
    }
}
