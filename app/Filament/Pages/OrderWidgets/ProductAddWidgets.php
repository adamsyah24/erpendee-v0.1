<?php

namespace App\Filament\Pages\OrderWidgets;

use Illuminate\Support\Carbon;
use App\Models\Order;
use App\Models\QuotationProduct;
use Filament\Pages\Page;
use Filament\Forms;
use Filament\Tables;
use Filament\Widgets\TableWidget as PageWidget;
use Illuminate\Database\Eloquent\Builder;

class ProductAddWidgets extends PageWidget
{
    protected int|string|array $columnSpan = [
        'md' => 2,
        'xl' => 3,
    ];

    protected function getTableQuery(): Builder
    {
        return QuotationProduct::query();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('qOrder.order_id', 'order_id')->label('Order ID'),
            Tables\Columns\TextColumn::make('qProduct.product_name', 'product_name')->label('Product Name'),
            Tables\Columns\TextColumn::make('remarks')->label('Remarks'),
            Tables\Columns\TextColumn::make('period')->label('Period'),
            // ->getStateUsing(function (Order $record): float {
            //     $startTime = Carbon::parse($this->period_start);
            //     $finishTime = Carbon::parse($this->period_end);

            //     return $record = $finishTime->diffForHumans($startTime);

            // }),
            Tables\Columns\TextColumn::make('qty')->label('QTY'),
            Tables\Columns\TextColumn::make('frequency')->label('Frequency'),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\ActionGroup::make([
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make()
                ->form([
                    Forms\Components\Select::make('client_id')->relationship('clients', 'client_name')->required()->label('Client Name'),
                    Forms\Components\TextInput::make('brand_name')->required()->maxLength(100)->autofocus()->required(),
                    Forms\Components\TextInput::make('brand_slug')->maxLength(250)->label('Brand Slug')->required(),
                ]),

                Tables\Actions\EditAction::make()
                ->form([
                    Forms\Components\Select::make('client_id')->relationship('clients', 'client_name')->required()->label('Client Name'),
                    Forms\Components\TextInput::make('brand_name')->required()->maxLength(100)->autofocus()->required(),
                    Forms\Components\TextInput::make('brand_slug')->maxLength(250)->label('Brand Slug')->required(),
                ]),
            ]),
        ];
    }

    protected function getTableHeaderActions(): array
    {
        return [
            Tables\Actions\CreateAction::make()
            ->form([
                // Forms\Components\Select::make('order_id')->relationship('qOrder', 'order_id')->required()->label('Order ID'),
                Forms\Components\Select::make('product_id')->relationship('qProduct', 'product_name')->required()->label('Product Name'),
                Forms\Components\TextInput::make('brand_name')->maxLength(100)->autofocus(),
                Forms\Components\TextInput::make('period'),
                Forms\Components\TextInput::make('brand_slug')->maxLength(250)->label('Brand Slug'),
            ])
        ];
    }
}
