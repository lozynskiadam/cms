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
                        <i class="ti ti-chart-pie-2" style="font-size: 1.35rem"></i>
                    </div>
                    <div class="card-info">
                        <h4 class="mb-0">230k</h4>
                        <small class="text-muted">Sales</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="d-flex align-items-center">
                    <div class="badge rounded-pill bg-label-info me-3 p-2">
                        <i class="ti ti-users" style="font-size: 1.35rem"></i>
                    </div>
                    <div class="card-info">
                        <h4 class="mb-0">8.549k</h4>
                        <small class="text-muted">Customers</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="d-flex align-items-center">
                    <div class="badge rounded-pill bg-label-danger me-3 p-2">
                        <i class="ti ti-shopping-cart" style="font-size: 1.35rem"></i>
                    </div>
                    <div class="card-info">
                        <h4 class="mb-0">1.423k</h4>
                        <small class="text-muted">Products</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="d-flex align-items-center">
                    <div class="badge rounded-pill bg-label-success me-3 p-2">
                        <i class="ti ti-currency-dollar" style="font-size: 1.35rem"></i>
                    </div>
                    <div class="card-info">
                        <h4 class="mb-0">$9745</h4>
                        <small class="text-muted">Revenue</small>
                    </div>
                </div>
            </div>
        </div>
    </x-card>

</div>
