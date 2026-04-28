<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Contributor;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ContributorController extends Controller
{
    public function index()
    {
        $contributors = Contributor::withCount(['articles' => function (Builder $query) {
            $query->isActive();
        }])
            ->orderBy('first_name')->orderBy('last_name')->isActive()->get();

        return view('contributors', compact('contributors'));
    }

    public function show($slug, Request $request)
    {
        // get contributor
        $contributor = Contributor::withCount(['articles' => function (Builder $query) {
            $query->isActive();
        }])->findOrFail(getIdFromSlug($slug));

        // get contributor articles
        $articles = Article::whereHas('category', function (Builder $query) {
            $query->isActive();
        })->where('contributor_id', $contributor->id)
            ->orderBy('publication_date', 'desc')
            ->isActive()->paginate(10);

        return view('contributors', compact('contributor', 'articles'));
    }
}
