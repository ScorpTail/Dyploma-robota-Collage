@extends("user.layouts.index")
@section("title", "")
@vite(["resources/sass/registration.scss", "resources/sass/authorization.scss"])
@section("content")
    <main class="main">
        <div class="main__container">
            <div class="account-holder">
                <form action="{{ route("user.registration-user.store") }}" class="form-container" method="Post">
                    @csrf
                    <div class="form__title-authorize">Реєстрація облікового запису</div>
                    <div class="form__fields">
                        <div class="input-container">
                            <input placeholder="ПІБ" class="input-field" type="text" name="name"
                                   value="{{ old("name") }}">
                            <label for="input-field" class="input-label">ПІБ</label>
                            <span class="input-highlight"></span>
                            @error("name")
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="input-container">
                            <input placeholder="Email" class="input-field" type="email" name="email"
                                   value="{{ old("email") }}">
                            <label for="input-field" class="input-label">Email</label>
                            <span class="input-highlight"></span>
                            @error("email")
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="input-container">
                            <input placeholder="Номер телефону" class="input-field"
                                   type="tel" name="phone" value="{{ old("phone") }}">
                            <label for="input-field" class="input-label">Номер телефону</label>
                            <span class="input-highlight"></span>
                            @error("phone")
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="input-container">
                            <input placeholder="Пароль" class="input-field" type="password" name="password"
                                   value="{{ old("password") }}">
                            <label for="input-field" class="input-label">Пароль</label>
                            <span class="input-highlight"></span>
                            @error("password")
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="input-container">
                            <input placeholder="Підтвердти пароль" class="input-field" type="password"
                                   name="password_confirmation" value="{{ old("password_confirmation") }}">
                            <label for="input-field" class="input-label">Підтвердти пароль</label>
                            <span class="input-highlight"></span>
                            @error("password_confirmation")
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="fields__bottom-btn">
                            <button class="form__button" type="submit">Зареєструватись</button>
                            <span class="form__link-text">
                            Вже маєте особистий кабінет? <a href="{{ route("user.authorization.index") }}"
                                                            class="form__link">Авторизуйтесь!
                            </a>
                        </span>
                        </div>
                    </div>
                </form>
                <div class="bread">
                    <div class="bread-crumbs">
                        <div class="bread-crumbs__title-authorize">
                            Почни співпрацювати з нами!
                        </div>
                        <a href="{{ route("user.registration-solder.create") }}" class="bread-crumbs__button">
                            Стати Майстром
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection