<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Statuses extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationGroup = 'Account';

    protected static string $view = 'filament.pages.status';

    protected function getHeaderWidgets(): array
    {
        return [
            StatusWidgets\Statuses::class,
        ];
    }
}
