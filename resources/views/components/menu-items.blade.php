@foreach($items as $item)
    <li class="sidebar-item @if($item['active']) active @endif ">
        <a
            @if($item['url'])
                href="{{ $item['url']}}"
            @endif
            @if(empty($item['items'] ?? []))
                class="sidebar-link"
            @else
                class="sidebar-link collapsed"
                data-bs-target="#{{ $item['id'] }}"
                data-bs-toggle="collapse"
                aria-expanded="false"
            @endif
        >
            @if($item['icon'])
                <i class="align-middle {{ $item['icon'] }}" style="font-size: 18px;"></i>
            @endif
            <span class="align-middle">{{ $item['label'] }}</span>
        </a>
        @if(!empty($item['items'] ?? []))
            <ul id="{{ $item['id'] }}" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                <x-menu-items :items="$item['items']" :root="false"/>
            </ul>
        @endif
    </li>
@endforeach
