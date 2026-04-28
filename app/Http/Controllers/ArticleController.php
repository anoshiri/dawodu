<?php

namespace App\Http\Controllers;

use App\Interfaces\DataRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    private DataRepositoryInterface $articleRepository;

    public function __construct(DataRepositoryInterface $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function index(): View
    {
        $articles = $this->articleRepository->getAll();

        return view('articles', compact('articles'));
    }

    public function show(Request $request): View
    {
        $itemId = $request->route('slug');
        $article = $this->articleRepository->getById($itemId);

        return view('article', ['article' => $article]);
    }

    public function search(Request $request): View
    {
        $param = $request->param;

        $articles = $this->articleRepository->getBySearch($param);

        return view('articles', compact('articles', 'param'));
    }
}
