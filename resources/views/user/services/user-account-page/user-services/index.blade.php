@extends("user.services.user-account-page.index")
@vite(["resources/sass/user-account.scss", "resources/sass/favorite-star.scss"])
@section("title", "")
@section("user-account")
    <div class="user-account__left-side">

    </div>
    <div class="user-account__right-side">
        <div class="right-side__sort">

        </div>
        <div class="right-side__content-side">
            @foreach($services = $service->user->service()->paginate(2) as $all)
                <div class="content-side__services-card">
                    <div class="services-card__image-section">
                        @if(!empty(explode("|", $all->photo)[0]))
                            <a href="{{route("user.services.services-item.show", $all)}}">
                                <img class="image-section__image"
                                     src="{{asset(explode("|", $all->photo)[0])}}">
                            </a>
                        @else
                            <a href="{{route("user.services.services-item.show", $all)}}">
                                <img class="image-section__image"
                                     src="{{asset("storage/image/no-image.png")}}">
                            </a>
                        @endif
                        @if($all->is_delivery)
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
                               href="{{ route("user.services.services-item.show", $all) }}">
                                <div class="upper-section-card__title">
                                    {{$all->title}}
                                </div>
                            </a>
                            <div class="upper-section-card__price">
                                {{$all->price . " грн"}}
                            </div>
                        </div>
                        <div class="card-description__service-description-card">
                            {!! htmlspecialchars_decode($all->description) !!}
                        </div>
                        <span class="card-description__status">
                            @include("user.logic.user-account.services.logic", ["service" => $all])
                        </span>
                        <div class="card-description__bottom-section-card">
                            <div class="bottom-section-card__date">
                                {{\Carbon\Carbon::parse($all->created_at)->isoFormat('D MMMM YYYY', 'Do MMMM YYYY')}}
                            </div>
                            <div class="bottom-section-card__favorite">
                                <livewire:user.services.favorite :serviceId="$all->id"/>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{$services->links()}}
@endsection