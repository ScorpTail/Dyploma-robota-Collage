@vite(["resources/sass/Mail/accept"])
<div class="message">
    <div class="message__title">
        <div class="content-section__content-title">
            <div class="content-title__name-section">
                <span class="content-title__label">Ім'я: </span>
                <span class="content-title__input">{{$report->service->user->name}}</span>
            </div>
            <div class="content-title__email-section">
                <span class="content-title__label">електронна адреса: </span><span
                        class="content-title__input">{{$report->service->user->email}}</span>
            </div>
            <div class="content-title__phone-section">
                <span class="content-title__label">номер телефону: </span><span
                        class="content-title__input">{{$report->service->user->phone}}</span>
            </div>
        </div>
    </div>
    <hr>
    <div class="message__content-body">
        <div class="content-body__description">
            <p>
                Назва: {{$report->service->title}}
            </p>
            <p>
                Дана послуга була заблокована у зв'язку з великою кількістю скарг
                <span>{{$report->type == 1 ? "Шахрайство" : ($report->type == 2 ? "Неправильні відомості про послугу" : "Автор видає сторонню послугу за власну")}}</span>
                для деталей зверніться до "Контакти".
            </p>
        </div>
    </div>
</div>