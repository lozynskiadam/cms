<div class="col-md-{{ $size }}">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title m-0 me-2">{{ $title }}</h5>
            @if ($subtitle ?? false) <small class="text-muted">{{ $subtitle }}</small> @endif
        </div>
        @unless ($narrow ?? false) <div class="card-body"> @endunless
            {{ $slot }}
        @unless ($narrow ?? false) </div> @endunless
    </div>
</div>
