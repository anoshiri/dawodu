<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index()
    {
        $word = Language::inRandomOrder()->isActive()->first();
        $words = Language::where('word', '<>', $word->word)->inRandomOrder()->isActive()->limit(20)->get();

        // get previous and next words
        $others = $this->getPreviousNext($word);

        return view('language', compact('words', 'word', 'others'));
    }

    public function word($language = 'Edo', $word = '')
    {
        $language = ucfirst($language);

        if (! empty($word)) {
            $word = Language::where('language', $language)->where('word', $word)->isActive()->first();
        } else {
            $word = Language::where('language', $language)->isActive()->inRandomOrder()->first();
        }

        // get previous and next words
        $others = $this->getPreviousNext($word);

        $words = Language::where('word', '<>', $word->word ?? '')->where('language', $language)->isActive()->inRandomOrder()->limit(20)->get();

        return view('language', compact('words', 'word', 'others'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'word' => 'required',
        ]);

        // get the word
        $word = Language::where('word', $request->word)->orWhere('word', 'sounds like', $request->word)->isActive()->first();

        // get previous and next words
        $others = $this->getPreviousNext($word);

        $words = Language::where('word', '<>', $word->word)->inRandomOrder()->isActive()->limit(20)->get();

        return view('language', compact('words', 'word', 'others'));
    }

    private function getPreviousNext($word)
    {
        $previous = Language::where('id', '<', $word->id)->where('language', $word->language)->orderBy('id', 'desc')->first();
        $next = Language::where('id', '>', $word->id)->where('language', $word->language)->orderBy('id', 'desc')->first();

        return ['previous' => $previous, 'next' => $next];
    }
}
