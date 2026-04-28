<?php

namespace App\View\Components;

use App\Models\Article;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\Component;

class GalleryNews extends Component
{
    public $articles;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $articles = Article::whereHas('category', function (Builder $query) {
            $query->isActive();
        })->with('category')
            ->isActive()->isGalleryArticle()
            ->orderBy('created_at', 'desc')->limit(10)->get();

        if ($articles->count() < 1) {
            $articles = Article::whereHas('category', function (Builder $query) {
                $query->isActive();
            })->with('category')
                ->isActive()
                ->orderBy('created_at', 'desc')->limit(10)->get();
        }

        $this->articles = $articles;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render()
    {
        return view('components.gallery-news');
    }
}
