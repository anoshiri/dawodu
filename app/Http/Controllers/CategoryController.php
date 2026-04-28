<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::select('id', 'title')
            ->withCount('articles')->isActive()->get();

        return view('categories', compact('categories'));
    }

    public function show($slug)
    {
        $id = getIdFromSlug($slug);

        $articles = Article::where('category_id', $id)
            ->with('category')->isActive()
            ->orderBy('created_at', 'DESC')->paginate(15);

        return view('category', compact('articles'));
    }
}
