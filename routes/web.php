<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConstitutionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContributorController;
use App\Http\Controllers\DocumentLibraryController;
use App\Http\Controllers\EmbassyController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FederalRepresentativeController;
use App\Http\Controllers\FederalSenatorController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GeneralLinkController;
use App\Http\Controllers\GovernmentSiteController;
use App\Http\Controllers\HeadOfGovernmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PoliticalPartyController;
use App\Http\Controllers\PoliticianSiteController;
use App\Http\Controllers\StateGovernorController;
use App\Http\Controllers\VideoController;
use App\Models\Cms;
use App\Models\GovernmentOfficial;
use App\Models\NewsSource;
use App\Models\PoliticalParty;
use Illuminate\Support\Facades\Route;

Route::controller(PartnerController::class)->group(function () {
    Route::get('/partners/{slug}', 'show');
    Route::get('/partners', 'index');
});

Route::view('/contact', 'contact');
Route::post('/contact', [ContactController::class, 'send']);

Route::controller(DocumentLibraryController::class)->group(function () {
    Route::get('/document-library/search', 'search');
    Route::get('/document-library', 'index');
    Route::get('/document-library/{document}/{file?}', 'show');
});

Route::get('/photo-albums', [GalleryController::class, 'index']);
Route::get('/photo-albums/{album}', [GalleryController::class, 'show']);

// Video
Route::get('/videos', [VideoController::class, 'index']);
Route::get('/videos/search/{search}', [VideoController::class, 'search']);
Route::get('/videos/{video}', [VideoController::class, 'show']);

// Events
Route::get('/events', [EventController::class, 'index']);
Route::get('/events/{event}/{file?}', [EventController::class, 'show']);
Route::get('/events/search/{search}', [EventController::class, 'search']);

// government sites
Route::get('/political-parties', function () {
    $parties = PoliticalParty::orderBy('sort')->isActive()->get();

    return view('political_parties', compact('parties'));
});

// government sites
Route::get('/heads-of-government', [HeadOfGovernmentController::class, 'index']);

// Federal senator
Route::get('/state-governors/political-party/{parameter?}', [StateGovernorController::class, 'getPoliticalParty']);
Route::get('/state-governors/sort/{parameter}', [StateGovernorController::class, 'sort']);
Route::get('/state-governors/{constituency}', [StateGovernorController::class, 'constituency']);
Route::get('/state-governors', [StateGovernorController::class, 'index']);

// Federal senator
Route::get('/federal-senators/political-party/{parameter}', [FederalSenatorController::class, 'getPoliticalParty']);
Route::get('/federal-senators/sort/{parameter}', [FederalSenatorController::class, 'sort']);
Route::get('/federal-senators/{constituency}', [FederalSenatorController::class, 'constituency']);
Route::get('/federal-senators', [FederalSenatorController::class, 'index']);

// federal representatives
Route::get('/federal-representatives/political-party/{parameter}', [FederalRepresentativeController::class, 'getPoliticalParty']);
Route::get('/federal-representatives/sort/{parameter}', [FederalRepresentativeController::class, 'sort']);
Route::get('/federal-representatives/{constituency}', [FederalRepresentativeController::class, 'constituency']);
Route::get('/federal-representatives', [FederalRepresentativeController::class, 'index']);

// government official
Route::get('/government-officials', function () {
    return view('government_officials');
});

Route::get('/government-official/{official}', function ($official) {
    $official = GovernmentOfficial::isActive()->findOrFail(getIdFromSlug($official));

    return view('official', compact('official'));
});

// language
// Route::get('/language', [App\Http\Controllers\LanguageController::class, 'index']);
// Route::get('/language/{language?}/{word?}', [App\Http\Controllers\LanguageController::class, 'word']);
// Route::post('/language/search', [App\Http\Controllers\LanguageController::class, 'search']);

// government sites
Route::get('/government-sites', [GovernmentSiteController::class, 'index']);
Route::get('/government-sites/search', [GovernmentSiteController::class, 'search']);

// politicians sites
Route::get('/politicians-sites', [PoliticianSiteController::class, 'index']);
Route::get('/politicians-sites/search', [PoliticianSiteController::class, 'search']);

// general sites
Route::get('/general-links', [GeneralLinkController::class, 'index']);
Route::get('/general-links/search', [GeneralLinkController::class, 'search']);

// government sites
Route::get('/political-parties', [PoliticalPartyController::class, 'index']);
Route::get('/political-parties/search', [PoliticalPartyController::class, 'search']);

// nigeria embassies
Route::get('/nigerian-embassies/{country?}', [EmbassyController::class, 'index']);

// news sources
Route::get('/news-sources', function () {
    $sources = [];
    foreach (config('dawodu.source_type') as $key => $source) {
        $sources[$key] = NewsSource::where('xtype', $key)->orderBy('title')->isActive()->get();
    }

    return view('news_sources', compact('sources'));
});

// show news feeds
Route::get('/news', [NewsController::class, 'index']);

// contributors
Route::get('/contributors/{contributor}', [ContributorController::class, 'show']);
Route::get('/contributors', [ContributorController::class, 'index']);

// nigerian constitution
Route::get('/nigerias-constitution/{section?}', [ConstitutionController::class, 'show']);

// Categories
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/category/{slug}', [CategoryController::class, 'show']);

// Articles
Route::get('/articles/search', [ArticleController::class, 'search']);
Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/articles/{slug}', [ArticleController::class, 'show']);

// home routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/dashboard', [HomeController::class, 'index']);

// artisan commands to clear and update
Route::get('/clear', function () {
    Artisan::call('optimize:clear');
});

Route::get('/{slug}', function ($slug) {
    $cms = Cms::whereSlug(trim($slug))->first();

    return view('cms', compact('cms'));
});

require __DIR__.'/settings.php';
