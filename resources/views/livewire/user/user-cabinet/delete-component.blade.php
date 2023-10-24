<div class="user-cabinet__content">
    @if(!$services->isEmpty())
        <div class="content__delete-all">
            <button wire:click="removeAll" class="text-danger">Очистити список</button>
        </div>
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
                        @if($service->status == 1)
                            {{"Нове"}}
                        @elseif($service->status == 2)
                            {{"Популярне"}}
                        @elseif($service->status == 3)
                            {{"Звичайне"}}
                        @endif
                    </span>
                    <div class="card-description__bottom-section-card">
                        <div class="bottom-section-card__date">
                            {{\Carbon\Carbon::parse($service->created_at)->isoFormat('D MMMM YYYY', 'Do MMMM YYYY')}}
                        </div>
                        <div class="bottom-section-card__actions">
                            <div class="bottom-section-card__remove">
                                <input wire:click="delete({{ $service->id }})" type="submit" value="&times;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="content__empty">
            <p>У вас не має вподобань</p>
            <p class="account-contenttitle-sub">Пошукайте те, що вам сподобається</p>
            <a class="account-content__title-link" href="{{route("user.services.services.index")}}"><span
                        class="account-content__button">Перейти до послуг</span></a>
        </div>
    @endif
    {{$services->links("livewire.pagination")}}
</div>
