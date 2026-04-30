<?php

use App\Enums\GovernmentOfficialType;
use App\Enums\NigerianState;
use App\Models\Article;
use App\Models\Category;
use App\Models\Constitution;
use App\Models\Contributor;
use App\Models\DocumentLibrary;
use App\Models\FederalConstituency;
use App\Models\Gallery;
use App\Models\GovernmentOfficial;
use App\Models\Partner;
use App\Models\SenatorialZone;
use App\Models\User;
use App\Models\Video;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Support\Facades\Mail;

uses(LazilyRefreshDatabase::class);

// ─── Home ──────────────────────────────────────────────────────────────────

test('home page loads', function () {
    $this->get('/')->assertOk();
});

test('/home loads', function () {
    $this->get('/home')->assertOk();
});

test('/dashboard loads', function () {
    $this->get('/dashboard')->assertOk();
});

// ─── Contact ───────────────────────────────────────────────────────────────

test('contact page loads', function () {
    $this->get('/contact')->assertOk();
});

test('contact form fails validation without required fields', function () {
    $this->post('/contact')->assertSessionHasErrors(['fullName', 'subject', 'email', 'message']);
});

test('contact form sends successfully', function () {
    Mail::fake();

    $this->post('/contact', [
        'fullName' => 'John Doe',
        'subject' => 'Test subject line',
        'email' => 'john@example.com',
        'message' => 'This is a test message body long enough.',
    ])->assertOk();
});

// ─── Articles ──────────────────────────────────────────────────────────────

test('articles index loads', function () {
    $this->get('/articles')->assertOk();
});

test('articles search loads without param', function () {
    $this->get('/articles/search')->assertOk();
});

test('article show returns 404 for missing slug', function () {
    $this->get('/articles/missing-article-99999')->assertNotFound();
});

test('article show loads for valid slug', function () {
    $user = User::factory()->create();
    $category = Category::create(['title' => 'Test Category', 'sites' => ['dawodu.com'], 'status' => true]);
    $contributor = Contributor::create(['first_name' => 'Jane', 'last_name' => 'Doe', 'user_id' => $user->id, 'status' => true]);
    $article = Article::create([
        'publication_date' => now(),
        'subject' => 'Test Article',
        'content' => 'Test content body.',
        'category_id' => $category->id,
        'contributor_id' => $contributor->id,
        'sites' => ['dawodu.com'],
        'status' => true,
    ]);

    $this->get("/articles/test-article-{$article->id}")->assertOk();
});

// ─── Categories ────────────────────────────────────────────────────────────

test('categories index loads', function () {
    $this->get('/categories')->assertOk();
});

test('category show loads', function () {
    $category = Category::create(['title' => 'Test Category', 'status' => true]);

    $this->get("/category/test-category-{$category->id}")->assertOk();
});

// ─── Contributors ──────────────────────────────────────────────────────────

test('contributors index loads', function () {
    $this->get('/contributors')->assertOk();
});

test('contributor show returns 404 for missing slug', function () {
    $this->get('/contributors/unknown-99999')->assertNotFound();
});

test('contributor show loads for valid slug', function () {
    $user = User::factory()->create();
    $contributor = Contributor::create([
        'first_name' => 'Jane',
        'last_name' => 'Doe',
        'user_id' => $user->id,
        'status' => true,
    ]);

    $this->get("/contributors/jane-doe-{$contributor->id}")->assertOk();
});

// ─── Document Library ──────────────────────────────────────────────────────

test('document library index loads', function () {
    $this->get('/document-library')->assertOk();
});

test('document library search requires param', function () {
    $this->get('/document-library/search')->assertSessionHasErrors(['param']);
});

test('document library search loads with param', function () {
    $this->get('/document-library/search?param=test')->assertOk();
});

test('document library show returns 404 for missing slug', function () {
    $this->get('/document-library/missing-document-99999')->assertNotFound();
});

