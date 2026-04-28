<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class App extends Component
{
    public $pageTitle;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = 'Welcome to Dawodu')
    {
        $this->pageTitle = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render()
    {
        return view('layout.app');
    }
}
