<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use App\Models\DocumentLibrary;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Tourism;
use App\Models\Video;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ContentStatsWidget extends StatsOverviewWidget
{
    protected ?string $pollingInterval = null;

    protected function getStats(): array
    {
        $totalArticles = Article::isActive()->count();
        $articlesThisMonth = Article::isActive()
            ->whereYear('publication_date', now()->year)
            ->whereMonth('publication_date', now()->month)
            ->count();

        $articleChart = collect(range(6, 0))
            ->map(fn (int $months) => Article::isActive()
                ->whereYear('publication_date', now()->subMonths($months)->year)
                ->whereMonth('publication_date', now()->subMonths($months)->month)
                ->count()
            )->toArray();

        $totalVideos = Video::isActive()->count();
        $videosThisMonth = Video::isActive()
            ->whereYear('publication_date', now()->year)
            ->whereMonth('publication_date', now()->month)
            ->count();

        $videoChart = collect(range(6, 0))
            ->map(fn (int $months) => Video::isActive()
                ->whereYear('publication_date', now()->subMonths($months)->year)
                ->whereMonth('publication_date', now()->subMonths($months)->month)
                ->count()
            )->toArray();

        $totalGalleries = Gallery::isActive()->count();
        $totalDocuments = DocumentLibrary::isActive()->count();

        $upcomingEvents = Event::isActive()
            ->whereDate('end_date', '>=', Carbon::today())
            ->count();

        $totalTourism = Tourism::isActive()->count();

        return [
            Stat::make('Articles', number_format($totalArticles))
                ->description("{$articlesThisMonth} published this month")
                ->descriptionIcon('heroicon-m-document-text')
                ->chart($articleChart)
                ->color('success'),

            Stat::make('Videos', number_format($totalVideos))
                ->description("{$videosThisMonth} added this month")
                ->descriptionIcon('heroicon-m-play-circle')
                ->chart($videoChart)
                ->color('info'),

            Stat::make('Photo Albums', number_format($totalGalleries))
                ->descriptionIcon('heroicon-m-photo')
                ->color('warning'),

            Stat::make('Documents', number_format($totalDocuments))
                ->descriptionIcon('heroicon-m-folder-open')
                ->color('gray'),

            Stat::make('Upcoming Events', number_format($upcomingEvents))
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color($upcomingEvents > 0 ? 'success' : 'gray'),

            Stat::make('Tourism Sites', number_format($totalTourism))
                ->descriptionIcon('heroicon-m-map-pin')
                ->color('primary'),
        ];
    }
}
