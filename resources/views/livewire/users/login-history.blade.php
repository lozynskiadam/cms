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
    <div>
        <button type="button" class="btn btn-primary" wire:click="previousPage()"><</button>
        Strona {{ $currentPage }} / {{ $lastPage }}
        <button type="button" class="btn btn-primary" wire:click="nextPage()">></button>
    </div>
</x-card>
