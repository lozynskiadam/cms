@php
/**
 * @property array[] $tabs
 * @property int|null $size - Size of tabs wrapper in range [0 - 12]. When size is null, card won't be wrapped.
 */
@endphp

@if ($size ?? false)
    <div class="col-md-{{ $size }}">
@endif
<ul class="nav nav-pills mb-3" role="tablist">
    @foreach($tabs as $tab)
        <li class="nav-item" role="presentation">
            <button class="nav-link @if($tab['active'] ?? false) active @endif" data-bs-toggle="pill" data-bs-target="#tab-{{ Str::of($tab['title'])->slug() }}" type="button" role="tab">
                <i class="{{ $tab['icon'] }} me-1"></i> {{ $tab['title'] }}
            </button>
        </li>
    @endforeach
</ul>
<div class="tab-content">
    @foreach($tabs as $tab)
    <div class="tab-pane fade @if($tab['active'] ?? false) show active @endif" id="tab-{{ Str::of($tab['title'])->slug() }}" role="tabpanel">
        <x-card>
            @include($tab['view'])
        </x-card>
    </div>
    @endforeach
</div>
@if ($size ?? false)
    </div>
@endif
