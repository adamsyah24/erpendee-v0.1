<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Brand;

class Brands extends Page
{
    protected static ?string $model = Brand::class;

    protected static ?string $navigationIcon = 'heroicon-o-light-bulb';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationGroup = 'Client Management';

    protected static string $view = 'filament.pages.brand';

    protected function getHeaderWidgets(): array
    {
        return [
            BrandWidgets\Brands::class,
        ];
    }

    protected static function getNavigationBadge(): ?string
    {
        return self::$model::count();
    }
}
