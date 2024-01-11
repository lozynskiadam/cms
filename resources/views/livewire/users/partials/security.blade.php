<x-card size="12" title="Hasło" subtitle="Zarządzenie hasłem użytkownika">
    <button class="btn btn-primary me-1">Zmień hasło</button>
    <button class="btn btn-primary" onclick="Livewire.modal.open('users.reset-password-modal', {user: {{ $user->id }} })">Resetuj hasło</button>
</x-card>

<x-card size="12" title="2FA" subtitle="Włącz lub wyłącz podwójne uwierzytelnienie">
    <button class="btn btn-primary">Włącz</button>
</x-card>

<livewire:users.reset-password-modal/>
