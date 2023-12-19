<div class="tab-pane fade @if($active ?? false) show active @endif" id="tab-{{ Str::of($title)->slug() }}" role="tabpanel">
    <div class="row">
        {{ $slot }}
    </div>
</div>
@php
\App\View\Components\Tabs::push([
    'title' => $title,
    'icon' => $icon ?? false,
    'active' => $active ?? false
])
@endphp
