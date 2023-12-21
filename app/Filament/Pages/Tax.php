<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Tax extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.tax';

    protected static ?string $navigationGroup = 'Account';

    protected static ?int $navigationSort = 2;

    protected function getHeaderWidgets(): array
    {
        return [
            TaxWidgets\Taxs::class,
        ];
    }
}
