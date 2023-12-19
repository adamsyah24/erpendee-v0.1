<?php

namespace App\Filament\Pages\VendorWidgets;

use App\Models\Vendor;
use Filament\Forms;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Widgets\TableWidget as PageWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class Vendors extends PageWidget
{
    protected int|string|array $columnSpan = [
        'md' => 2,
        'xl' => 3,
    ];

    protected function getTableQuery(): Builder
    {
        return Vendor::query();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('id')->label('No')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('nama_pt_vendor')->label('Nama PT')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('nama_vendor')->label('Nama Vendor')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('jenis_vendor')->label('Jenis Vendor')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('pic_vendor')->label('PIC')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('nama_contact_person')->label('Nama Contact Person')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('nohp_contact_person')->label('Nomor CP')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('link_dokumen')->label('Link Document')->sortable()->searchable()
                ->url(fn ($record) => ($record->link_dokumen), true)
                ->openUrlInNewTab(),
            // Tables\Columns\TextColumn::make('clientsO.client_name', 'client_name')->label('Client Name')->sortable()->searchable(),
            // Tables\Columns\TextColumn::make('brandsO.brand_name', 'brand_name')->label('Brand Name')->sortable()->searchable(),
            // Tables\Columns\TextColumn::make('productsO.product_name', 'product_name')->label('Product Name')->sortable()->searchable(),
            // Tables\Columns\TextColumn::make('statusO.status', 'status')->label('Status')->sortable()->searchable(),
            // Tables\Columns\TextColumn::make('period_start')->sortable()->searchable(),
            // Tables\Columns\TextColumn::make('period_end')->sortable()->searchable(),
            // Tables\Columns\TextColumn::make('prepared')->sortable()->searchable(),
            // Tables\Columns\TextColumn::make('revision')->sortable()->searchable(),
            // Tables\Columns\TextColumn::make('date_revision')->sortable()->searchable(),
            // Tables\Columns\TextColumn::make('tax'),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\ActionGroup::make([
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\EditAction::make()
                    ->form([
                        Forms\Components\TextInput::make('nama_pt_vendor')->maxLength(100)->autofocus(),
                        Forms\Components\TextInput::make('nama_vendor')->maxLength(250),
                        Forms\Components\TextInput::make('jenis_vendor')->maxLength(250),
                        Forms\Components\TextInput::make('pic_vendor')->maxLength(250),
                        Forms\Components\TextInput::make('nama_contact_person')->maxLength(250),
                        Forms\Components\TextInput::make('nohp_contact_person')->maxLength(250),
                        Forms\Components\TextInput::make('link_dokumen')->maxLength(250)
                            ->url(),
                    ]),
            ]),
        ];
    }

    protected function getTableHeaderActions(): array
    {
        return [
            Tables\Actions\CreateAction::make()
                ->form([
                    Forms\Components\TextInput::make('nama_pt_vendor')->maxLength(100)->autofocus(),
                    Forms\Components\TextInput::make('nama_vendor')->maxLength(250),
                    Forms\Components\TextInput::make('jenis_vendor')->maxLength(250),
                    Forms\Components\TextInput::make('pic_vendor')->maxLength(250),
                    Forms\Components\TextInput::make('nama_contact_person')->maxLength(250),
                    Forms\Components\TextInput::make('nohp_contact_person')->maxLength(250),
                    Forms\Components\TextInput::make('link_dokumen')->maxLength(250)
                        ->url(),
                ]),
            // Tables\Actions\PDFAction::make()
            //     ->label('Add New')

        ];
    }
}
