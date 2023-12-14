<button type="submit" class="btn btn-default text-danger" wire:click="$dispatch('confirm', {url: '{{ $route }}'})">
    <i class="fas fa-trash"></i>
</button>
