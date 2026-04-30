<?php

namespace App\View\Components;

use App\Models\Article;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TabbedRelated extends Component
{
    public $articles;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(?Article $article = null)
    {
        if (! $article) {
            $this->articles = collect();

            return;
        }

        $related = $article->related;

        if (is_array($related) && count($related) > 0) {
            $this->articles = Article::whereHas('category', function (Builder $query) {
                $query->isActive();
            })->with('category')
                ->whereIn('id', $related)
                ->isActive()
                ->orderBy('created_at', 'desc')->limit(5)->get();

        } else {
            $this->articles = Article::whereHas('category', function (Builder $query) {
                $query->isActive();
            })->with('category')
                ->where('category_id', $article->category_id)
                ->isActive()
                ->orderBy('created_at', 'desc')->limit(5)->get();
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render()
    {
        return view('components.tabbed-related');
    }
}
