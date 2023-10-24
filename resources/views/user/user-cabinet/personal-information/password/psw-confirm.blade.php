@extends("user.layouts.index")
@section("title", "")
@vite(["resources/sass/reset-psw-a.scss"])
@section("content")
    <main class="main">
        <div class="main__container">
            <div class="account-holder">
                <form action="{{route("password.confirm")}}" class="form-container__form" method="Post">
                    @csrf
                    <div class="form__top">
                        <div class="top__subtitle">Підтвердження паролю</div>
                        <div class="top__authorize-title">
                            <span class="top__head">Введіть пароль для підтвердежння особи</span>
                            Ви намагаєтесь потрапити на сторінку, яка відповідає за безпеку,
                            <br>потрібне підтвердження паролю.
                        </div>
                    </div>
                    <div class="form__fields">
                        <div class="input-container">
                            <input placeholder="Пароль" class="input-field" type="password" name="password">
                            <label for="input-field" class="input-label">Пароль</label>
                            <span class="input-highlight"></span>
                            @error("password")
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form__bottom-btn">
                        <button class="bottom-btn__button" type="submit">Підтвердити</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection