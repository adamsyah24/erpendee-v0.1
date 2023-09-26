<?php

namespace App\Filament\Pages\ProductWidgets;

use App\Models\Product;
use Filament\Forms;
use Filament\Tables;
use Filament\Widgets\TableWidget as PageWidget;
use Illuminate\Database\Eloquent\Builder;


class Products extends PageWidget
{
    protected int|string|array $columnSpan = [
        'md' => 2,
        'xl' => 3,
    ];

    protected function getTableQuery(): Builder
    {
        return Product::query();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('product_name')->label('Product Name')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('price')->money($symbol = 'IDR', $decimalSeparator = ',', $thousandsSeparator = '.', $decimals = 2)->sortable(),
            Tables\Columns\TextColumn::make('product_desc')->label('Product Description'),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\ActionGroup::make([
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make()
                ->form([
                    Forms\Components\TextInput::make('product_name')->maxLength(100)->autofocus(),
                    Forms\Components\TextArea::make('product_desc')->maxLength(250),
                    Forms\Components\TextInput::make('price')->maxLength(250)->numeric()->prefix('Rp.'),
                ]),

                Tables\Actions\EditAction::make()
                ->form([
                    Forms\Components\TextInput::make('product_name')->maxLength(100)->autofocus(),
                    Forms\Components\TextArea::make('product_desc')->maxLength(250),
                    Forms\Components\TextInput::make('price')->maxLength(250)->numeric()->prefix('Rp.'),
                ]),
            ]),
        ];
    }

    protected function getTableHeaderActions(): array
    {
        return [
            Tables\Actions\CreateAction::make()
            ->form([
                Forms\Components\TextInput::make('product_name')->required()->maxLength(100)->autofocus(),
                Forms\Components\TextArea::make('product_desc')->maxLength(250)->required(),
                Forms\Components\TextInput::make('price')->maxLength(250)->required()->numeric()->prefix('Rp.'),
        ]),
        ];
    }

}
