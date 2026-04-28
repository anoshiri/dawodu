<?php

namespace App\Repositories;

use App\Interfaces\DataRepositoryInterface;
use App\Models\Article;
use Illuminate\Database\Eloquent\Builder;

class ArticleRepository implements DataRepositoryInterface
{
    public function getAll()
    {
        return Article::whereHas('category', function (Builder $query) {
            $query->isActive();
        })
            ->with('category')
            ->orderBy('publication_date', 'desc')
            ->orderBy('subject')
            ->isActive()
            ->paginate(10);
    }

    public function getFew()
    {
        return Article::whereHas('category', function (Builder $query) {
            $query->isActive();
        })
            ->with('category')
            ->orderBy('publication_date', 'desc')
            ->orderBy('subject')
            ->isActive()
            ->paginate(6);
    }

    public function getById($slug)
    {
        return Article::whereHas('category', function (Builder $query) {
            $query->isActive();
        })->findOrFail(getIdFromSlug($slug));
    }

    public function getBySearch($parameter)
    {
        $parameters = explode(' ', $parameter);

        //  with contributors
        $contributors = Article::whereHas('category', function (Builder $query) {
            $query->isActive();
        })
            ->with('category')
            ->whereHas('contributor', function (Builder $query) use ($parameters) {
                foreach ($parameters as $parameter) {
                    $query->where('first_name', 'like', $parameter)
                        ->orWhere('last_name', 'like', $parameter)
                        ->orWhere('email', 'like', '%'.$parameter.'%');
                }
            })
            ->orderBy('publication_date', 'desc')
            ->orderBy('subject');

        // with content
        $content = Article::whereHas('category', function (Builder $query) {
            $query->isActive();
        })
            ->with('category')
            ->where(function ($query) use ($parameters) {
                foreach ($parameters as $parameter) {
                    $query->where('content', 'like', '%'.$parameter.'%');
                }
            })
            ->orderBy('publication_date', 'desc')
            ->orderBy('subject');

        // get the param
        return Article::whereHas('category', function (Builder $query) {
            $query->isActive();
        })
            ->with('category')
            ->where(function ($query) use ($parameters) {
                foreach ($parameters as $parameter) {
                    $query->where('subject', 'like', '%'.$parameter.'%')
                        ->orWhere('source', 'like', '%'.$parameter.'%')
                        ->orWhere('publication_date', 'like', '%'.$parameter.'%')
                        ->orWhere('sections', 'like', '%'.$parameter.'%')
                        ->orWhere('tags', 'like', '%'.$parameter.'%');
                }
            })
            ->orderBy('publication_date', 'desc')
            ->orderBy('subject')
            ->union($contributors)->union($content)

            ->isActive()
            ->paginate(10)
            ->withQueryString();
    }
}
