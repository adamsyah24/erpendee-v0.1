<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Orders extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.orders';

    protected static ?string $title = 'Quotation';

    // protected static ?int $navigationSort = -2;

    // protected static ?string $navigationGroup = 'Client Management';

    protected function getHeaderWidgets(): array
    {
        return [
            OrderWidgets\Orders::class,
            // OrderWidgets\ProductAddWidgets::class,
        ];
    }

}