test('document library show loads for valid slug', function () {
    $user = User::factory()->create();
    $doc = DocumentLibrary::create([
        'title' => 'Test Document',
        'publication_date' => now(),
        'user_id' => $user->id,
        'sites' => ['dawodu.com'],
        'documents' => [],
        'status' => true,
    ]);

    $this->get("/document-library/test-document-{$doc->id}")->assertOk();
});

// ─── Photo Albums ──────────────────────────────────────────────────────────

test('photo albums index loads', function () {
    $this->get('/photo-albums')->assertOk();
});

test('photo album show returns 404 for missing slug', function () {
    $this->get('/photo-albums/missing-album-99999')->assertNotFound();
});

test('photo album show loads for valid slug', function () {
    $gallery = Gallery::create([
        'title' => 'Test Album',
        'publication_date' => now(),
        'sites' => ['dawodu.com'],
        'status' => true,
    ]);

    $this->get("/photo-albums/test-album-{$gallery->id}")->assertOk();
});

// ─── Videos ────────────────────────────────────────────────────────────────

test('videos index loads', function () {
    $this->get('/videos')->assertOk();
});

test('video search requires param', function () {
    $this->get('/videos/search/test')->assertSessionHasErrors(['param']);
});

test('video search loads with param', function () {
    $this->get('/videos/search/test?param=test')->assertOk();
});

test('video show returns 404 for missing slug', function () {
    $this->get('/videos/missing-video-99999')->assertNotFound();
});

test('video show loads for valid slug', function () {
    $video = Video::create([
        'title' => 'Test Video',
        'url' => 'https://youtube.com/watch?v=test',
        'publication_date' => now(),
        'sites' => ['dawodu.com'],
        'status' => true,
    ]);

    $this->get("/videos/test-video-{$video->id}")->assertOk();
});

// ─── Partners ──────────────────────────────────────────────────────────────

test('partners index loads', function () {
    $this->get('/partners')->assertOk();
});

test('partner show returns 404 for missing slug', function () {
    $this->get('/partners/missing-partner-99999')->assertNotFound();
});

test('partner show loads for valid slug', function () {
    $partner = Partner::create([
        'title' => 'Test Partner',
        'url' => 'https://example.com',
        'status' => true,
    ]);

    $this->get("/partners/test-partner-{$partner->id}")->assertOk();
});

// ─── State Governors ───────────────────────────────────────────────────────

test('state governors index loads', function () {
    $this->get('/state-governors')->assertOk();
});

test('state governors sort loads', function () {
    $this->get('/state-governors/sort/political_party')->assertOk();
});

test('state governors by political party loads', function () {
    $this->get('/state-governors/political-party/APC')->assertOk();
});

test('state governors by valid constituency loads', function () {
    $this->get('/state-governors/abia-1')->assertOk();
});

test('state governors by invalid state id returns server error', function () {
    $this->get('/state-governors/invalid-99')->assertServerError();
});

// ─── Federal Senators ──────────────────────────────────────────────────────

test('federal senators index loads', function () {
    $this->get('/federal-senators')->assertOk();
});

test('federal senators sort loads', function () {
    $this->get('/federal-senators/sort/political_party')->assertOk();
});

test('federal senators by political party loads', function () {
    $this->get('/federal-senators/political-party/APC')->assertOk();
});

test('federal senators by constituency loads', function () {
    $zone = SenatorialZone::create([
        'state_id' => NigerianState::Edo,
        'title' => 'Edo Central',
        'status' => true,
    ]);

    $this->get("/federal-senators/edo-central-{$zone->id}")->assertOk();
});

// ─── Federal Representatives ───────────────────────────────────────────────

test('federal representatives index loads', function () {
    $this->get('/federal-representatives')->assertOk();
});

test('federal representatives sort loads', function () {
    $this->get('/federal-representatives/sort/political_party')->assertOk();
});

