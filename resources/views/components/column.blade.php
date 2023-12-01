@php
/**
 * @property int|null $size - Size of card wrapper in range [0 - 12]. When size is null, card won't be wrapped.
 */
@endphp

<div class="col-md-{{ $size }}">
    {{ $slot }}
</div>
