@extends("user.user-cabinet.index")
@vite(["resources/sass/cabinet-order.scss"])
@section("user-cabinet-content")
    <div class="user-cabinet__content">
        <a class="content__button-create" href="{{route("user.user-cabinet.order.create")}}">Додати нову посулугу</a>
        @if(!$services->isEmpty())
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
                            <div class="bottom-section-card__actions">
                                <div class="bottom-section-card__edit">
                                    <a href="{{route("user.user-cabinet.order.edit", $service)}}">
                                        <svg width="45" height="49" viewBox="0 0 45 49" fill="none"
                                             xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <rect width="45" height="49" fill="url(#pattern0)"/>
                                            <defs>
                                                <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1"
                                                         height="1">
                                                    <use xlink:href="#image0_21_292"
                                                         transform="matrix(0.0108889 0 0 0.01 -0.0444444 0)"/>
                                                </pattern>
                                                <image id="image0_21_292" width="100" height="100"
                                                       xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAAAXNSR0IArs4c6QAAAthJREFUeJzt3T1rFFEYxfHziC+dnYohaBA7qxCEbB9MkcKP4UfQMimtbPVLCNqlsRAUEQsRtFSEmFJd28gei+zCumx2ZnbmmfvcvedX33m5+XN3MzO7CSAiIiIiItIvS30CuSF5E8AugNsArgH4C+AHgC8ADs3sV8LTKwNJI3mf5AcudkLyJcnN1Oe8skiukXxdEWLWiOQzkpdSn/9KIblF8qhhjGlvSF5JPY+VMI7xs0WMibdaKS2R3CY57CDGxNPUc8oWu1sZ00bUG31z7H5lTHtR5xx0HTJGch3AZwCXnQ5xAuCqmf1eNOic08GzY2ZHAJ44HuICgHtVgxRkipntA3jkeIg7VQMUZIaZPYZflOtVAxRkjnGUA4ddX6waoCBncHr5Oq4aUFwQkrXn7LBSvna4r/zx9KLvI8lbDbd72NG1yA2vuWWH/1/0fSO50XD7/ZYx3nvNLTucfzvkO/tdKXte88sKF98O6WulvPKaX1ZY70ah90o5JrnmNcdssNmNQq+VMiS55TXHbHC5W+hdr5QhyW2vOWZjyRhdR1EMACA5YPvnGW2jKAbQWYy2URQDcHvSt8wb/brXHLPBblfGrMYrpWjOMRSliZ5iKEodPcdQlEUSxegtSlYfA+Lpr5SH8PuoTh2fAGya2chj59k8MSQ5QPoYfwA88IqRjcQvUxO66AMUIxTFCEQxAlGMQBQjEMUIRDECUYxAFCMQxQhEMQJRjEAUIxDFCEQxAlGMQBQjEMUIRDECUYxAFCMQxQhEMQJRjEAUIxDFCEQxAlGMQEjeDRJjkPpn4eH8EtvsIf1XAnbN7F3Cc3CTzfdDxlY6BpBXkJWPAeQTpIgYQB5BiokBxA9SVAwgdpDiYgBxgxQZA4gZpNgYQLwgRccAYgUpPgYQJ4hijEUIohhTUgdRjBkpgyjGHKmCKMYZGv+9LJI7AHZaHve5menfN4iIiIiIiIiIiGTsH3wymqlhbjopAAAAAElFTkSuQmCC"/>
                                            </defs>
                                        </svg>
                                    </a>
                                </div>
                                <div class="bottom-section-card__favorite">
                                    <form action="{{route("user.user-cabinet.order.destroy", $service)}}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <input type="submit" value="&times;">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{$services->links()}}
        @else
            <div class="content__else-empty">Список пустий, спробуйте додати новий допис!</div>
        @endif
    </div>
@endsection