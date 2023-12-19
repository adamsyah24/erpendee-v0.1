<?php

namespace App\Filament\Pages;

use App\Filament\Pages\OrderWidgets\MediaOrders as OrderWidgetsMediaOrders;
use Filament\Pages\Page;

class MediaOrders extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

        protected static ?int $navigationSort = 1;

    protected static string $view = 'filament.pages.media-orders';

    protected static ?string $title = 'Media Order';

    protected function getHeaderWidgets(): array
    {
        return [
            MediaOrderWidgets\MediaOrders::class,
        ];
    }
}
