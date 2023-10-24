@extends("user.layouts.index")
@section("title", "")
@vite(["resources/sass/authorization-new.scss"])
@section("content")
    <main class="main">
        <div class="main__container">
            <div class="account-holder">
                <form action="{{ route("user.authorization.show") }}" class="form-container" method="Post">
                    @csrf
                    <div class="form__title-authorize">Вхід в особистий кабінет</div>
                    <div class="form__fields">
                        @error("error")
                        <div class="text-danger">{{$message}}</div>
                        @enderror
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
                            <input placeholder="Пароль" class="input-field" type="password" name="password"
                                   value="{{ old("password") }}">
                            <label for="input-field" class="input-label">Пароль</label>
                            <span class="input-highlight"></span>
                            @error("password")
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="fields__bottom-btn">
                        <span class="form__link-pass">
                            <a href="{{ route("user.authorization.reset.index") }}" class="form__link">
                                Забули пароль?
                            </a>
                        </span>
                            <button class="form__button" type="submit">Увійти</button>
                            <span class="form__and">Або</span>
                            <span class="form__link-text">
                            <a href="{{ route("user.registration-user.create") }}" class="form__link">
                                Ще нема облікового запису?
                            </a>
                        </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection