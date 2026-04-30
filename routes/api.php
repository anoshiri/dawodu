<?php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// send contact information
Route::post('/newsletter', [App\Http\Controllers\Api\NewsletterController::class, 'subscribe']);

// send contact information
Route::post('/contact', [App\Http\Controllers\Api\ContactController::class, 'send']);


Route::controller(App\Http\Controllers\Api\SiteLinksController::class)->group(function () {
    Route::get('/info-links', 'infolinks'); // get only info-links types
});


Route::controller(App\Http\Controllers\Api\DocumentLibraryController::class)->group(function () {
    Route::get('/document-library/search', 'search');
    Route::get('/document-library', 'index');
    Route::get('/document-library/{document}/{file?}', 'show');
});


Route::controller(App\Http\Controllers\Api\EventController::class)->group(function () {
    Route::get('/events', 'index');
    Route::get('/events/{slug}/{file?}', 'show');
});

Route::get('/adverts/side', function () {
    return response()->json([
        'advert' => App\Models\Advert::isActive()->isSideButton()->orderBy('sort', 'ASC')->inRandomOrder()->first()
    ]);
});


Route::get('/messages/{slug}', function ($slug) {
    return response()->json([
        'message' => App\Models\Message::where('slug', $slug)->first()
    ]);
});

Route::controller(App\Http\Controllers\Api\TourismController::class)->group(function () {
    Route::get('/tourism', 'index');
    Route::get('/tourism/search', 'search');
    Route::get('/tourism/{slug}', 'show');
});

Route::controller(App\Http\Controllers\Api\LanguageController::class)->group(function () {
    Route::get('/language', 'index');
    Route::get('/language/search', 'search');

    Route::get('/language/quizzes/{language}', 'quizzes');
    Route::get('/language/quiz/{quiz}', 'quiz');
    Route::post('/language/quiz', 'post_answers');
    
    Route::get('/language/list', 'list');
    Route::get('/language/{language}/{word?}', 'word');
});


Route::controller(App\Http\Controllers\Api\VideoController::class)->group(function () {
    Route::get('/videos', 'index');
    Route::get('/videos/search', 'search');
    Route::get('/videos/{slug}', 'show');
});


Route::controller(App\Http\Controllers\Api\GalleryController::class)->group(function () {
    Route::get('/photo-albums', 'index');
    Route::get('/photo-albums/latest', 'latest');
    Route::get('/photo-albums/{slug}', 'show');
});


Route::controller(App\Http\Controllers\Api\NewsController::class)->group(function () {
    Route::get('/latest-news', 'index');
    Route::get('/news/sources', 'sources');
});


Route::controller(App\Http\Controllers\Api\ArticleController::class)->group(function () {
    Route::get('/articles/search', 'search');
    Route::get('/articles', 'index');
    Route::get('/category/{category}', 'getByCategory');
    Route::get('/categories', 'getCategories');
    Route::get('/articles/section/{section}', 'getSection');
    Route::get('/articles/{slug}', 'show');
});

Route::controller(App\Http\Controllers\Api\CmsController::class)->group(function () {
    Route::get('/slug/{slug}', 'show');
});


Route::controller(App\Http\Controllers\Api\OptionController::class)->group(function() {
    Route::get('/settings', 'index');
});
