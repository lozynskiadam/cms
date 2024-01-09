<?php

namespace App\Livewire\Users;

use App\Enums\UserStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridColumns;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

class Table extends PowerGridComponent
{
    protected $listeners = [
        '$refresh'
    ];

    public function datasource(): Builder
    {
        return User::query();
    }

    public function setUp(): array
    {
        return [
            Footer::make()->showPerPage()->showRecordCount(),
        ];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('full_name', function (User $model) {
                $html[] = "<div class='d-flex flex-column'>";
                $html[] = "<div style='font-weight: 500;'>" .$model->name . "</div>";
                $html[] = "<small class='text-muted'>$model->email</small>";
                $html[] = "</div>";

                return implode("\r\n", $html);
            })
            ->addColumn('status_label', fn(User $model) => $model->status->render())
            ->addColumn('email_verified', fn(User $model) => $model->hasVerifiedEmail())
            ->addColumn('created_at_formatted', fn(User $model) => Carbon::parse($model->created_at)->format('d.m.Y H:i'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')
                ->headerAttribute(styleAttr: 'width: 0;')
                ->sortable(),

            Column::make('Nazwa', 'full_name', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Status', 'status_label', 'status')
                ->sortable()
                ->searchable(),

            Column::make('Email zweryfikowany', 'email_verified', 'email_verified_at')
                ->headerAttribute(styleAttr: 'width: 0;')
                ->bodyAttribute(classAttr: 'text-center')
                ->toggleable(true, 'yes', 'no')
                ->sortable()
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

            Filter::inputText('name')
                ->placeholder('Nazwa lub email')
                ->operators(['contains'])
                ->builder(function (Builder $query, mixed $value) {
                    return $query->where(DB::raw('CONCAT(name, email)'), 'like', "%{$value['value']}%");
                }),

            Filter::datepicker('created_at'),

            Filter::enumSelect('status')
                ->dataSource(UserStatus::cases())
                ->optionLabel('name'),

            Filter::boolean('email_verified_at')
                ->label('Tak', 'Nie')
                ->builder(function (Builder $query, string $value) {
                    if ($value === 'true') {
                        return $query->whereNot('email_verified_at', '=', null);
                    }
                    return $query->where('email_verified_at', '=', null);
                }),
        ];
    }

    public function actions(User $row): array
    {
        return [
            Button::add()->bladeComponent('button-view', [
                'model' => $row,
                'route' => route('users.preview', ['user' => $row->id]),
            ]),

            Button::add()->bladeComponent('button-delete', [
                'modal' => 'users.delete-modal',
                'data' => "{user: $row->id}",
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

        $this->dispatch('pg:eventRefresh-default')->to(self::class);
        $this->js("
            toastr['success']('Użytkownik \"{$user->name}\" został wygenerowany.', null, {
                positionClass: 'toast-bottom-right',
                progressBar: true,
            });
        ");
    }
}
