@extends("user.layouts.index")
@section("title", "")
@vite(["resources/sass/services-item.scss", "resources/sass/favorite-star.scss","resources/js/services-item.js", "resources/sass/app.scss"])
@section("content")
    <main class="main">
        <div class="main__container">
            <div class="main__services-item">
                <div class="services-item__services-item-content">
                    <div class="services-item__services-item-left-side">
                        <div class="services-item-left-side__title">
                            {{$service->title}} <span
                                    class="title__viewed"> Переглядів: {{$service->views->count()}}</span>
                        </div>
                        <div class="services-item-left-side__swiper">
                            <div class="swiper mySwiper">
                                <div class="swiper-wrapper">
                                    @foreach(explode("|", $service->photo) as $temp)
                                        @if(!empty($temp))
                                            <div class="swiper-slide">
                                                <img class="swiper-slide__image-swiper" src="{{asset($temp)}}">
                                            </div>
                                        @else
                                            <div class="swiper-slide">
                                                <img class="image-section__image"
                                                     src="{{asset("storage/image/no-image.png")}}">
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                @if(count(explode("|", $service->photo)) > 1)
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                @endif
                            </div>
                        </div>
                        <div class="services-item-left-side__date-favorite">
                            <div class="date-favorite__date">
                                Опубліковано {{\Carbon\Carbon::parse($service->created_at)->isoFormat('D MMMM YYYY', 'Do MMMM YYYY')}}
                                р.
                            </div>
                            <div class="date-favorite__favorite">
                                <livewire:user.services.favorite :serviceId="$service->id"/>
                            </div>
                        </div>
                        <div class="services-item-left-side__title">
                            {{$service->title}}
                        </div>
                        <div class="services-item-left-side__price">
                            {{$service->price}} грн.
                        </div>
                        <div class="services-item-left-side__service-description-item">
                            <span class="description-item__title">ОПИС</span>
                            {!! htmlspecialchars_decode($service->description) !!}
                        </div>
                        <div class="services-item-left-side__report">
                            <button type="submit" class="report__report-button"
                                    data-bs-toggle="modal" data-bs-target="#report" role="button">
                                <svg width="1em" height="1em" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                     class="report-button__flag-svg">
                                    <path
                                            d="M17.421 13H5V4h12.421l-2.124 3.452-.645 1.048.645 1.049L17.421 13zm1.79-11H3v19l1 1 1-1v-6h14.211l.851-1.523L17 8.5l3.062-4.976L19.211 2z"
                                            fill="currentColor" fill-rule="evenodd">
                                    </path>
                                </svg>
                                <span class="report-button__report-title">Поскаржитись</span>
                            </button>
                        </div>
                    </div>
                    @include("user.services.services-item-page.includes.user-info-right")
                </div>
                @include("user.services.services-item-page.includes.all-posts-modal")
            </div>
        </div>
    </main>
    @include("user.services.services-item-page.includes.report-modal")
@endsection



