<x-column size="12">
    <livewire:users.table/>
    <livewire:users.edit-modal :user="new \App\Models\User"/>
    <livewire:users.delete-modal :user="new \App\Models\User"/>
</x-column>
