@extends("user.layouts.index")
@section("title", "")
@vite(["resources/sass/contacts.scss", "resources/sass/graduation.scss"])
@section("content")
    <main class="main">
        <div class="main__container">
            <div class="main__contacts">
                <div class="contacts__description">
                    <div class="description__subtitle">
                        КОНТАКТНІ ДАНІ
                    </div>
                    <div class="description__title">
                        ЗВ'ЯЖІТЬСЯ З НАМИ
                    </div>
                    <div class="description__content-upper">
                        Для безкоштовної консультації надішліть фото предмета в Viber або Telegram.
                    </div>
                    <hr>
                    <hr>
                </div>

                <div class="contacts__content">
                    <div class="content__information-contacts">
                        <h3 class="information-contacts__title">
                            Скрині давнини:<br>
                            Ремонт та Реставрація <br>антикваріату
                        </h3>
                        <dl>
                            <dt class="information-contacts__dt">АДРЕСА</dt>
                            <dd class="information-contacts__dd">Ужгород, Українська, 16</dd>
                            <dt class="information-contacts__dt">ТЕЛЕФОН</dt>
                            <dd class="information-contacts__dd">+38(095)22-04-335</dd>
                            <dt class="information-contacts__dt">EMAIL</dt>
                            <dd class="information-contacts__dd">example@gmail.com</dd>
                            <dt class="information-contacts__dt">ЧАС РОБОТИ</dt>
                            <dd class="information-contacts__dd">ПН - СБ: 10:00 - 20:00</dd>
                        </dl>
                    </div>

                    <form class="content__contacts-form" action="{{ route("user.contacts.store") }}" method="post">
                        @csrf
                        <div class="contacts-form__title">Консультація</div>
                        <div class="contacts-form__name">
                            <input class="contacts-form__input" type="text" name="name" placeholder="Важіть власне ім'я"
                                   value="{{old("name")}}">
                            @error("name")
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="contacts-form__email">
                            <input class="contacts-form__input" type="email" name="email"
                                   placeholder="Важіть власний email" value="{{old("email")}}">
                            @error("email")
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="contacts-form__phone-number">
                            <input class="contacts-form__input" type="text" name="phone"
                                   placeholder="Важіть власний номер телефону" value="{{old("phone")}}" required
                                   >
                            @error("phone")
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="contacts-form__message">
                        <textarea class="message__textarea-input" name="message" cols="30" rows="10"
                                  placeholder="Вкажіть повідомлення"> {{old("message")}}</textarea>
                            @error("message")
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="contacts-form__btn-contacts">
                            <input class="contacts-form__button" type="submit" value="Надіслати">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection