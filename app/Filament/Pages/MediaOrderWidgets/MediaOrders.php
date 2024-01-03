<?php

namespace App\Filament\Pages\MediaOrderWidgets;

use App\Models\MediaOrder;
use App\Models\Order;
use App\Models\Product;
use App\Models\QuotationProduct;
use App\Models\Brand;
use Filament\Forms;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Widgets\TableWidget as PageWidget;
use Illuminate\Database\Eloquent\Builder;


class MediaOrders extends PageWidget
{
    protected int|string|array $columnSpan = [
        'md' => 2,
        'xl' => 3,
    ];
    // protected function getTableColumns(): array
    // {
    //     return [
    //         Tables\Columns\TextColumn::make('id')->sortable()->searchable(),
    //         Tables\Columns\TextColumn::make('order_no')->sortable()->searchable(),
    //         Tables\Columns\TextColumn::make('order_series')->sortable()->searchable(),
    //         Tables\Columns\TextColumn::make('created_at')->sortable()->searchable(),            // Add more columns as needed
    //     ];
    // }


    protected function getTableQuery(): Builder
    {
        return MediaOrder::query();
        return Order::query();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('id')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('mo_series_number')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('quotationM.order_no', 'order_no')->label('Order No')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('quotationM.order_series', 'order_series')->label('Order Series')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('quotationM.statusO.status', 'status')->label('Status')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('created_at')->sortable()->searchable(),
        ];
    }

    protected function getTableHeaderActions(): array
    {
        return [
            Tables\Actions\CreateAction::make()
                ->label('Add New Media Order')
                ->form([
                    Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Select::make('order_id')->relationship('quotationM', 'order_no')->required()->label('Order Number')->reactive(),
                        Forms\Components\TextInput::make('mo_series_number')->numeric(),

                    ])
                    ->columns([
                        'sm' => 2,
                    ]),
                ])
            // Tables\Actions\PDFAction::make()
            //     ->label('Add New')

        ];
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\ActionGroup::make([
                Tables\Actions\DeleteAction::make(),
                Action::make('Download Pdf')
                    ->icon('heroicon-o-document-download')
                    ->url(fn (MediaOrder $record) => route('mediaorder.pdf.download', $record))
                    ->openUrlInNewTab(),

                Tables\Actions\ViewAction::make()
                    ->form([
                        Forms\Components\Card::make()
                            ->schema([
                                Forms\Components\Card::make()
                                    ->schema([
                                        Forms\Components\TextInput::make('order_no')->label('Order No.')->unique()->numeric(),
                                        Forms\Components\TextInput::make('order_series')->label('Order Series'),
                                    ])
                                    ->columns([
                                        'sm' => 2
                                    ]),
                                Forms\Components\Select::make('client_id')->relationship('clientMo', 'client_name')->label('Client Name')->reactive(),
                                Forms\Components\Select::make('brand_id')->relationship('brandMo', 'brand_name')->label('Brand Name')
                                    ->options(function (callable $get) {
                                        $clientID = $get('client_id');
                                        if ($clientID) {
                                            return Brand::where('client_id', $clientID)->pluck('brand_name', 'id')->toArray();
                                        }
                                    }),
                                Forms\Components\Select::make('media_id')->relationship('mediaMo', 'media_name')->required()->label('Media'),
                                Forms\Components\Select::make('status_id')->relationship('statusMo', 'status')->label('Status'),
                                Forms\Components\DatePicker::make('period_start')->label('Period Start')->required(),
                                Forms\Components\DatePicker::make('period_end')->label('Period End')->required(),
                                Forms\Components\TextInput::make('project')->label('Project'),
                                Forms\Components\DatePicker::make('prepared'),
                                Forms\Components\TextInput::make('revision'),
                                Forms\Components\DatePicker::make('date_revision')->label('Date Revision'),
                                Forms\Components\TextInput::make('tax')->numeric()->required(),
                            ])
                            ->columns([
                                'sm' => 2
                            ]),
                        Forms\Components\Repeater::make(name: 'quoteMo')
                            ->label('Add Product')
                            ->relationship()
                            ->defaultItems(1)
                            ->schema([
                                Forms\Components\Card::make()
                                    ->schema([
                                        Forms\Components\Select::make(name: 'product_id')
                                            // ->relationship('qProduct', 'product_name')
                                            ->options(Product::query()->pluck(column: 'product_name', key: 'id'))
                                            ->required()
                                            ->reactive()
                                            ->label('Product Name'),
                                        Forms\Components\TextInput::make('remarks')
                                            ->required(),
                                        Forms\Components\DatePicker::make('periodstart')
                                            ->label('Period Start')
                                            ->reactive(),
                                        Forms\Components\DatePicker::make('periodend')
                                            ->label('Period End')
                                            ->reactive(),
                                        Forms\Components\TextInput::make('qty')
                                            ->numeric()
                                            ->reactive(),
                                        Forms\Components\TextInput::make('priced')->numeric()->required()->reactive(),
                                        // Forms\Components\TextInput::make('freq'),
                                    ])
                                    ->columns([
                                        'sm' => 4
                                    ]),
                            ]),
                    ]),

                Tables\Actions\EditAction::make()
                    ->form([
                        Forms\Components\Card::make()
                            ->schema([
                                Forms\Components\Card::make()
                                    ->schema([
                                        Forms\Components\TextInput::make('order_no')->label('Order No.')->numeric(),
                                        Forms\Components\TextInput::make('order_series')->label('Order Series'),
                                    ])
                                    ->columns([
                                        'sm' => 2
                                    ]),
                                Forms\Components\Select::make('client_id')->relationship('clientMo', 'client_name')->label('Client Name')->reactive(),
                                Forms\Components\Select::make('brand_id')->relationship('brandMo', 'brand_name')->label('Brand Name')
                                    ->options(function (callable $get) {
                                        $clientID = $get('client_id');
                                        if ($clientID) {
                                            return Brand::where('client_id', $clientID)->pluck('brand_name', 'id')->toArray();
                                        }
                                    }),
                                Forms\Components\Select::make('media_id')->relationship('mediaMo', 'media_name')->required()->label('Media'),
                                Forms\Components\Select::make('status_id')->relationship('statusMo', 'status')->label('Status'),
                                Forms\Components\DatePicker::make('period_start')->label('Period Start')->required(),
                                Forms\Components\DatePicker::make('period_end')->label('Period End')->required(),
                                Forms\Components\TextInput::make('project')->label('Project'),
                                Forms\Components\DatePicker::make('prepared'),
                                Forms\Components\TextInput::make('revision'),
                                Forms\Components\DatePicker::make('date_revision')->label('Date Revision'),
                                Forms\Components\TextInput::make('tax')->numeric()->required(),
                            ])
                            ->columns([
                                'sm' => 2
                            ]),

                        Forms\Components\Repeater::make(name: 'quoteMo')
                            ->label('Add Product')
                            ->relationship()
                            ->defaultItems(1)
                            ->schema([
                                Forms\Components\Card::make()
                                    ->schema([
                                        Forms\Components\Select::make(name: 'product_id')
                                            // ->relationship('qProduct', 'product_name')
                                            ->options(Product::query()->pluck(column: 'product_name', key: 'id'))
                                            ->required()
                                            ->reactive()
                                            ->label('Product Name'),
                                        Forms\Components\TextInput::make('remarks')
                                            ->required(),
                                        Forms\Components\DatePicker::make('periodstart')
                                            ->label('Period Start')
                                            ->reactive(),
                                        Forms\Components\DatePicker::make('periodend')
                                            ->label('Period End')
                                            ->reactive(),
                                        Forms\Components\TextInput::make('qty')
                                            ->numeric()
                                            ->reactive(),
                                        Forms\Components\TextInput::make('priced')->numeric()->required()->reactive(),
                                        // Forms\Components\TextInput::make('freq'),https://meet.google.com/kqi-noag-ran
                                    ])
                                    ->columns([
                                        'sm' => 4
                                    ]),
                            ]),
                    ]),
            ]),
        ];
    }
}
