<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use App\Models\ContactMessage;
use App\Models\Product;
use App\Models\Service;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DismatOverviewWidget extends StatsOverviewWidget
{
    protected static ?int $sort = -1;

    protected function getStats(): array
    {
        $unreadMessages = ContactMessage::where('is_read', false)->count();

        return [
            Stat::make('Produits actifs', Product::where('is_active', true)->count())
                ->description('Visibles dans le catalogue')
                ->icon('heroicon-o-cube')
                ->color('primary'),

            Stat::make('Services actifs', Service::where('is_active', true)->count())
                ->description('Visibles sur le site')
                ->icon('heroicon-o-wrench-screwdriver')
                ->color('primary'),

            Stat::make('Articles publiés', Article::where('is_published', true)->count())
                ->description('Visibles dans les actualités')
                ->icon('heroicon-o-newspaper')
                ->color('primary'),

            Stat::make('Messages non lus', $unreadMessages)
                ->description($unreadMessages > 0 ? 'À traiter' : 'Tout est à jour')
                ->icon('heroicon-o-envelope')
                ->color($unreadMessages > 0 ? 'warning' : 'success'),
        ];
    }
}
