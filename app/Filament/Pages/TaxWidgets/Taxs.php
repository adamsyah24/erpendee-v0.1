<?php

namespace App\Filament\Pages\TaxWidgets;

use App\Filament\Pages\Tax;
use App\Models\Account;
use App\Models\Bank;
use App\Models\Company;
use App\Models\Department;
use Filament\Forms;
use Filament\Tables;
use Filament\Widgets\TableWidget as PageWidget;
use Illuminate\Database\Eloquent\Builder;


class Taxs extends PageWidget
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
        return [];
    }
}
