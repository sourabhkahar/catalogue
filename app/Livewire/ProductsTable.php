<?php

namespace App\Livewire;

use App\Models\Product;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Illuminate\Database\Eloquent\Builder;

class ProductsTable extends DataTableComponent
{
    protected $model = Product::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function builder(): Builder
    {
        return Product::query()->with('tag');
    }

    public function columns(): array
    {
        return [
            Column::make("ID", "id")->sortable(),
            Column::make("Name", "name")->searchable()->sortable(),
            Column::make("Retail price", "retail_price")->searchable()->sortable(),
            Column::make("Trade price", "trade_price")->searchable()->sortable(),
            Column::make("Saved amount", "saved_amount")->searchable()->sortable(),
            Column::make("SKU", "sku")->searchable()->sortable(),
            Column::make("Tag", "tag.name")
            ->format(fn($value, $row, Column $column) => $value ?? 'No Tag')
            ->searchable()
            ->sortable(),
            Column::make("Created At", "created_at")->sortable(),
            ButtonGroupColumn::make('Actions')
            ->attributes(function($row) {
                return [
                    'class' => 'space-x-2',
                ];
            })
            ->buttons([
                LinkColumn::make('Edit')
                    ->title(fn($row) => 'Edit')
                    ->location(fn($row) => route('product.edit', $row))
                    ->view('tables.cells.actions')
                    ->attributes(function($row) {
                        return [
                            'class' => 'underline text-blue-500 hover:no-underline',
                        ];
                    }),
            ]),
        ];
    }
}
