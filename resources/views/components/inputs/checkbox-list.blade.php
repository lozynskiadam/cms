<div class="mb-3 row">
    <label class="col-form-label col-sm-2 text-sm-end">{{ $label }}</label>
    <div class="col-sm-10 mt-1">
        @foreach($options as $key => $option)
            <div class="form-check form-switch">
                <input type="checkbox" wire:model="{{ $field }}" class="form-check-input" id="{{ Str::of($label)->slug() }}-{{ Str::of($option)->slug() }}" value="{{ $option }}"/>
                <label for="{{ Str::of($label)->slug() }}-{{ Str::of($option)->slug() }}" class="form-check-label">{{ $option }}</label>
            </div>
        @endforeach
    </div>
    @error($field) <div class="offset-sm-2 invalid-feedback d-block">{{ $message }}</div> @enderror
</div>
