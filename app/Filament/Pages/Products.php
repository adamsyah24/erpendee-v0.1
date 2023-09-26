<?php

namespace App\Filament\Pages;

use App\Models\Product;
use Filament\Pages\Page;

class Products extends Page
{

    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?int $navigationSort = -2;

    protected static ?string $navigationGroup = 'Product Management';

    protected static string $view = 'filament.pages.products';

    protected function getHeaderWidgets(): array
    {
        return [
            ProductWidgets\Products::class,
        ];
    }

    protected static function getNavigationBadge(): ?string
    {
        return self::$model::count();
    }
}
