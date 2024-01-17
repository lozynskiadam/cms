<div>
    <x-card size="12" narrow>
        <table class="table">
            <thead>
            <tr>
                <th>Data</th>
                <th>IP</th>
                <th>Efekt</th>
            </tr>
            </thead>
            @foreach($entries as $entry)
                <tr>
                    <td>{{ $entry->created_at }}</td>
                    <td>{{ $entry->ip }}</td>
                    <td>
                        @if ($entry->success)
                            <i class="fa fa-check text-success"></i>
                        @else
                            <i class="fa fa-ban text-danger"></i>
                        @endif
                    </td>
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
                    @if($i === $currentPage)
                        <li class="page-item active"><span class="page-link">{{ $currentPage }}</span></li>
                    @else
                        <li class="page-item" wire:click="setPage({{ $i }})"><a class="page-link" href="#">{{ $i }}</a></li>
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
