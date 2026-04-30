<?php

namespace App\Filament\Widgets;

use App\Models\GovernmentOfficial;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class GovernmentStatsWidget extends StatsOverviewWidget
{
    protected ?string $pollingInterval = null;

    protected function getStats(): array
    {
        $governors = GovernmentOfficial::isActive()->isGovernor()->count();
        $senators = GovernmentOfficial::isActive()->isSenator()->count();
        $representatives = GovernmentOfficial::isActive()->isRepresentative()->count();
        $headsOfGov = GovernmentOfficial::isActive()->isHeadOfGovernment()->count();
        $totalUsers = User::count();
        $newUsersThisMonth = User::whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->count();

        return [
            Stat::make('State Governors', number_format($governors))
                ->description('36 states + FCT')
                ->descriptionIcon('heroicon-m-building-library')
                ->color('success'),

            Stat::make('Federal Senators', number_format($senators))
                ->description('109 senate seats')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('info'),

            Stat::make('Federal Representatives', number_format($representatives))
                ->description('360 house seats')
                ->descriptionIcon('heroicon-m-users')
                ->color('warning'),

            Stat::make('Heads of Government', number_format($headsOfGov))
                ->descriptionIcon('heroicon-m-star')
                ->color('primary'),

            Stat::make('Registered Users', number_format($totalUsers))
                ->description("{$newUsersThisMonth} joined this month")
                ->descriptionIcon('heroicon-m-user-plus')
                ->color($newUsersThisMonth > 0 ? 'success' : 'gray'),
        ];
    }
}
