<div class="message">
    <div class="message__title">
        <div class="content-section__content-title">
            <div class="content-title__name-section">
                <span class="content-title__label">Ім'я: </span>
                <span class="content-title__input">{{$information->name}}</span>
            </div>
            <div class="content-title__email-section">
                <span class="content-title__label">електронна адреса: </span><span
                        class="content-title__input">{{$information->email}}</span>
            </div>
            <div class="content-title__phone-section">
                <span class="content-title__label">номер телефону: </span><span
                        class="content-title__input">{{$information->phone}}</span>
            </div>
        </div>
    </div>
    <hr>
    <div class="message__content-body">
        <div class="content-body__description">
            <p>
                Відновлення паролю:
                <a href="{{route("user.authorization.reset.edit", $data["token"])}}">Перейдіть за посиланням</a>
            </p>
        </div>
    </div>
</div>