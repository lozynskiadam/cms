<x-card size="12" narrow>
    <table class="table">
        <thead>
        <tr>
            <th>Data</th>
            <th>IP</th>
            <th>Efekt</th>
        </tr>
        </thead>
        @foreach($user->loginEntries()->get() as $loginEntry)
            <tr>
                <td>{{ $loginEntry->created_at }}</td>
                <td>{{ $loginEntry->ip }}</td>
                <td>
                    @if ($loginEntry->success)
                        <i class="fa fa-check text-success"></i>
                    @else
                        <i class="fa fa-ban text-danger"></i>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
</x-card>
