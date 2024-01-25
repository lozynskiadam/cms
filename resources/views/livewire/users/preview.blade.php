<x-row>
    <x-card size="4" narrow>
        @include('livewire.users.partials.details')
    </x-card>

    <x-tabs size="8">
        <x-tab title="Bezpieczeństwo" icon="fa fa-key" active="true">
            @include('livewire.users.partials.security')
        </x-tab>
        <x-tab title="Historia logowań" icon="fa fa-history">
            <livewire:users.components.login-history :user="$user"/>
        </x-tab>
    </x-tabs>
</x-row>
