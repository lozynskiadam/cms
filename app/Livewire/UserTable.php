<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridColumns;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class UserTable extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Header::make(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return User::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('name')
            ->addColumn('email')
            ->addColumn('email_verified', fn (User $model) => $model->hasVerifiedEmail())
            ->addColumn('created_at_formatted', fn (User $model) => Carbon::parse($model->created_at)->format('Y-m-d H:i'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')
                ->headerAttribute(styleAttr: 'width: 10px;')
                ->sortable(),

            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Email', 'email')
                ->sortable(),

            Column::make('Email zweryfikowany', 'email_verified')
                ->toggleable(true, 'yes', 'no'),

            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->sortable()
                ->searchable(),

            Column::action('Action')
        ];
    }

    public function onUpdatedToggleable($id, $field, $value): void
    {
        $user = User::findOrFail($id);
        $user->email_verified_at = $value ? Carbon::now() : null;
        $user->save();
    }

    public function filters(): array
    {
        return [
            Filter::inputText('name')->operators(['contains']),
            Filter::select('email')
                ->dataSource(User::all())
                ->optionValue('email')
                ->optionLabel('email'),
            Filter::datepicker('created_at'),
        ];
    }

    public function actions(\App\Models\User $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit')
                ->class('btn btn-primary')
                ->route('users.view', ['user' => $row->id]),
            Button::add('delete')
                ->slot('Delete')
                ->class('btn btn-primary')
        ];
    }
}
