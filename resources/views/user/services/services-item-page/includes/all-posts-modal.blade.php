<div class="services-item__all-posts">
    <div class="all-posts__top-block">
        <div class="top-block__title">
            Усі оголошення автора
        </div>
        <a class="top-block__posts-link"
           href="{{ route("user.services.user-account.show", $service) }}">
            <span class="posts-link__link-span">Дивитися всі</span>
        </a>
    </div>
    <div class="swiper all-posts-content-card__swiper-posts-card">
        <div class="swiper-wrapper">
            @foreach($service->user->service as $all)
                @if($service->id != $all->id)
                    <div class="swiper-slide">
                        <div class="all-posts-content-card__card-posts">
                            <a class="card-posts__card-posts-link"
                               href="{{route("user.services.services-item.show", $all->id)}}">
                                @if(!empty(explode("|", $all->photo)[0]))
                                    <div class="card-posts-link__img">
                                        <img src="{{asset(explode("|", $all->photo)[0])}}">
                                    </div>
                                @else
                                    <div class="card-posts-link__img">
                                        <img src="{{asset("storage/image/no-image.png")}}">
                                    </div>
                                @endif
                                <div class="card-posts-link__card-top">
                                    <div class="card-posts-link__title">
                                        {{$all->title}}
                                    </div>
                                    <div class="card-posts-link__favorite">
                                        <livewire:user.services.favorite :serviceId="$all->id"/>
                                    </div>
                                </div>
                                <div class="card-posts-link__price">
                                    {{$all->price}} грн.
                                </div>
                                <div class="card-posts-link__date">
                                    {{\Carbon\Carbon::parse($all->created_at)->isoFormat('D MMMM YYYY', 'Do MMMM YYYY')}}
                                </div>
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    @if($service->user->service->count() > 3)
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    @endif
</div>