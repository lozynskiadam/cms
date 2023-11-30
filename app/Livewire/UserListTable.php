<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridColumns;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

class UserListTable extends PowerGridComponent
{
    public function datasource(): Builder
    {
        return User::query();
    }

    public function setUp(): array
    {
        return [
            Header::make(),

            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('full_name', function (User $model) {
                $html[] = $model->name;
                $html[] = "<small>$model->email</small>";
                return implode('<br/>', $html);
            })
            ->addColumn('email')
            ->addColumn('email_verified', fn(User $model) => $model->hasVerifiedEmail())
            ->addColumn('created_at_formatted', fn(User $model) => Carbon::parse($model->created_at)->format('d.m.Y H:i'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')
                ->headerAttribute(styleAttr: 'width: 0;')
                ->sortable(),

            Column::make('Nazwa', 'full_name')
                ->sortable()
                ->searchable(),

            Column::make('Email zweryfikowany', 'email_verified')
                ->headerAttribute(styleAttr: 'width: 0;')
                ->bodyAttribute(classAttr: 'text-center')
                ->toggleable(true, 'yes', 'no')
                ->searchable(),

            Column::make('Data utworzenia', 'created_at_formatted', 'created_at')
                ->headerAttribute(styleAttr: 'width: 200px;')
                ->bodyAttribute(classAttr: 'text-center')
                ->sortable()
                ->searchable(),

            Column::action('Akcje')
                ->headerAttribute(styleAttr: 'width: 0;')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::inputText('id')
                ->placeholder(' ')
                ->operators(['contains']),

            Filter::inputText('full_name')
                ->placeholder('Nazwa lub email')
                ->operators(['contains'])
                ->builder(function (Builder $query, mixed $value) {
                    return $query->where(DB::raw('CONCAT(name, email)'), 'like', "%{$value['value']}%");
                }),

            Filter::datepicker('created_at'),

            Filter::boolean('email_verified')
                ->label('Tak', 'Nie')
                ->builder(function (Builder $query, string $value) {
                    if ($value === 'true') {
                        return $query->whereNot('email_verified_at', '=', null);
                    }
                    return $query->where('email_verified_at', '=', null);
                }),
        ];
    }

    public function actions(\App\Models\User $row): array
    {
        return [
            Button::add()->bladeComponent('button-view', [
                'model' => $row,
                'route' => route('users.view', ['user' => $row->id]),
            ]),

            Button::add()->bladeComponent('button-edit', [
                'model' => $row,
                'route' => route('users.edit', ['user' => $row->id]),
            ]),

            Button::add()->bladeComponent('button-delete', [
                'model' => $row,
                'route' => route('users.delete', ['user' => $row->id]),
            ]),
        ];
    }

    public function onUpdatedToggleable($id, $field, $value): void
    {
        if ($field === 'email_verified') {
            $user = User::findOrFail($id);
            $user->email_verified_at = $value ? Carbon::now() : null;
            $user->save();
        }
    }

    #[On('factory')]
    public function factory(): void
    {
        $user = User::factory()->createOne();

        $this->dispatch('pg:eventRefresh-default')->to(UserListTable::class);
        $this->js("
            toastr['success']('Użytkownik \"{$user->name}\" został wygenerowany.', null, {
                positionClass: 'toast-bottom-right',
                progressBar: true,
            });
        ");
    }
}
