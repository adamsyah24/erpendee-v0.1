<?php

namespace App\Filament\Pages\TaxWidgets;

use App\Models\Tax;
use App\Models\Bank;
use App\Models\Company;
use App\Models\Department;
use Filament\Forms;
use Filament\Tables;
use Filament\Widgets\TableWidget as PageWidget;
use Illuminate\Database\Eloquent\Builder;


class Taxes extends PageWidget
{
    protected int|string|array $columnSpan = [
        'md' => 2,
        'xl' => 3,
    ];

    protected function getTableQuery(): Builder
    {
        return Tax::query();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('id'),
            Tables\Columns\TextColumn::make('vat_tax')->label('VAT Tax'),
        ];
    }
    protected function getTableActions(): array
    {
        return [
            Tables\Actions\ActionGroup::make([
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make()
                ->form([
                    Forms\Components\TextInput::make('vat_tax')->maxLength(100),
                ]),

                Tables\Actions\EditAction::make()
                ->form([
                    Forms\Components\TextInput::make('vat_tax')->integer()->maxLength(100)->autofocus()->required(),
                ]),
            ]),
        ];
    }

    protected function getTableHeaderActions(): array
    {
        return [
            Tables\Actions\CreateAction::make()
            ->form([
                Forms\Components\TextInput::make('vat_tax')->label('VAT Tax')->integer()->required()->maxLength(100)->autofocus(),
            ]),
        ];
    }
}
