<?php

namespace App\Livewire;

// use Livewire\Component;
use App\Models\User;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Illuminate\Database\Eloquent\Builder;

class UsersTable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function builder(): Builder
    {
        return User::query()->with('roles');
    }

    public function columns(): array
    {
        return [
            Column::make("ID", "id")->sortable(),
            Column::make("Name", "name")->searchable()->sortable(),
            Column::make("Email", "email")->searchable()->sortable(),
            Column::make("Role")
            ->label(function($row) {
                return $row->roles->first()?->name ?? 'No Role';
            }),
            Column::make("Created At", "created_at")->sortable(),
        ];
    }
}
