@extends("user.layouts.index")
@section("title", "")
@vite(["resources/sass/reset-psw-a.scss"])
@section("content")
    <main class="main">
        <div class="main__container">
            <div class="account-holder">
                <form action="{{ route("user.authorization.reset.update", $token) }}" class="form-container__form"
                      method="Post">
                    @csrf
                    <div class="form__top">
                        <div class="top__subtitle">Відновлення паролю</div>
                        <div class="top__authorize-title">
                            <span class="top__head">Введіть новий пароль</span>
                            Введіть електронну адресу для відновлення
                            <br> паролю.
                        </div>
                    </div>
                    <div class="form__fields">
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
                            <input placeholder="Новий пароль" class="input-field" type="password" name="password">
                            <label for="input-field" class="input-label">password</label>
                            <span class="input-highlight"></span>
                            @error("password")
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="input-container">
                            <input placeholder="Повторити пароль" class="input-field" type="password"
                                   name="password_confirmation">
                            <label for="input-field" class="input-label">password_confirmation</label>
                            <span class="input-highlight"></span>
                            @error("password_confirmation")
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form__bottom-btn">
                        <button class="bottom-btn__button" type="submit">Надіслати запит</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection