<x-card size="5" title="Hasło" subtitle="Zarządzenie hasłem użytkownika" tall>
    <button class="btn btn-primary me-1">Zmień hasło</button>
    <button class="btn btn-primary" onclick="Livewire.modal.open('users.components.reset-password-modal', {user: {{ $user->id }} })">Resetuj hasło</button>
</x-card>

<x-card size="5" title="2FA" subtitle="Włącz lub wyłącz podwójne uwierzytelnienie" tall>
    Ta usługa nie została jeszcze zaimplementowana.
</x-card>

<livewire:users.components.reset-password-modal/>
