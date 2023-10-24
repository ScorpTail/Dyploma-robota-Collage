@extends("user.layouts.index")
@section("title", "")
@vite(["resources/sass/registration.scss", "resources/js/registration-solder.js"])
@section("content")
    <main class="main">
        <div class="main__container">
            <div class="main__registration-solder">
                <form class="registration-solder__registration-solder-form"
                      action="{{ route("user.registration-solder.store") }}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="registration-solder-form__content-form">
                        <div class="content-form__content-form-left">
                            <div class="content-form-left__login">
                                <div class="content-form-left__label">
                                    ПІБ
                                </div>
                                <input class="content-form-left__input" type="text" name="name"
                                       placeholder="Данчевський Владислав Олегович" value="{{ old("name") }}">
                            </div>
                            @error("name")
                            <div class="text-danger">{{$message}}</div> @enderror
                            <div class="content-form-left__email">
                                <div class="content-form-left__label">
                                    Електронна адреса
                                </div>
                                <input class="content-form-left__input" type="email" name="email"
                                       placeholder="example123@gmail.com" value="{{ old("email") }}">
                            </div>
                            @error("email")
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            <div class="content-form-left__email">
                                <div class="content-form-left__label">
                                    Номер телефону
                                </div>
                                <input placeholder="Номер телефону" class="content-form-left__input"
                                       type="tel" name="phone" value="{{ old("phone") }}" pattern="^\[0-9]{10}$">
                                @error("phone")
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="content-form-left__profession">
                                <div class="content-form-left__label">
                                    Спеціальність
                                </div>
                                <input class="content-form-left__input" type="text" name="profession"
                                       placeholder="Маляр-реставратор" value="{{ old("profession") }}">
                            </div>
                            @error("profession")
                            <div class="text-danger">{{$message}}</div> @enderror
                            <div class="content-form-left__area">
                                <div class="content-form-left__label">
                                    Вид діяльності
                                </div>
                                <select class="content-form-left__input" name="area">
                                    <option>----Обреріть один пункт----</option>
                                    <option {{ old("area") == 1 ? " selected" : "" }} value="1">Реставрація
                                        антикваріату
                                    </option>
                                    <option {{ old("area") == 2 ? " selected" : "" }} value="2">Ремонт антикваріату
                                    </option>
                                </select>
                                @error("area")
                                <div class="text-danger">{{$message}}</div> @enderror
                            </div>
                            <div class="content-form-left__password">
                                <div class="content-form-left__label">
                                    Пароль
                                </div>
                                <input class="content-form-left__input" type="password" name="password"
                                       placeholder="Вкажіть пароль" value="{{ old("password") }}">
                            </div>
                            @error("password")
                            <div class="text-danger">{{$message}}</div> @enderror
                            <div class="content-form-left__password">
                                <div class="content-form-left__label">
                                    Підтвердити пароль
                                </div>
                                <input class="content-form-left__input" type="password" name="password_confirmation"
                                       placeholder="Підтвердіть пароль" value="{{ old("password_confirmation") }}">
                            </div>
                            @error("password_confirmation")
                            <div class="text-danger">{{$message}}</div> @enderror
                        </div>
                        <div class="content-form__content-form-right">
                            <div class="content-form-right__user-avatar">
                                <div id="avatar-placeholder" class="user-avatar__avatar">
                                    <input type="file" id="avatar-upload" class="avatar__load" name="avatar"
                                           accept=".svg, .png, .jpg">
                                </div>
                                <div class="content-form-right__label">
                                    Фото автора
                                </div>
                            </div>
                            <div class="content-form-right__resume">
                                <div class="content-form-right__label">
                                    Резюме
                                </div>
                                <textarea class="content-form-right__textarea-input" name="resume"
                                          placeholder="Коротко розкажіть про себе">{{ old("resume") }}</textarea>
                            </div>
                            @error("resume")
                            <div class="text-danger">{{$message}}</div> @enderror
                        </div>
                    </div>
                    <div class="registration-solder__register-btn">
                        <input class="register-btn__button" type="submit" value="Розпочати роботу!">
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection