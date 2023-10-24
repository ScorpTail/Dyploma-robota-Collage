@extends("user.layouts.index")
@section("title", "")
@vite(["resources/sass/user-account-head.scss"])
@section("content")
    <main class="main">
        <div class="main__container">
            <div class="main__user-account">
                <div class="user-account__menu-list">
                    <ul class="menu-list__menu-list-item">
                        <li class="menu-list-item__menu-list-item-link">
                            <a class="menu-list-item-list__active-link"
                               href="{{route("user.services.user-account.show", $service)}}">Усі послуги автора</a>
                        </li>
                        <li class="menu-list-item__menu-list-item-link">
                            <a class="menu-list-item-list__active-link"
                               href="{{route("user.services.user-info.show", $service)}}">Особиста інформація</a>
                        </li>
                    </ul>
                </div>
                <div class="user-account__header-account">
                    <div class="header-account__content-account">
                        <img class="header-account__avatar"
                             src="{{asset($service->user->solder->avatar ?? "storage/image/default_avatar.svg")}}">
                        <span class="header-account__title">
                        {{$service->user->name}}
                             <span class="header-account__date">
                                 {{\Carbon\Carbon::parse($service->user->created_at)->isoFormat('D MMMM YYYY', 'Do MMMM YYYY')}} р.
                             </span>
                        </span>
                    </div>
                    {{--<button class="header-account__button">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="1em" height="1em"
                             class="css-zfssoh">
                            <path fill="currentColor" fill-rule="evenodd"
                                  d="M20.219 10.367 12 20.419 3.806 10.4A3.96 3.96 0 0 1 3 8c0-2.206 1.795-4 4-4a4.004 4.004 0 0 1 3.868 3h2.264A4.003 4.003 0 0 1 17 4c2.206 0 4 1.794 4 4 0 .868-.279 1.698-.781 2.367M17 2a5.999 5.999 0 0 0-5 2.686A5.999 5.999 0 0 0 7 2C3.692 2 1 4.691 1 8a5.97 5.97 0 0 0 1.232 3.633L10.71 22h2.582l8.501-10.399A5.943 5.943 0 0 0 23 8c0-3.309-2.692-6-6-6">
                            </path>
                        </svg>
                        Підписатись
                    </button>--}}
                </div>
                @yield("user-account")
            </div>
        </div>
    </main>
@endsection