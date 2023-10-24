@extends("user.layouts.index")
@section("title", "")
@vite(["resources/sass/services.scss",
    "resources/sass/price-input.scss",
    "resources/sass/favorite-star.scss",
    "resources/js/price-input.js",
    "resources/js/filter.js",
    "resources/js/filter-togle-btn-arrow.js",
    "resources/js/cabinet-favorite.js",
    ])
@section("content")
    <main class="main">
        <div class="main__container">
            <div class="main__services">
                <div class="services__services-section">
                    <livewire:user.services.filter/>
                    <div class="services-section__services-content">
                        <button class="services-content__button">
                            Фільтри
                        </button>
                        <div class="services-content__sort-filtration">
                            @if(request()->all())
                                <div class="services-content__clear-filter">
                                    <a href="{{request()->url()}}">Очисти фільтри</a>
                                </div>
                            @endif
                            <div class="services-content__sort">
                                <livewire:user.services.sort/>
                            </div>
                        </div>
                        @if($services->count() > 0)
                            @foreach($services as $service)
                                <div class="services-content__services-card">
                                    <div class="services-card__image-section">
                                        @if(!empty(explode("|", $service->photo)[0]))
                                            <a href="{{route("user.services.services-item.show", $service)}}">
                                                <img class="image-section__image"
                                                     src="{{asset(explode("|", $service->photo)[0])}}">
                                            </a>
                                        @else
                                            <a href="{{route("user.services.services-item.show", $service)}}">
                                                <img class="image-section__image"
                                                     src="{{asset("storage/image/no-image.png")}}">
                                            </a>
                                        @endif
                                        @if($service->is_delivery)
                                            <div class="image-section__delivery-section">
                                                <div class="delivery-section__delivery">
                                                    <svg width="1em" height="1em" viewBox="0 0 24 24"
                                                         xmlns="http://www.w3.org/2000/svg"
                                                         class="css-d7r8uj">
                                                        <path
                                                                d="M21 15.999h-.343A3.501 3.501 0 0 0 17.5 14a3.501 3.501 0 0 0-3.156 1.997l-4.687.002A3.5 3.5 0 0 0 6.5 14a3.5 3.5 0 0 0-3.158 2L3 16.002V5h11v6l1 1h6v3.999zM17.5 19c-.827 0-1.5-.673-1.5-1.5s.673-1.5 1.5-1.5 1.5.673 1.5 1.5-.673 1.5-1.5 1.5zm-11 0c-.827 0-1.5-.673-1.5-1.5S5.673 16 6.5 16s1.5.673 1.5 1.5S7.327 19 6.5 19zm12-12 2.25 3H16V7h2.5zm1-2H16V4l-1-1H2L1 4v13.002l1.001 1 1.039-.001A3.503 3.503 0 0 0 6.5 21a3.502 3.502 0 0 0 3.46-3l4.08-.003A3.503 3.503 0 0 0 17.5 21a3.502 3.502 0 0 0 3.46-3.001H22l1-1V9.665L19.5 5z"
                                                                fill="currentColor" fill-rule="evenodd"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="services-card__card-description">
                                        <div class="card-description__upper-section-card">
                                            <a class="upper-section-card__title-link"
                                               href="{{ route("user.services.services-item.show", $service) }}">
                                                <div class="upper-section-card__title">
                                                    {{$service->title}}
                                                </div>
                                            </a>
                                            <div class="upper-section-card__price">
                                                {{$service->price . " грн"}}
                                            </div>
                                        </div>
                                        <div class="card-description__service-description-card">
                                            {!! htmlspecialchars_decode($service->description) !!}
                                        </div>
                                        <span class="card-description__status">
                                        @include("user.logic.user-account.services.logic", ["service" => $service])
                                    </span>
                                        <div class="card-description__bottom-section-card">
                                            <div class="bottom-section-card__date">
                                                {{\Carbon\Carbon::parse($service->created_at)->isoFormat('D MMMM YYYY', 'Do MMMM YYYY')}}
                                            </div>
                                            <div class="bottom-section-card__favorite">
                                                <livewire:user.services.favorite :serviceId="$service->id"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <span style="font-size: 20px; font-weight: 600">Пусто, нічого нема.</span>
                        @endif
                    </div>
                </div>
                {{$services->links()}}
            </div>
        </div>
    </main>

    <script>
        Livewire.on('updateSort', sort => {
            const url = new URL(window.location.href);
            url.searchParams.set('sort', sort);
            window.history.pushState({}, '', url.toString());
        });

        Livewire.on('updateFilter', data => {
            const url = new URL(window.location.href);
            url.searchParams.set('min', data.min);
            url.searchParams.set('max', data.max);
            window.history.pushState({}, '', url.toString());
        });
    </script>

@endsection
