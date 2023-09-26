<?php

namespace App\Filament\Pages\MediaWidgets;

use Filament\Forms;
use Filament\Tables;
use Filament\Widgets\TableWidget as PageWidget;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Media;
use Filament\Pages\Page;

class Medias extends PageWidget
{
    protected int|string|array $columnSpan = [
        'md' => 2,
        'xl' => 3,
    ];

    protected function getTableQuery(): Builder
    {
        return Media::query();
    }

    protected function getTableColumns(): array
    {
        return [
            // Tables\Columns\TextColumn::make('products.product_name', 'product_name')->label('Product Name'),
            Tables\Columns\TextColumn::make('media_name')->label('Media Name')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('media_desc')->label('Media Description'),
            // Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
            // Tables\Columns\TextColumn::make('email'),
            // Tables\Columns\TextColumn::make('website'),
            // Tables\Columns\TextColumn::make('departments_count')->counts('departments')->label('Departments'),
            // Tables\Columns\TextColumn::make('employees_count')->counts('employees')->label('Employees'),
            // Tables\Columns\TextColumn::make('banks_count')->counts('banks')->label('Banks'),
            // Tables\Columns\TextColumn::make('accounts_count')->counts('accounts')->label('Accounts'),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\ActionGroup::make([
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make()
                ->form([
                    // Forms\Components\Select::make('product_id')->relationship('products', 'product_name')->required()->label('Product Name'),
                    Forms\Components\TextInput::make('media_name')->maxLength(100)->autofocus(),
                    Forms\Components\TextInput::make('media_desc')->label('Media Description'),
                ]),

                Tables\Actions\EditAction::make()
                ->form([
                    // Forms\Components\Select::make('product_id')->relationship('products', 'product_name')->required()->label('Product Name'),
                    Forms\Components\TextInput::make('media_name')->maxLength(100)->autofocus(),
                    Forms\Components\TextInput::make('media_desc')->label('Media Description'),
                ]),
            ]),
        ];
    }

    protected function getTableHeaderActions(): array
    {
        return [
            Tables\Actions\CreateAction::make()
            ->form([
                // Forms\Components\Select::make('product_id')->relationship('products', 'product_name')->required()->label('Product Name'),
                Forms\Components\TextInput::make('media_name')->maxLength(100)->autofocus()->required(),
                Forms\Components\TextInput::make('media_desc')->label('Media Description')->required(),
        ]),
        ];
    }
}
