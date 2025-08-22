<?php

namespace App\Livewire;

// use Livewire\Component;
use App\Models\User;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class UsersTable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("ID", "id")->sortable(),
            Column::make("Name", "name")->searchable()->sortable(),
            Column::make("Email", "email")->searchable()->sortable(),
            Column::make("Created At", "created_at")->sortable(),
        ];
    }
}
