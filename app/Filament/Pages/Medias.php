<?php

namespace App\Filament\Pages;

use App\Models\Media;
use Filament\Pages\Page;

class Medias extends Page
{
    protected static ?string $model = Media::class;

    protected static ?string $navigationIcon = 'heroicon-o-film';

    // protected static ?int $navigationSort = -2;

    protected static ?string $navigationGroup = 'Product Management';

    protected static string $view = 'filament.pages.medias';

    protected function getHeaderWidgets(): array
    {
        return [
            MediaWidgets\Medias::class,
        ];
    }

    protected static function getNavigationBadge(): ?string
    {
        return self::$model::count();
    }
}
