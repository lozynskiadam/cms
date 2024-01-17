<div>
    <x-card size="12" narrow>
        <table class="table">
            <thead>
            <tr>
                @foreach($this->columns() as $column)
                    <th>{{ $column['label'] }}</th>
                @endforeach
            </tr>
            </thead>
            @if($entries->isEmpty())
                <tr>
                    <td colspan="{{ count($this->columns()) }}">Brak wyników.</td>
                </tr>
            @endif
            @foreach($entries as $entry)
                <tr>
                    @foreach($this->columns() as $column)
                        <td>{!! $column['value']($entry) !!}</td>
                    @endforeach
                </tr>
            @endforeach
        </table>
    </x-card>
    @if ($lastPage > 1)
        <nav class="float-end">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" wire:click="previousPage()">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                @foreach(range(1, $lastPage) as $i)
                    @if ($i === $currentPage)
                        <li class="page-item active">
                            <span class="page-link">{{ $currentPage }}</span>
                        </li>
                    @else
                        <li class="page-item" wire:click="setPage({{ $i }})">
                            <a class="page-link" href="#">{{ $i }}</a>
                        </li>
                    @endif
                @endforeach
                <li class="page-item">
                    <a class="page-link" href="#" wire:click="nextPage()">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    @endif
</div>
