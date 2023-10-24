@extends("user.layouts.index")
@section("title", "")
@vite(["resources/sass/reset-psw.scss"])
@section("content")
    <main class="main">
        <div class="main__container">
            <div class="account-holder">
                <form action="{{ route("user.authorization.reset.store") }}" class="form-container__form" method="Post">
                    @csrf
                    <div class="form__top">
                        <div class="top__subtitle">Відновлення паролю</div>
                        <div class="top__authorize-title"> 
                            <span class="top__head">Ваша електронна адреса</span> 
                            Введіть електронну адресу для відновлення паролю.
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
                    </div>
                    <div class="form__bottom-btn">
                        <button class="bottom-btn__button" type="submit">Надіслати запит</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection