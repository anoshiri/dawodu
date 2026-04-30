<?php

use App\Models\Article;
use App\Models\Category;
use App\Models\Contributor;
use App\Models\DocumentLibrary;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Language;
use App\Models\Tourism;
use App\Models\User;
use App\Models\Video;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Mail;

uses(LazilyRefreshDatabase::class);
uses(WithoutMiddleware::class);

// ─── Contact ───────────────────────────────────────────────────────────────

test('api contact fails validation without required fields', function () {
    $this->postJson('/api/contact')
        ->assertUnprocessable()
        ->assertJsonValidationErrors(['fullName', 'subject', 'email', 'message']);
});

test('api contact sends successfully', function () {
    Mail::fake();

    $this->postJson('/api/contact', [
        'fullName' => 'John Doe',
        'subject' => 'Test subject line',
        'email' => 'john@example.com',
        'message' => 'This is a test message body long enough.',
    ])->assertOk()->assertJsonStructure(['notice']);
});

// ─── Info Links ────────────────────────────────────────────────────────────

test('api info links loads', function () {
    $this->getJson('/api/info-links')->assertOk()->assertJsonStructure(['data']);
});

// ─── Document Library ──────────────────────────────────────────────────────

test('api document library index loads', function () {
    $this->getJson('/api/document-library')->assertOk()->assertJsonStructure(['documents']);
});

test('api document library search loads without param', function () {
    $this->getJson('/api/document-library/search')->assertOk()->assertJsonStructure(['documents']);
});

test('api document library show returns 404 for missing slug', function () {
    $this->getJson('/api/document-library/missing-document-99999')->assertNotFound();
});

test('api document library show loads for valid slug', function () {
    $user = User::factory()->create();
    $doc = DocumentLibrary::create([
        'title' => 'Test Document',
        'publication_date' => now(),
        'user_id' => $user->id,
        'sites' => ['dawodu.com'],
        'documents' => [],
        'status' => true,
    ]);

    $this->getJson("/api/document-library/test-document-{$doc->id}")
        ->assertOk()
        ->assertJsonStructure(['document']);
});

// ─── Events ────────────────────────────────────────────────────────────────

test('api events index loads', function () {
    $this->getJson('/api/events')->assertOk()->assertJsonStructure(['events', 'past']);
});

test('api events show returns 404 for missing slug', function () {
    $this->getJson('/api/events/missing-event-99999')->assertNotFound();
});

test('api events show loads for valid slug', function () {
    $user = User::factory()->create();
    $event = Event::create([
        'subject' => 'Test Event',
        'venue' => 'Test Venue',
        'start_date' => now()->addDay(),
        'start_time' => '10:00:00',
        'end_date' => now()->addDays(2),
        'end_time' => '18:00:00',
        'user_id' => $user->id,
        'status' => true,
    ]);

    $this->getJson("/api/events/test-event-{$event->id}")
        ->assertOk()
        ->assertJsonStructure(['event']);
});

// ─── Adverts ───────────────────────────────────────────────────────────────

test('api adverts side loads', function () {
    $this->getJson('/api/adverts/side')->assertOk()->assertJsonStructure(['advert']);
});

// ─── Messages ──────────────────────────────────────────────────────────────

test('api message loads for any slug', function () {
    $this->getJson('/api/messages/any-slug')->assertOk()->assertJsonStructure(['message']);
});

// ─── Tourism ───────────────────────────────────────────────────────────────

test('api tourism index loads', function () {
    $this->getJson('/api/tourism')->assertOk()->assertJsonStructure(['data']);
});

test('api tourism search fails without param', function () {
    $this->getJson('/api/tourism/search')->assertUnprocessable();
});

test('api tourism show falls back to index for missing slug', function () {
    $this->getJson('/api/tourism/missing-site-99999')->assertOk()->assertJsonStructure(['data']);
});

test('api tourism show loads for valid slug', function () {
    $tourism = Tourism::create([
        'title' => 'Test Tourism',
        'status' => true,
    ]);

    $this->getJson("/api/tourism/test-tourism-{$tourism->id}")
        ->assertOk()
        ->assertJsonStructure(['data']);
});

// ─── Language ──────────────────────────────────────────────────────────────

test('api language index loads', function () {
    Language::create(['word' => 'ẹ̀hẹ̀', 'meaning' => 'yes', 'language' => 'Edo', 'status' => true]);

    $this->getJson('/api/language')->assertOk()->assertJsonStructure(['data']);
});

