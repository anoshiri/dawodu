<?php

namespace App\View\Components;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
{
    public $articles;

    public $trending;

    public $categories;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->categories = Category::get();

        $this->articles = Article::whereHas('category', function (Builder $query) {
            $query->isActive();
        })->with('category')
            ->isActive()
            ->orderBy('created_at', 'desc')->limit(5)->get();

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render()
    {
        return view('partials.footer');
    }
}
