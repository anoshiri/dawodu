<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\LanguageQuiz;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function post_answers(Request $request)
    {
        // submitted answers
        $answers = $request->answers;

        // initialize variables
        $total_score = 0;

        // get quiz and questions
        $quiz = LanguageQuiz::with('questions')->find($request->quiz_id);

        // calculate percentage score

        foreach ($quiz->questions as $question) {
            if ($question->options[0] == $answers[$question->id]) {
                $total_score++;
            }
        }

        $percentage = round($total_score / $quiz->questions->count() * 100);

        // update quiz
        $quiz->number_of_test = $quiz->number_of_test + 1;
        $quiz->total_score = $quiz->total_score + $percentage;
        $quiz->save();

        return response()->json([
            'data' => [
                'quiz' => $quiz,
                'score' => $percentage,
            ],
        ]);
    }

    public function quizzes($language)
    {
        return response()->json([
            'quizzes' => LanguageQuiz::withCount('questions')
                ->isActive()
                ->where('language', $language)
                ->orderBy('sort')
                ->paginate(10),
        ]);
    }

    public function quiz($slug)
    {
        $quiz_id = getIdFromSlug($slug);

        return response()->json([
            'quiz' => LanguageQuiz::with(['questions' => function ($query) {
                return $query->inRandomOrder()->isActive();
            }])->find($quiz_id),
        ]);
    }

    public function index(): JsonResponse
    {
        $word = Language::inRandomOrder()->isActive()->first();

        return response()->json([
            'data' => [
                'word' => $word,
                'words' => Language::where('word', '<>', $word->word)->inRandomOrder()->isActive()->limit(20)->get(),
                'others' => $this->getPreviousNext($word),
            ],
        ]);
    }

    public function list()
    {
        return response()->json([
            'languages' => config('dawodu.languages'),
        ]);
    }

    public function word($language = 'Edo', $word = ''): JsonResponse
    {
        $language = ucfirst($language);

        if (! empty($word)) {
            $word = Language::where('language', $language)->where('id', getIdFromSlug($word))->isActive()->first();
        } else {
            $word = Language::where('language', $language)->isActive()->inRandomOrder()->first();
        }

        return response()->json([
            'data' => [
                'word' => $word,
                'words' => Language::where('id', '<>', $word->id ?? '')->where('language', $language)->isActive()->inRandomOrder()->limit(20)->get(),
                'others' => $this->getPreviousNext($word),
            ],
        ]);
    }

    public function search(Request $request): JsonResponse
    {
        $request->validate([
            'param' => 'required',
        ]);

        // get the word
        $word = Language::isActive()
            ->where('word', $request->param)
            ->orWhere('word', 'sounds like', $request->param)
            ->orWhere('word', 'like', '%'.$request->param.'%')
            ->first();

        return response()->json([
            'data' => [
                'word' => $word,
                'words' => Language::where('id', '<>', $word->id ?? 0)->inRandomOrder()->isActive()->limit(20)->get(),
                'others' => $this->getPreviousNext($word),
            ],
        ]);
    }

    private function getPreviousNext($word)
    {
        $previous = Language::where('id', '<', $word->id ?? 0)->where('language', '=', $word->language ?? 'Edo')->orderBy('id', 'desc')->first();
        if (! $previous) {
            $previous = Language::where('language', $word->language ?? 'Edo')->orderBy('id', 'desc')->first();
        }

        $next = Language::where('id', '>', $word->id ?? 0)->where('language', '=', $word->language ?? 'Edo')->orderBy('id')->first();
        if (! $next) {
            $next = Language::where('language', $word->language ?? 'Edo')->orderBy('id')->first();
        }

        return ['previous' => $previous, 'next' => $next];
    }
}