test('federal representatives by political party loads', function () {
    $this->get('/federal-representatives/political-party/APC')->assertOk();
});

test('federal representatives by constituency loads', function () {
    $constituency = FederalConstituency::create([
        'state_id' => NigerianState::Edo,
        'title' => 'Oredo',
        'status' => true,
    ]);

    $this->get("/federal-representatives/oredo-{$constituency->id}")->assertOk();
});

// ─── Government Officials ──────────────────────────────────────────────────

test('government officials page loads', function () {
    $this->get('/government-officials')->assertOk();
});

test('government official show returns 404 for missing slug', function () {
    $this->get('/government-official/missing-official-99999')->assertNotFound();
});

test('government official show loads for valid slug', function () {
    $official = GovernmentOfficial::create([
        'first_name' => 'John',
        'last_name' => 'Doe',
        'xtype' => GovernmentOfficialType::StateGovernor,
        'state_id' => NigerianState::Edo,
        'tenure_start' => now()->subYears(2),
        'status' => true,
    ]);

    $this->get("/government-official/john-doe-{$official->id}")->assertOk();
});

test('heads of government loads', function () {
    $this->get('/heads-of-government')->assertOk();
});

// ─── Site Links ────────────────────────────────────────────────────────────

test('government sites index loads', function () {
    $this->get('/government-sites')->assertOk();
});

test('government sites search requires param', function () {
    $this->get('/government-sites/search')->assertSessionHasErrors(['param']);
});

test('government sites search loads with param', function () {
    $this->get('/government-sites/search?param=test')->assertOk();
});

test('politicians sites index loads', function () {
    $this->get('/politicians-sites')->assertOk();
});

test('politicians sites search requires param', function () {
    $this->get('/politicians-sites/search')->assertSessionHasErrors(['param']);
});

test('politicians sites search loads with param', function () {
    $this->get('/politicians-sites/search?param=test')->assertOk();
});

test('general links index loads', function () {
    $this->get('/general-links')->assertOk();
});

test('general links search requires param', function () {
    $this->get('/general-links/search')->assertSessionHasErrors(['param']);
});

test('general links search loads with param', function () {
    $this->get('/general-links/search?param=test')->assertOk();
});

// ─── Political Parties ─────────────────────────────────────────────────────

test('political parties index loads', function () {
    $this->get('/political-parties')->assertOk();
});

test('political parties search requires param', function () {
    $this->get('/political-parties/search')->assertSessionHasErrors(['param']);
});

test('political parties search loads with param', function () {
    $this->get('/political-parties/search?param=test')->assertOk();
});

// ─── Nigerian Embassies ────────────────────────────────────────────────────

test('nigerian embassies loads', function () {
    $this->get('/nigerian-embassies')->assertOk();
});

test('nigerian embassies filtered by country loads', function () {
    $this->get('/nigerian-embassies/US')->assertOk();
});

// ─── News ──────────────────────────────────────────────────────────────────

test('news index loads', function () {
    $this->get('/news')->assertOk();
});

test('news sources loads', function () {
    $this->get('/news-sources')->assertOk();
});

// ─── Constitution ──────────────────────────────────────────────────────────

test('constitution show returns 404 for missing slug', function () {
    $this->get('/nigerias-constitution/missing-section-99999')->assertNotFound();
});

test('constitution show loads for valid slug', function () {
    // constitution_id FK must be set due to a migration bug (->nullable() called on ForeignKeyDefinition)
    // Create a self-referencing root node by inserting via DB then updating
    $user = User::factory()->create();
    $section = Constitution::create(['subject' => 'Preamble', 'user_id' => $user->id, 'status' => true]);

    $this->get("/nigerias-constitution/preamble-{$section->id}")->assertOk();
});

// ─── CMS Catch-all ─────────────────────────────────────────────────────────

test('cms catch-all route loads for any slug', function () {
    $this->get('/some-cms-page')->assertOk();
});
