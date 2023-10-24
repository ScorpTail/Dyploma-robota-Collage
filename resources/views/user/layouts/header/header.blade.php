<header class="header">
    <div class="header__container">
        <div class="header__header-content">
            <div class="header__logo">
                <a href="{{ route("user.main.index") }}">
                    <img class="logo__project" src="{{asset("storage/image/logo_brown.svg")}}" alt="logo_project">
                    <img class="logo__project-a" src="{{asset("storage/image/logo-brown-no.svg")}}" alt="logo_project">
                </a>
            </div>

            <div class="header__navigation">
                <ul class="navigation__menu">
                    <li class="menu__item"><a class="menu__link" id="main"
                                              href="{{ route("user.main.index") }}">Головна</a>
                    </li>
                    <li class="menu__item"><a class="menu__link" id="services"
                                              href="{{ route("user.services.services.index") }}">Послуги</a></li>
                    <li class="menu__item"><a class="menu__link" id="about" href="{{ route("user.about.index") }}">Про
                            нас</a></li>
                    <li class="menu__item"><a class="menu__link" id="graduation"
                                              href="{{ route("user.graduation.index") }}">Оцінка</a>
                    </li>
                    @auth("web")
                        <li class="menu__item hidden">
                            <a class="item__button button-burger" href="{{ route("user.user-cabinet.index") }}">
                                Особистий кабінет
                            </a>
                        </li>
                    @endauth
                    @guest("web")
                        <li class="menu__item hidden">
                            <a class="item__button button-burger" href="{{ route("user.authorization.index") }}">
                                Авторизація
                            </a>
                        </li>
                    @endguest
                </ul>
            </div>
            <button type="submit" data-bs-toggle="modal" data-bs-target="#search" role="button" class="menu__item">
                <img class="item__search-image" src="{{asset("storage/image/search_white.svg")}}" alt="search_icon">
            </button>
            <livewire:user.header.search-button/>
            @auth("web")
                <div class="header__login">
                    <a href="{{ route("user.user-cabinet.index") }}" class="header__button">Особистий кабінет</a>
                </div>
            @endauth

            @guest("web")
                <div class="header__login">
                    <a href="{{ route("user.authorization.index") }}" class="header__button">Авторизація</a>
                </div>
            @endguest

            <div class="burger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
</header>