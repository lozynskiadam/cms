@php
$modules = [
    [
        'name' => 'blog',
        'label' => 'Blog',
        'description' => 'Włącza podstawowe funkcje bloga',
        'enabled' => true,
        'available' => true,
    ],
    [
        'name' => 'shop',
        'label' => 'Sklep',
        'description' => 'Włącza podstawowe funkcje sklepu internetowego',
        'enabled' => false,
        'available' => true,
    ],
    [
        'name' => 'promotions',
        'label' => 'Promocje',
        'description' => 'Włącza możliwość zarządzania promocjami',
        'enabled' => false,
        'available' => false,
    ],
    [
        'name' => 'apaczka',
        'label' => 'Apaczka',
        'description' => 'Włącza integracje z serwisem Apaczka',
        'enabled' => false,
        'available' => false,
    ],
    [
        'name' => 'payu',
        'label' => 'PayU',
        'description' => 'Włącza integracje z dostawcą płatności PayU',
        'enabled' => false,
        'available' => false,
    ],
    [
        'name' => 'przelewy24',
        'label' => 'Przelewy24',
        'description' => 'Włącza integracje z dostawcą płatności Przelewy24',
        'enabled' => false,
        'available' => false,
    ]
]
@endphp
<style>
    .option-card {
        border: 1px solid #ccc;
        cursor: pointer;
        height: calc(100% - 1.25rem);
    }

    .option-card.active {
        border: 1px solid var(--bs-primary);
        box-shadow: 0px 2px 5px 0px #3b7ddd75;
    }

    .option-card .form-switch {
        position: absolute;
        top: 10px;
        right: 15px;
    }

    .option-card .form-switch .form-check-input {
        width: 46px;
        height: 25px;
        pointer-events: none;
    }

    .option-card.option-card-disabled {
        background: #f0f0f0;
        border: 1px solid #ccc;
        cursor: default;
        opacity: 0.85;
    }
</style>

<div class="row">

    <div class="col-md-12 mb-1">
        <h5>Dostępne</h5>
        <hr/>
    </div>

    @foreach($modules as $module)
        @unless ($module['available'])
            @continue
        @endif
        <div class="col-md-2">
            <div class="card option-card @if($module['enabled']) active @endif" onclick="module_{{ $module['name'] }}.click()">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        {{ $module['label'] }}
                    </h5>
                    <div class="form-switch">
                        <input type="hidden" name="status" value="0">
                        <input type="checkbox" id="module_{{ $module['name'] }}" class="form-check-input" name="status" value="1" role="button" @if($module['enabled']) checked @endif>
                    </div>
                </div>
                <div class="card-body small">
                    {{ $module['description'] }}
                </div>
            </div>
        </div>
    @endforeach

    <div class="col-md-12 mt-3 mb-1">
        <h5>Niedostępne</h5>
        <hr/>
    </div>


    @foreach($modules as $module)
        @if ($module['available'])
            @continue
        @endif
        <div class="col-md-2">
            <div class="card option-card option-card-disabled" data-bs-toggle="tooltip" title="Wymaga: Sklep">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        {{ $module['label'] }}
                    </h5>
                </div>
                <div class="card-body small">
                    {{ $module['description'] }}
                </div>
            </div>
        </div>
    @endforeach
</div>
