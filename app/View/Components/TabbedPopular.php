<?php

namespace App\View\Components;

use App\Models\Article;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TabbedPopular extends Component
{
    public $articles;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->articles = Article::with('category')
            ->isActive()->isPopular()
            ->orderBy('created_at', 'desc')->limit(5)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render()
    {
        return view('components.tabbed-popular');
    }
}
