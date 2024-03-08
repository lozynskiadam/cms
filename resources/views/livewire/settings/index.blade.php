<x-row>
    <x-card size="3" narrow>
        <div class="list-group list-group-flush" role="tablist">
            <a class="list-group-item list-group-item-action active" data-bs-toggle="list" href="#app" role="tab" aria-selected="true">
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
    <x-card size="9">
        <div class="tab-content">

            <div class="tab-pane fade show active" id="app" role="tabpanel" aria-labelledby="app">
                <h4>Aplikacja</h4>

                <ul>
                    <li>Ciasteczka</li>
                </ul>
            </div>

            <div class="tab-pane fade" id="shop" role="tabpanel" aria-labelledby="shop">
                <h4>Sklep</h4>

                <ul>
                    <li>Metody płatności</li>
                    <li>Statusy zamówienia</li>
                    <li>Dostawa</li>
                    <li>Pudełka</li>
                    <li>Fakturowanie</li>
                    <li>Stawki VAT</li>
                    <li>Jednostki miary</li>
                </ul>
            </div>

            <div class="tab-pane fade" id="languages" role="tabpanel" aria-labelledby="languages">
                <h4>Wielojęzyczność</h4>

                <ul>
                    <li>Języki</li>
                    <li>Tłumaczenia</li>
                </ul>
            </div>

            <div class="tab-pane fade" id="mailing" role="tabpanel" aria-labelledby="mailing">
                <h4>Mailing</h4>

                <ul>
                    <li>Szablony Maili</li>
                </ul>
            </div>

            <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo">
                <h4>SEO</h4>

                <ul>
                    <li>Metatagi</li>
                </ul>
            </div>


        </div>
    </x-card>
</x-row>
