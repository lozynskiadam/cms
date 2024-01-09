<?php

namespace App\Livewire\Files;

use App\Models\File;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
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
        return File::query();
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
            ->addColumn('is_private_formatted', fn(File $model) => $model->is_private
                ? '<i class="fa fa-lock"></i> Prywatny'
                : '<i class="fa fa-earth"></i> Publiczny'
            )
            ->addColumn('preview', fn(File $model) => $model->getPreview())
            ->addColumn('size', fn(File $model) => $model->getFormattedSize())
            ->addColumn('created_at_formatted', fn(File $model) => Carbon::parse($model->created_at)->format('d.m.Y H:i'));
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->headerAttribute(styleAttr: 'width: 0;')
                ->sortable(),

            Column::make('Podgląd', 'preview')
                ->headerAttribute(styleAttr: 'width: 75px;')
                ->bodyAttribute(classAttr: 'text-center'),

            Column::make('Nazwa', 'name')
                ->searchable()
                ->sortable(),

            Column::make('Typ', 'type')
                ->searchable()
                ->sortable(),

            Column::make('Waga', 'size')
                ->headerAttribute(styleAttr: 'width: 150px;')
                ->bodyAttribute(classAttr: 'text-end')
                ->sortable(),

            Column::make('Widoczność', 'is_private_formatted', 'is_private')
                ->headerAttribute(styleAttr: 'width: 170px;')
                ->bodyAttribute(classAttr: 'text-center')
                ->searchable()
                ->sortable(),

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
                ->operators(['contains']),

            Filter::inputText('type')
                ->operators(['contains']),

            Filter::boolean('is_private')
                ->label('Prywatny', 'Publiczny'),

            Filter::datepicker('created_at'),
        ];
    }

    public function actions(File $row): array
    {
        return [
            Button::add()->bladeComponent('button-view', [
                'model' => $row,
                'route' => route('files.preview', ['file' => $row->id]),
            ]),

            Button::add()->bladeComponent('button-delete', [
                'modal' => 'files.delete-modal',
                'data' => "{file: $row->id}",
            ]),
        ];
    }

    #[On('factory')]
    public function factory(): void
    {
        $file = File::factory()->createOne();

        $this->dispatch('pg:eventRefresh-default')->to(self::class);
        $this->js("
            toastr['success']('Plik \"{$file->name}\" został wygenerowany.', null, {
                positionClass: 'toast-bottom-right',
                progressBar: true,
            });
        ");
    }
}
