@extends("user.user-cabinet.index")
@vite(["resources/sass/personal-information.scss", "resources/js/personal-information.js", "resources/js/registration-solder.js"])
@section("user-cabinet-content")
    <div class="user-cabinet__content">
        <form class="personal-information__form" action="{{route("user.user-cabinet.info.update", auth()->user()->id)}}"
              method="post" enctype="multipart/form-data">
            <div class="content__personal-information">
                @csrf
                <div class="personal-information__content-title">
                    <div class="content-title__name-section">
                        <span class="content-title__label">ПІБ: </span>
                        <input disabled class="content-title__field" name="name" value="{{auth()->user()->name}}">
                        @error("name")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="content-title__email-section">
                        <span class="content-title__label">Електронна адреса: </span>
                        <input disabled class="content-title__field" name="email" value="{{auth()->user()->email}}">
                        @error("email")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="content-title__email-section">
                        <span class="content-title__label">Номер телефону: </span>
                        <input disabled class="content-title__field" name="phone" value="{{auth()->user()->phone}}">
                        @error("phone")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="content-title__email-section">
                        <span class="content-title__label">Дата реєстрації: </span>
                        <span class="content-title__data">{{\Carbon\Carbon::parse(auth()->user()->created_at)->isoFormat('D MMMM YYYY', 'Do MMMM YYYY')}}</span>
                    </div>
                    <div class="content-title__personal-info-right-side">
                        @if(auth()->user()->type_user_id == 2)
                            @include("user.user-cabinet.personal-information.includes.user-solder")
                        @endif
                    </div>
                </div>
                @if(auth()->user()->type_user_id == 2)
                    <div class="personal-info-right-side__user-avatar">
                        <div id="avatar-placeholder" class="user-avatar__avatar">
                            <input disabled type="file" id="avatar-upload"
                                   class="avatar__load content-title__field"
                                   name="avatar"
                                   accept=".svg, .png, .jpg">
                        </div>
                        <div class="personal-info-right-side__label">
                            Фото автора
                        </div>
                    </div>
                @endif
            </div>
            @if(auth()->user()->type_user_id == 2)
                <div class="content__resume-section">
                    <span class="content__label">Резюме: </span>
                    <textarea disabled class="content-form-right__textarea-input content-title__field" name="resume"
                              placeholder="Відсутня інформація"
                              rows="10">{{auth()->user()->solder->resume ?? null}}</textarea>
                    @error("resume")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            @endif
            <div class="content__edit-button">
                <div class="edit-button__edit">
                    <input type="button" class="__button" value="Редагувати">
                    <input type="submit" class="edit-button" value="Зберегти">
                    <a href="{{route("user.user-cabinet.info.psw.index")}}" class="__button">Змінити пароль</a>
                </div>
            </div>
        </form>
    </div>
    <script>
        var placeholder = document.getElementById("avatar-placeholder");
        window.onload = function () {
            placeholder.style.backgroundImage = "url( {{asset(auth()->user()->solder->avatar ?? "storage/image/default_avatar.svg")}} )";
        }
    </script>
    <livewire:user.user-cabinet.modal.modal-password-component/>
@endsection