@extends("user.services.user-account-page.index")
@section("title", "")
@vite(["resources/sass/user-info.scss"])
@section("user-account")
    <div class="user-account__left-side">

    </div>

    <div class="user-account__right-side">
        <div class="right-side__sort">

        </div>
        <div class="right-side__content-side">
            <div class="content-side__email-section">
                <svg width="1em" height="1em" viewBox="0 0 24 24" focusable="false" aria-hidden="true" tabindex="-1"
                     class="D8VyR" style="width: 20px; height: 20px;">
                    <path d="M19.607 18H4.392A.392.392 0 0 1 4 17.607V7.119l8 6.142 8-6.142v10.488a.393.393 0 0 1-.393.393ZM18.172 6 12 10.739 5.827 6h12.345Zm1.435-2H4.392A2.396 2.396 0 0 0 2 6.393v11.214A2.395 2.395 0 0 0 4.392 20h15.215A2.396 2.396 0 0 0 22 17.607V6.393A2.396 2.396 0 0 0 19.607 4Z"></path>
                </svg>
                <span class="content-side__label">Електронна адреса: </span>
                <div class="content-side__field">
                    {{$service->user->email}}
                </div>
            </div>
            <div class="content-side__email-section">
                <svg width="1em" height="1em" viewBox="0 0 24 24" fill="none" focusable="false" aria-hidden="true"
                     tabindex="-1" class="D8VyR" style="width: 20px; height: 20px;">
                    <path d="M16.908 18.491a4.008 4.008 0 0 1-4.92.001C9.113 16.26 6.7 13.897 4.818 11.47c-1.102-1.421-1.087-3.425.038-4.872l2.022-2.599 2.866 2.867-2.64 4.029.467.569c1.738 2.117 2.27 2.649 4.383 4.381l.567.466 4.03-2.638 2.866 2.867-2.508 1.951Zm3.923-3.365-2.867-2.867a2.012 2.012 0 0 0-2.51-.26l-2.8 1.833c-1.378-1.147-1.92-1.689-3.07-3.071l1.833-2.799a2.01 2.01 0 0 0-.26-2.51L8.29 2.584a2.008 2.008 0 0 0-1.54-.58 1.995 1.995 0 0 0-1.452.767L3.277 5.37c-1.687 2.169-1.704 5.182-.04 7.326 1.984 2.559 4.517 5.041 7.525 7.376a6.001 6.001 0 0 0 7.375-.003l2.506-1.95c.453-.352.734-.882.77-1.454a2.006 2.006 0 0 0-.582-1.539Z"
                          fill="currentColor"></path>
                </svg>
                <span class="content-side__label">Номер телефону: </span>
                <div class="content-side__field">
                    {{$service->user->phone}}
                </div>
            </div>
            <div class="content-side__resume-section">
                <span class="resume-section__label">
                    <svg width="1em" height="1em" viewBox="0 0 24 24" focusable="false"
                         aria-hidden="true" tabindex="-1" class="D8VyR"
                         style="width: 20px; height: 20px;"><path fill-rule="evenodd"
                                                                  clip-rule="evenodd"
                                                                  d="M5 20h11.288L22 22.539V5a3 3 0 0 0-3-3H5a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3ZM19 4a1 1 0 0 1 1 1v14.461L16.712 18H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h14ZM7 9a1 1 0 0 0 1 1h8a1 1 0 1 0 0-2H8a1 1 0 0 0-1 1Zm1 5a1 1 0 1 1 0-2h4a1 1 0 1 1 0 2H8Z"
                                                                  fill="currentColor"></path></svg>Про майстра: </span>
                <div disabled class="resume-section__resume">
                    {{$service->user->solder->resume ?? null}}
                </div>
            </div>
        </div>
    </div>
@endsection