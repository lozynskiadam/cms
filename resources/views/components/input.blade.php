<div class="mb-3 row">
    <label class="col-form-label col-sm-2 text-sm-end">{{ $label }}</label>
    <div class="col-sm-10">
        <input class="form-control" type="text" @if (isset($value)) value="{{ $value }}" @endif wire:model="{{ $field }}">
    </div>
    @error($field) <div class="offset-sm-2 invalid-feedback d-block">{{ $message }}</div> @enderror
</div>
