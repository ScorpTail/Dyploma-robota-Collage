@extends("user.layouts.index")
@section("title", "")
@vite(["resources/sass/reset-psw-a.scss"])
@section("content")
    <main class="main">
        <div class="main__container">
            <div class="account-holder">
                <form action="{{route("user.user-cabinet.info.psw.update")}}" class="form-container__form"
                      method="POST">
                    @csrf
                    <div class="form__top">
                        <div class="top__subtitle">Зміна паролю</div>
                        <div class="top__authorize-title">
                            <span class="top__head">Введіть новий пароль</span>
                            Введіть новий пароль який знадобиться під час
                            <br> авторизації.
                        </div>
                    </div>
                    <div class="form__fields">
                        <div class="input-container">
                            <input placeholder="Новий пароль" class="input-field" type="password" name="password">
                            <label for="input-field" class="input-label">Пароль</label>
                            <span class="input-highlight"></span>
                            @error("password")
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="input-container">
                            <input placeholder="Повторити пароль" class="input-field" type="password"
                                   name="password_confirmation">
                            <label for="input-field" class="input-label">Підтвердження паролю</label>
                            <span class="input-highlight"></span>
                            @error("password")
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form__bottom-btn">
                        <input class="bottom-btn__button" type="submit" value="Змінити пароль!">
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection