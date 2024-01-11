<x-modal :title="$this->title()" :id="$this->modalId()" :size="$this->size()->value">
    @unless($initialized)
        <div class="text-center">
            <i class="fa fa-sync-alt fa-3x fa-spin"></i>
        </div>
    @endunless
    @if($initialized)
        @include('livewire.'.$this->getName())
    @endif
</x-modal>
