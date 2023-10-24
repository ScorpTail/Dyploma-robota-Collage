@vite(["resources/sass/Mail/accept"])
<div class="message">
    <div class="message__title">
        <div class="content-section__content-title">
                <div class="content-title__email-section">
                    <span class="content-title__label">електронна адреса: </span><span
                            class="content-title__input">{{$info->email}}</span>
                </div>
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