<div class="card option-card @if($module->is_enabled) active @endif" onclick="m_{{ $module->name }}.click()">
    <div class="card-header">
        <h5 class="card-title mb-0">
            {{ $module->label }}
        </h5>
        <div class="form-switch">
            <input type="checkbox" id="m_{{ $module->name }}" class="form-check-input" x-on:change="$wire.submit()" role="button" @if($module->is_enabled) checked @endif>
        </div>
    </div>
    <div class="card-body small">
        {{ $module->description }}
    </div>
</div>
