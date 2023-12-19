<?php

namespace App\Livewire;

use App\Models\File;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Livewire\Attributes\On;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridColumns;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class FileListTable extends PowerGridComponent
{
    public function datasource(): Builder
    {
        return File::query();
    }

    public function setUp(): array
    {
        return [
            Header::make()->showSearchInput(),

            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('name')
            ->addColumn('name_lower', fn (File $model) => strtolower(e($model->name)))
            ->addColumn('created_at')
            ->addColumn('created_at_formatted', fn (File $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->searchable()
                ->sortable(),

            Column::make('Name', 'name')
                ->searchable()
                ->sortable(),

            Column::make('Created at', 'created_at')
                ->hidden(),

            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->searchable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::inputText('name')
                ->operators(['contains']),
            Filter::datepicker('created_at_formatted', 'created_at'),
        ];
    }

    public function actions(File $row): array
    {
        return [
            Button::add()->bladeComponent('button-view', [
                'model' => $row,
                'route' => route('files.view', ['file' => $row->id]),
            ]),

            Button::add()->bladeComponent('button-delete', [
                'model' => $row,
                'route' => route('files.delete', ['file' => $row->id]),
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