test('api language search fails without param', function () {
    $this->getJson('/api/language/search')->assertUnprocessable();
});

test('api language search loads with param', function () {
    $this->getJson('/api/language/search?param=test')->assertOk()->assertJsonStructure(['data']);
});

test('api language quizzes loads', function () {
    $this->getJson('/api/language/quizzes/Edo')->assertOk()->assertJsonStructure(['quizzes']);
});

test('api language quiz show loads', function () {
    $this->getJson('/api/language/quiz/some-quiz-99999')->assertOk()->assertJsonStructure(['quiz']);
});

test('api language list loads', function () {
    $this->getJson('/api/language/list')->assertOk()->assertJsonStructure(['languages']);
});

test('api language word by language loads', function () {
    $this->getJson('/api/language/Edo')->assertOk()->assertJsonStructure(['data']);
});

// ─── Videos ────────────────────────────────────────────────────────────────

test('api videos index loads', function () {
    $this->getJson('/api/videos')->assertOk()->assertJsonStructure(['data']);
});

test('api videos search fails without param', function () {
    $this->getJson('/api/videos/search')->assertUnprocessable();
});

test('api videos search loads with param', function () {
    $this->getJson('/api/videos/search?param=test')->assertOk()->assertJsonStructure(['data']);
});

test('api videos show returns 404 for missing slug', function () {
    $this->getJson('/api/videos/missing-video-99999')->assertNotFound();
});

test('api videos show loads for valid slug', function () {
    $video = Video::create([
        'title' => 'Test Video',
        'url' => 'https://youtube.com/watch?v=test',
        'publication_date' => now(),
        'sites' => ['dawodu.com'],
        'status' => true,
    ]);

    $this->getJson("/api/videos/test-video-{$video->id}")
        ->assertOk()
        ->assertJsonStructure(['data']);
});

// ─── Photo Albums ──────────────────────────────────────────────────────────

test('api photo albums index loads', function () {
    $this->getJson('/api/photo-albums')->assertOk()->assertJsonStructure(['data']);
});

test('api photo albums latest loads', function () {
    $this->getJson('/api/photo-albums/latest')->assertOk()->assertJsonStructure(['gallery']);
});

test('api photo albums show returns 404 for missing slug', function () {
    $this->getJson('/api/photo-albums/missing-album-99999')->assertNotFound();
});

test('api photo albums show loads for valid slug', function () {
    $gallery = Gallery::create([
        'title' => 'Test Album',
        'publication_date' => now(),
        'sites' => ['dawodu.com'],
        'status' => true,
    ]);

    $this->getJson("/api/photo-albums/test-album-{$gallery->id}")
        ->assertOk()
        ->assertJsonStructure(['data']);
});

// ─── News ──────────────────────────────────────────────────────────────────

test('api latest news loads', function () {
    $this->getJson('/api/latest-news')->assertOk()->assertJsonStructure(['data']);
});

test('api news sources loads', function () {
    $this->getJson('/api/news/sources')->assertOk()->assertJsonStructure(['sources', 'types']);
});

// ─── Articles ──────────────────────────────────────────────────────────────

test('api articles index loads', function () {
    $this->getJson('/api/articles')->assertOk()->assertJsonStructure(['data']);
});

test('api articles search loads', function () {
    $this->getJson('/api/articles/search')->assertOk()->assertJsonStructure(['data']);
});

test('api articles section loads', function () {
    $this->getJson('/api/articles/section/most-viewed')->assertOk()->assertJsonStructure(['data']);
});

test('api categories loads', function () {
    $this->getJson('/api/categories')->assertOk()->assertJsonStructure(['categories']);
});

test('api category articles loads for unknown category', function () {
    $this->getJson('/api/category/test-99999')->assertOk()->assertJsonStructure(['articles', 'category']);
});

test('api article show returns 404 for missing slug', function () {
    $this->getJson('/api/articles/missing-article-99999')->assertNotFound();
});

test('api article show loads for valid slug', function () {
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

    $this->getJson("/api/articles/test-article-{$article->id}")
        ->assertOk()
        ->assertJsonStructure(['data']);
});

// ─── CMS ───────────────────────────────────────────────────────────────────

test('api cms slug loads', function () {
    $this->getJson('/api/slug/any-page')->assertOk()->assertJsonStructure(['data']);
});

// ─── Settings ──────────────────────────────────────────────────────────────

test('api settings loads', function () {
    $this->getJson('/api/settings')->assertOk()->assertJsonStructure(['data']);
});
