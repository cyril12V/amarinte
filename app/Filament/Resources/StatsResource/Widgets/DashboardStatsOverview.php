<?php

namespace App\Filament\Resources\StatsResource\Widgets;

use App\Models\User;
use App\Models\Prestation;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Symfony\Component\Finder\Finder;

class DashboardStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $visitsCount = DB::table('visits')->count();

        $viewPath = resource_path('views');
        $staticPagesCount = 0;
        if (File::isDirectory($viewPath)) {
            $finder = new Finder();
            $finder->files()
                ->in($viewPath)
                ->name('*.blade.php')
                ->notPath(['components', 'layouts', 'vendor', 'filament', 'auth', 'profile', 'mail', 'errors']);
            $staticPagesCount = $finder->count();
        }

        $usersCount = User::count();

        // Calculer le nombre de prestations
        $prestationsCount = Prestation::count();

        return [
            Stat::make('Visites totales', $visitsCount)
                ->description('Visites enregistrées')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Nombre de pages', $staticPagesCount)
                ->description('Pages (visible/non visible)')
                ->descriptionIcon('heroicon-m-document-duplicate')
                ->color('info'),
            Stat::make('Utilisateurs', $usersCount)
                ->description('Nb. total d\'admins')
                ->descriptionIcon('heroicon-m-users')
                ->color('warning'),
            Stat::make('Prestations', $prestationsCount)
                ->description('Prestations enregistrées')
                ->descriptionIcon('heroicon-m-rectangle-stack')
                ->color('primary'),
        ];
    }
}
