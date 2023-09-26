<?php

namespace App\Filament\Pages\BrandWidgets;

use App\Models\Brand;
use App\Models\Client;
use Filament\Forms;
use Filament\Tables;
use Filament\Widgets\TableWidget as PageWidget;
use Illuminate\Database\Eloquent\Builder;


class Brands extends PageWidget
{
    protected int|string|array $columnSpan = [
        'md' => 2,
        'xl' => 3,
    ];

    protected function getTableQuery(): Builder
    {
        return Brand::query();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('clients.client_name')->label('Client Name'),
            Tables\Columns\TextColumn::make('brand_name')->label('Brand Name'),
            Tables\Columns\TextColumn::make('brand_slug')->label('Brand Slug'),
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
                    Forms\Components\Select::make('client_id')->relationship('clients', 'client_name')->label('Client Name'),
                    Forms\Components\TextInput::make('brand_name')->maxLength(100)->autofocus(),
                    Forms\Components\TextInput::make('brand_slug')->maxLength(250)->label('Brand Slug'),
                ]),

                Tables\Actions\EditAction::make()
                ->form([
                    Forms\Components\Select::make('client_id')->relationship('clients', 'client_name')->label('Client Name'),
                    Forms\Components\TextInput::make('brand_name')->maxLength(100)->autofocus(),
                    Forms\Components\TextInput::make('brand_slug')->maxLength(250)->label('Brand Slug'),
                ]),
            ]),
        ];
    }

    protected function getTableHeaderActions(): array
    {
        return [
            Tables\Actions\CreateAction::make()
            ->form([
                Forms\Components\Select::make('client_id')->relationship('clients', 'client_name')->required()->label('Client Name'),
                Forms\Components\TextInput::make('brand_name')->maxLength(100)->autofocus(),
                Forms\Components\TextInput::make('brand_slug')->maxLength(250)->label('Brand Slug'),
            ]),
        ];
    }

}
