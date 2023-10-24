<div class="services-item__services-item-right-side">
    <div class="services-item-right-side__title">
        КОРИСТУВАЧ
    </div>
    <div class="services-item-right-side__user-img-contact">
        <img class="user-img-contact__user-img"
             src="{{asset($service->user->solder->avatar ?? "storage/image/default_avatar.svg")}}">
    </div>
    <div class="services-item-right-side__top-contact-side">

        <div class="top-contact-side__user-information-contact">
            <div class="user-information-contact__user-name">
                {{$service->user->name}}
            </div>
            <div class="user-information-contact__date-registration">
                {{\Carbon\Carbon::parse($service->user->created_at)->isoFormat('D MMMM YYYY', 'Do MMMM YYYY')}}
                р.
            </div>
            <div class="user-information-contact__phone-number">

                <svg width="1em" height="1em" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                     class="css-1jfo8do">
                    <path
                            d="M18.388 19.978C10.62 19.635 4.365 13.38 4.022 5.612l3.515-1.406 2.149 4.299-1.664.832v.62a6.029 6.029 0 0 0 6.021 6.021h.62l.278-.554.555-1.11 4.298 2.15-1.406 3.514zm3.13-4.897-6.022-3.011-1.347.45-.704 1.407a4.023 4.023 0 0 1-3.372-3.372l1.408-.704.449-1.346-3.01-6.022L7.65 2 2.63 4.007 2 4.94C2 14.347 9.654 22 19.061 22l.932-.63L22 16.35l-.483-1.27z"
                            fill="currentColor" fill-rule="evenodd"></path>
                </svg>
                <div class="css-1478ixo">
                    <a href="tel:0981914908" data-testid="contact-phone"
                       class="er34gjf0 css-41wmut">
                        {{$service->user->phone}}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="services-item-right-side__all-posts-contacts">
        <a class="all-posts-contacts__link-posts-contacts"
           href="{{ route("user.services.user-account.show", $service) }}">Усі оголошення автора
            <svg
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="1em" height="1em"
                    class="css-d7r8uj">
                <path fill="currentColor" fill-rule="evenodd"
                      d="M7 2v1.414l1.271 1.27L15.586 12l-7.315 7.315L7 20.585V22h1.414l1.27-1.271L17 13.414l1-1v-.827l-3.942-3.942v-.001L9.686 3.271 8.413 2z">
                </path>
            </svg>
        </a>
    </div>
</div>