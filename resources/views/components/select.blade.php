<div class="mb-3 row">
    <label class="col-form-label col-sm-2 text-sm-end">{{ $label }}</label>
    <div class="col-sm-10">
        <select class="form-control" wire:model="{{ $field }}">
            @foreach($options as $key => $option)
                @if ($option instanceof UnitEnum)
                    <option value="{{ $option->value }}">@if (method_exists($option, 'label')) {{ $option->label() }}@else {{ $option->$key }}@endif</option>
                @else
                    <option value="{{ $key }}">{{ $option }}</option>
                @endif
            @endforeach
        </select>
    </div>
    @error($field) <div class="offset-sm-2 invalid-feedback d-block">{{ $message }}</div> @enderror
</div>
