<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\DataRepositoryInterface;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    private DataRepositoryInterface $articleRepository;

    public function __construct(DataRepositoryInterface $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function getSection($section)
    {

        if ($section == 'most-viewed') {
            return response()->json([
                'data' => Article::whereHas('category', function (Builder $query) {
                    $query->isActive();
                })
                    ->with('category')
                    ->isActive()
                    ->orderBy('views', 'desc')
                    ->orderBy('publication_date', 'desc')
                    ->orderBy('subject')
                    ->paginate(20),
            ]);
        }

        return response()->json([
            'data' => Article::whereHas('category', function (Builder $query) {
                $query->isActive();
            })
                ->where('sections', 'like', '%'.$section.'%')
                ->with('category')
                ->isActive()
                ->orderBy('publication_date', 'desc')
                ->paginate(20),
        ]);
    }

    public function getByCategory($slug)
    {
        return response()->json([
            'articles' => Article::whereHas('category', function (Builder $query) {
                $query->isActive();
            })->where('category_id', getIdFromSlug($slug))
                ->with('category')->isActive()
                ->orderBy('publication_date', 'desc')
                ->orderBy('subject')
                ->paginate(15),

            'category' => Category::find(getIdFromSlug($slug, 'last')),
        ]);
    }

    public function getCategories(): JsonResponse
    {
        return response()->json([
            'categories' => Category::withCount(['articles' => function ($query) {
                $query->isActive();
            }])->isActive()->get(),
        ]);
    }

    public function index(): JsonResponse
    {
        return response()->json([
            'data' => $this->articleRepository->getFew(),
        ]);
    }

    public function show(Request $request): JsonResponse
    {
        $itemId = $request->route('slug');

        return response()->json([
            'data' => $this->articleRepository->getById($itemId),
        ]);
    }

    public function search(Request $request): JsonResponse
    {
        $parameter = $request->param;

        return response()->json([
            'data' => $this->articleRepository->getBySearch($parameter),
            'param' => $parameter,
        ]);
    }
}
