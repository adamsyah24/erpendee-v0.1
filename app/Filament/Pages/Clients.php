<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Client;

class Clients extends Page
{
    protected static ?string $model = Client::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Client Management';

    protected static string $view = 'filament.pages.client';

    protected function getHeaderWidgets(): array
    {
        return [
            ClientWidgets\Clients::class,
        ];
    }
    protected static function getNavigationBadge(): ?string
    {
        return self::$model::count();
    }
}
