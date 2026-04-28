<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {

        $news = News::orderBy('publication_date', 'desc')->paginate(10);

        return view('news', compact('news'));
    }
}
