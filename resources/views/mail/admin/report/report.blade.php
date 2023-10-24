@vite(["resources/sass/Mail/accept"])
<div class="message">
    <div class="message__title">
        <div class="content-section__content-title">
            @if(empty($report->email))
                <div class="content-title__name-section">
                    <span class="content-title__label">Ім'я: </span>
                    <span class="content-title__input">{{$report->user->name}}</span>
                </div>
                <div class="content-title__email-section">
                    <span class="content-title__label">електронна адреса: </span><span
                            class="content-title__input">{{$report->user->email}}</span>
                </div>
                <div class="content-title__phone-section">
                    <span class="content-title__label">номер телефону: </span><span
                            class="content-title__input">{{$report->user->phone}}</span>
                </div>
            @else
                <div class="content-title__email-section">
                    <span class="content-title__label">електронна адреса: </span><span
                            class="content-title__input">{{$report->email}}</span>
                </div>
            @endif
        </div>
    </div>
    <hr>
    <div class="message__content-body">
        <div class="content-body__description">
            <p>
                {{$response["response"]}}
            </p>
        </div>
    </div>
</div>