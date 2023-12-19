<?php

namespace App\Filament\Pages;

use App\Models\Vendor;
use Filament\Pages\Page;

class Vendors extends Page
{
    protected static ?string $model = Vendor::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.vendor';

    protected static ?string $navigationGroup = 'Client and Vendor Management';

    protected function getHeaderWidgets(): array
    {
        return [
            VendorWidgets\Vendors::class,
            ];
    }

    protected static function getNavigationBadge(): ?string
    {
        return self::$model::count();
    }
}
