<?php

namespace App\Filament\Pages\ClientWidgets;

use App\Models\Client;
use Filament\Forms;
use Filament\Tables;
use Filament\Widgets\TableWidget as PageWidget;
use Illuminate\Database\Eloquent\Builder;


class Clients extends PageWidget
{
    protected int|string|array $columnSpan = [
        'md' => 2,
        'xl' => 3,
    ];

    protected function getTableQuery(): Builder
    {
        return Client::query();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('client_name')->label('Client Name'),
            Tables\Columns\TextColumn::make('address', 'client_address'),
            Tables\Columns\TextColumn::make('client_slug')->label('Client Slug'),
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
                    Forms\Components\TextInput::make('client_name')->maxLength(100)->autofocus(),
                    Forms\Components\TextInput::make('address')->maxLength(250),
                    Forms\Components\TextInput::make('client_slug')->maxLength(250)->label('Client Slug'),
                ]),

                Tables\Actions\EditAction::make()
                ->form([
                    Forms\Components\TextInput::make('client_name')->maxLength(100)->autofocus(),
                    Forms\Components\TextInput::make('address')->maxLength(250),
                    Forms\Components\TextInput::make('client_slug')->maxLength(250)->label('Client Slug'),
                ]),
            ]),
        ];
    }

    protected function getTableHeaderActions(): array
    {
        return [
            Tables\Actions\CreateAction::make()
            ->form([
                Forms\Components\TextInput::make('client_name')->required()->maxLength(100)->autofocus(),
                Forms\Components\TextInput::make('address')->maxLength(250)->required(),
                Forms\Components\TextInput::make('client_slug')->maxLength(250)->label('Client Slug')->required(),
            ]),
        ];
    }

}
