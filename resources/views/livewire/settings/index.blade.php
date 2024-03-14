<x-row>
    <x-card size="3" narrow>
        <div class="list-group list-group-flush" role="tablist">
            <a class="list-group-item list-group-item-action active" data-bs-toggle="list" href="#app" role="tab">
                Aplikacja
            </a>
            <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#shop" role="tab">
                Sklep
            </a>
            <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#languages" role="tab">
                Wielojęzyczność
            </a>
            <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#mailing" role="tab">
                Mailing
            </a>
            <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#seo" role="tab">
                SEO
            </a>
        </div>
    </x-card>
    <div class="tab-content col-md-9">


        {{-- Aplikacja --}}
        <div class="tab-pane fade show active" id="app" role="tabpanel">
            <nav>
                <div class="nav nav-pills mb-3" id="nav-tab" role="tablist">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#app-general" type="button" role="tab">
                        Ustawienia ogólne
                    </button>
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#app-unknown" type="button" role="tab">
                        Motyw
                    </button>
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#app-unknown" type="button" role="tab">
                        Ciasteczka
                    </button>
                </div>
            </nav>
            <x-card>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="app-general" role="tabpanel">
                        <div class="mb-2">
                            <h6 class="mb-1">Logo</h6>
                            <div class="text-muted small">Domyślne logo, które zostanie użyte w mailach oraz elementach strony.</div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="app-unknown" role="tabpanel">
                        [konfiguracja]
                    </div>
                </div>
            </x-card>
        </div>


        {{-- Sklep --}}
        <div class="tab-pane fade" id="shop" role="tabpanel">
            <nav>
                <div class="nav nav-pills mb-3" id="nav-tab" role="tablist">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#shop-unknown" type="button" role="tab">
                        Metody płatności
                    </button>
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#shop-unknown" type="button" role="tab">
                        Statusy zamówienia
                    </button>
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#shop-unknown" type="button" role="tab">
                        Dostawa
                    </button>
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#shop-unknown" type="button" role="tab">
                        Pudełka
                    </button>
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#shop-unknown" type="button" role="tab">
                        Stawki VAT
                    </button>
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#shop-unknown" type="button" role="tab">
                        Jednostki miary
                    </button>
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#shop-unknown" type="button" role="tab">
                        PayU
                    </button>
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#shop-unknown" type="button" role="tab">
                        Apaczka
                    </button>
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#shop-unknown" type="button" role="tab">
                        Fakturownia
                    </button>
                </div>
            </nav>
            <x-card>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="shop-unknown" role="tabpanel">
                        [konfiguracja]
                    </div>
                </div>
            </x-card>
        </div>


        {{-- Wielojęzyczność --}}
        <div class="tab-pane fade" id="languages" role="tabpanel">
            <nav>
                <div class="nav nav-pills mb-3" id="nav-tab" role="tablist">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#languages-unknown" type="button" role="tab">
                        Języki
                    </button>
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#languages-unknown" type="button" role="tab">
                        Tłumaczenia
                    </button>
                </div>
            </nav>
            <x-card>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="languages-unknown" role="tabpanel">
                        [konfiguracja]
                    </div>
                </div>
            </x-card>
        </div>


        {{-- Mailing --}}
        <div class="tab-pane fade" id="mailing" role="tabpanel">
            <nav>
                <div class="nav nav-pills mb-3" id="nav-tab" role="tablist">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#mailing-unknown" type="button" role="tab">
                        Dane smtp
                    </button>
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#mailing-unknown" type="button" role="tab">
                        Szablony Maili
                    </button>
                </div>
            </nav>
            <x-card>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="mailing-unknown" role="tabpanel">
                        [konfiguracja]
                    </div>
                </div>
            </x-card>
        </div>


        {{-- SEO --}}
        <div class="tab-pane fade" id="seo" role="tabpanel">
            <nav>
                <div class="nav nav-pills mb-3" id="nav-tab" role="tablist">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#seo-unknown" type="button" role="tab">
                        Metatagi
                    </button>
                </div>
            </nav>
            <x-card>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="seo-unknown" role="tabpanel">
                        [konfiguracja]
                    </div>
                </div>
            </x-card>
        </div>


    </div>
</x-row>
