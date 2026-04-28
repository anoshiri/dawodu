<?php

namespace App\View\Components;

use App\Models\Article;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Trending extends Component
{
    public $articles;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->articles = Article::whereHas('category', function (Builder $query) {
            $query->isActive();
        })->with('category')
            ->isActive()->isTrending()
            ->orderBy('created_at', 'desc')->limit(20)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render()
    {
        return view('components.trending');
    }
}
