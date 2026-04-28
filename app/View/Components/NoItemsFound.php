<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NoItemsFound extends Component
{
    public $count;

    public $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(int $count, string $title = 'items')
    {
        $this->count = $count;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render()
    {
        return view('components.no-items-found');
    }
}
