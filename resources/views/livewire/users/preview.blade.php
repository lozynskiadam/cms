<x-row>
    <x-card size="4" narrow>
        @include('livewire.users.partials.details')
    </x-card>

    <x-tabs size="8">
        <x-tab title="Aktywność" icon="fa fa-calendar" active="true">
            @include('livewire.users.partials.activity')
        </x-tab>
        <x-tab title="Bezpieczeństwo" icon="fa fa-key">
            @include('livewire.users.partials.security')
        </x-tab>
        <x-tab title="Historia logowań" icon="fa fa-history">
            @include('livewire.users.partials.login-history')
        </x-tab>
    </x-tabs>
</x-row>
