<?php

namespace App\Livewire;

// use Livewire\Component;

use App\Models\Catalog;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class CatalogsTable extends DataTableComponent
{
    protected $model = Catalog::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("ID", "id")->sortable(),
            Column::make("Title", "title")->searchable()->sortable(),
            Column::make("Layout Type", "layout_type")->searchable()->sortable(),
            Column::make("Brand Color", "brand_color")->searchable()->sortable(),
            Column::make("Created At", "created_at")->sortable(),
            ButtonGroupColumn::make('Actions')
            ->attributes(function($row) {
                return [
                    'class' => 'space-x-2',
                ];
            })
            ->buttons([
                // LinkColumn::make('View') // make() has no effect in this case but needs to be set anyway
                //     ->title(fn($row) => 'View ' . $row->name)
                //     ->location(fn($row) => route('user.show', $row))
                //     ->attributes(function($row) {
                //         return [
                //             'class' => 'underline text-blue-500 hover:no-underline',
                //         ];
                //     }),
                LinkColumn::make('Edit')
                    ->title(fn($row) => 'Edit ' . $row->name)
                    ->location(fn($row) => route('catalog.edit', $row))
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
