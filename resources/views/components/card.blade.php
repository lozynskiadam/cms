@php
/**
 * @property int|null $size - Size of card wrapper in range [0 - 12]. When size is null, card won't be wrapped.
 * @property string|null $title - Card header title.
 * @property string|null $subtitle - Card header subtitle.
 * @property bool|null $narrow - Do not wrap slot content by "card-body".
 */
@endphp

@if ($size ?? false)
    <div class="col-md-{{ $size }}">
@endif
    <div class="card">
        @if (($title ?? false) || ($subtitle ?? false))
            <div class="card-header">
                @if ($title ?? false) <h5 class="card-title m-0 me-2">{{ $title }}</h5> @endif
                @if ($subtitle ?? false) <small class="text-muted">{{ $subtitle }}</small> @endif
            </div>
        @endif
        @unless ($narrow ?? false) <div class="card-body"> @endunless
            {{ $slot }}
        @unless ($narrow ?? false) </div> @endunless
    </div>
@if ($size ?? false)
    </div>
@endif
