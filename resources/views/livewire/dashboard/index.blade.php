<div class="row">

    <x-card
        title="Witaj ponownie, {{ auth()->user()->name }} 👋"
        subtitle="Data Twojej ostatniej wizyty to 23.11.2023"
        size="5"
    >
        Lorem ipsum
    </x-card>

    <x-card
        title="Statystyki"
        size="7"
    >
        <div class="row gy-3">
            <div class="col-md-3 col-6">
                <div class="d-flex align-items-center">
                    <div class="badge rounded-pill bg-label-primary me-3 p-2">
                        <i class="ti ti-shopping-cart" style="font-size: 1.35rem"></i>
                    </div>
                    <div class="card-info">
                        <h4 class="mb-0">0</h4>
                        <small class="text-muted">Zamówienia</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="d-flex align-items-center">
                    <div class="badge rounded-pill bg-label-secondary me-3 p-2">
                        <i class="ti ti-users" style="font-size: 1.35rem"></i>
                    </div>
                    <div class="card-info">
                        <h4 class="mb-0">0</h4>
                        <small class="text-muted">Klienci</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="d-flex align-items-center">
                    <div class="badge rounded-pill bg-label-danger me-3 p-2">
                        <i class="ti ti-cube" style="font-size: 1.35rem"></i>
                    </div>
                    <div class="card-info">
                        <h4 class="mb-0">0</h4>
                        <small class="text-muted">Produkty</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="d-flex align-items-center">
                    <div class="badge rounded-pill bg-label-success me-3 p-2">
                        <i class="ti ti-currency-dollar" style="font-size: 1.35rem"></i>
                    </div>
                    <div class="card-info">
                        <h4 class="mb-0">0 PLN</h4>
                        <small class="text-muted">Obrót</small>
                    </div>
                </div>
            </div>
        </div>
    </x-card>

</div>
