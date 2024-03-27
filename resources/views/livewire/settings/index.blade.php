<x-row>
    <x-card size="3" narrow>
        <div class="list-group list-group-flush" role="tablist">
            <a class="list-group-item list-group-item-action active" data-bs-toggle="list" href="#app" role="tab">
                Aplikacja
            </a>
            @if(\App\Models\Module::isEnabled('sales'))
                <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#shop" role="tab">
                    Sklep
                </a>
            @endif
            @if(\App\Models\Module::isEnabled('apaczka'))
                <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#apaczka" role="tab">
                    Apaczka
                </a>
            @endif
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
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#app-theme" type="button" role="tab">
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
                        <form>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="inputPassword4">Password</label>
                                    <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="inputAddress">Address</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                            </div>
                            <div class="mb-3">
                                <label for="inputAddress2">Address 2</label>
                                <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="inputCity">City</label>
                                    <input type="text" class="form-control" id="inputCity">
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="inputState">State</label>
                                    <select id="inputState" class="form-control">
                                        <option selected="">Choose...</option>
                                        <option>...</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-2">
                                    <label for="inputZip">Zip</label>
                                    <input type="text" class="form-control" id="inputZip">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-check m-0">
                                    <input type="checkbox" class="form-check-input">
                                    <span class="form-check-label">Check me out</span>
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">Zapisz</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="app-unknown" role="tabpanel">
                        [konfiguracja]
                    </div>
                    <div class="tab-pane fade" id="app-theme" role="tabpanel">
                        <table class="table">
                            @foreach(['Kolor czarny' => '#000000','Kolor czcionki ciemny' => '#3B3B3B','Kolor czcionki regularny' => '#6C6C6C','Kolor czcionki jasny' => '#989898','Kolor szary ciemny' => '#A7A7A7','Kolor szary regularny' => '#BCBCBC','Kolor szary jasny' => '#?','Kolor dymu ciemny' => '#CECECE','Kolor dymu regularny' => '#F2F2F2','Kolor dymu jasny' => '#?','Kolor biały' => '#FFFFFF','Kolor błędu ciemny' => '#801616','Kolor błędu regularny' => '#b50000','Kolor błędu jasny' => '#ff6161','Kolor powodzenia ciemny' => '#0c5e30','Kolor powodzenia regularny' => '#2e8b57','Kolor powodzenia jasny' => '#61df98','Kolor komunikatu ciemny' => '#12519a','Kolor komunikatu regularny' => '#2f73c3','Kolor komunikatu jasny' => '#7fb6f8','Kolor główny akcent ciemny' => '#a0594e','Kolor główny akcent regularny' => '#ec805e','Kolor główny akcent jasny' => '#fcf2e6','Kolor dodatkowy akcent ciemny' => '#686230','Kolor dodatkowy akcent regularny' => '#a2a183','Kolor dodatkowy akcent jasny' => '#e5e4d2'] as $name => $color)
                                <tr>
                                    <td style="width: 200px;">
                                        <div class="input-group">
                                            <div style="width: 33px; height: 33px; background: {{$color}}; border: 1px solid #ccc; border-radius: 5px;"></div>
                                            <input type="text" class="form-control" value="{{ $color }}"/>
                                        </div>
                                    </td>
                                    <td>{{ $name }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </x-card>
        </div>


        {{-- Sklep --}}
        @if(\App\Models\Module::isEnabled('sales'))
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
        @endif

        {{-- apaczka --}}
        @if(\App\Models\Module::isEnabled('apaczka'))
            <div class="tab-pane fade" id="apaczka" role="tabpanel">
                <nav>
                    <div class="nav nav-pills mb-3" id="nav-tab" role="tablist">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#apaczka-unknown" type="button" role="tab">
                            Konfiguracja
                        </button>
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#apaczka-unknown" type="button" role="tab">
                            Punkty nadań
                        </button>
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#apaczka-unknown" type="button" role="tab">
                            Opcje dodatkowe
                        </button>
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#apaczka-unknown" type="button" role="tab">
                            Powiadomienia
                        </button>
                    </div>
                </nav>
                <x-card>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="apaczka-unknown" role="tabpanel">
                            [konfiguracja]
                        </div>
                    </div>
                </x-card>
            </div>
        @endif

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
                        Dane SMTP
                    </button>
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#mailing-unknown" type="button" role="tab">
                        Szablon
                    </button>
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#mailing-unknown" type="button" role="tab">
                        Treści
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
