<?php

namespace App\Livewire;

use App\Models\Tag;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class TagsTable extends DataTableComponent
{
    protected $model = Tag::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("ID", "id")->sortable(),
            Column::make("Name", "name")->searchable()->sortable(),
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
                    ->location(fn($row) => route('tag.edit', $row))
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
