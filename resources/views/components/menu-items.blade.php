@if($root ?? false)
    <ul class="sidebar-nav">
@endif
@foreach($items as $item)
    @if(!$item['visible']) @continue @endif
    @if($item['url'] || $item['items'])
        <li class="sidebar-item @if($item['active']) active @endif ">
            <a
                href="{{ $item['url']}}"
                @if(empty($item['items'] ?? []))
                    class="sidebar-link"
                @else
                    class="sidebar-link @unless($item['active']) collapsed @endunless"
                    data-bs-target="#{{ $item['id'] }}"
                    data-bs-toggle="collapse"
                    aria-expanded="@if($item['active']) true @else false @endif"
                @endif
            >
                @if($item['icon'])
                    <i class="align-middle {{ $item['icon'] }}"></i>
                @endif
                <span class="align-middle">{{ $item['label'] }}</span>
                @if($item['badge'])
                    <span class="sidebar-badge badge rounded-pill bg-primary">{{ $item['badge'] }}</span>
                @endif
            </a>
            @if(!empty($item['items'] ?? []))
                <ul id="{{ $item['id'] }}" class="sidebar-dropdown list-unstyled collapse @if($item['active']) show @endif" data-bs-parent="#sidebar">
                    <x-menu-items :items="$item['items']"/>
                </ul>
            @endif
        </li>
    @else
        <li class="sidebar-header">{{ $item['label'] }}</li>
    @endif
@endforeach
@if($root ?? false)
    </ul>
@endif
