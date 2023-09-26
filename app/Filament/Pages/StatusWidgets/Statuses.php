<?php

namespace App\Filament\Pages\StatusWidgets;

use App\Models\Status;
use Filament\Pages\Page;
use Filament\Forms;
use Filament\Tables;
use Filament\Widgets\TableWidget as PageWidget;
use Illuminate\Database\Eloquent\Builder;


class Statuses extends PageWidget
{
    protected int|string|array $columnSpan = [
        'md' => 2,
        'xl' => 3,
    ];

    protected function getTableQuery(): Builder
    {
        return Status::query();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('id'),
            Tables\Columns\TextColumn::make('status')->label('Status Name'),
            // Tables\Columns\TextColumn::make('price')->money($symbol = 'IDR', $decimalSeparator = ',', $thousandsSeparator = '.', $decimals = 2),
            // Tables\Columns\TextColumn::make('product_desc')->label('Product Description'),
            // Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
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
                    Forms\Components\TextInput::make('status')->maxLength(100)->autofocus(),
                ]),

                Tables\Actions\EditAction::make()
                ->form([
                    Forms\Components\TextInput::make('status')->maxLength(100)->autofocus(),
                ]),
            ]),
        ];
    }

    protected function getTableHeaderActions(): array
    {
        return [
            Tables\Actions\CreateAction::make()
            ->form([
                Forms\Components\TextInput::make('status')->required()->maxLength(100)->autofocus(),
            ]),
        ];
    }
}
