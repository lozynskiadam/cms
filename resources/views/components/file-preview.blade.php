<a href="{{ $file->getUrl() }}" target="_blank">
    @if ($file->isImage())
        <img style="max-width: {{ $width ?? 75 }}px; max-height: {{ $height ?? 75 }}px;" src="{{ $file->getUrl() }}"/>
    @else
        <i class='fa fa-file fa-3x'></i>
    @endif
</a>
