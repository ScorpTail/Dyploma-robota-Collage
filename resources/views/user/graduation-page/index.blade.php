@extends("user.layouts.index")
@section("title", "")
@vite(["resources/sass/graduation.scss", "resources/js/graduation.js"])
@section("content")
    <main class="main">
        <div class="main__container">
            <div class="main__graduation">
                <div class="graduation__description">
                    <div class="description__subtitle">
                        ВАРТІСТЬ РЕСТАВРАЦІЇ
                    </div>
                    <div class="description__title">
                        БЕЗКОШТОВНА ОЦІНКА РЕСТАВРАЦІЇ
                        З ФОТОГРАФІЇ
                    </div>
                    <hr>
                    <hr>
                    <div class="description__content-upper">
                        Дізнайтеся, скільки коштує відреставрувати ваші меблі:
                        заповніть поля, опишіть коротко суть вашого звернення та
                        прикріпіть від 1 до 4-х фотографій вашого антикварного предмета
                        (розмір кожного фото не повинен перевищувати 3 мб) -
                        наші майстри оперативно дадуть відповідь на
                        Ваш запит і безкоштовно зроблять оцінку вартості реставрації
                    </div>
                </div>

                <form class="graduation__graduation-form" method="post" action="{{ route("user.graduation.store") }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="graduation-form__form-content">
                        <div class="form-content__left">
                            <div class="left__name">
                                <div class="left__label">Ім'я</div>
                                <input class="left__input" type="text" name="name" placeholder="Вкажіть ваше ім'я"
                                       value="{{ old("name") }}">
                                @error("name")
                                <div class="text-danger">{{$message}}</div> @enderror
                            </div>

                            <div class="left__email">
                                <div class="left__label">Email</div>
                                <input class="left__input" type="email" name="email" placeholder="Вкажіть ваш email"
                                       value="{{ old("email") }}">
                            </div>
                            @error("email")
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            <div class="left__phone-number">
                                <div class="left__label">Номер телефону</div>
                                <input class="left__input" type="tel" name="phone"
                                       required
                                       placeholder="Вкажіть ваш номер телефону" value="{{ old("phone") }}"
                                >
                            </div>
                            @error("phone")
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-content__right">
                            <div class="right__label">
                                Повідомлення
                            </div>
                            <textarea class="right__textarea-input" name="message"
                                      placeholder="Напишіть повідомлення">{{ old("message") }}</textarea>
                            @error("message")
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                    </div>
                    <input class="graduation-form__file" type="file" accept=".svg, .png, .jpg" multiple
                           name="photo[]">
                    @error("photo")
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                    @error("photo.*")
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                    <ul class="graduation-form__photoList">

                    </ul>
                    <div class="graduation-form__graduation-btn">
                        <input class="graduation-form__button" type="submit">
                    </div>
                </form>

                <div class="description__content-bottom">
                    Кожен антикварний предмет унікальний за своєю природою. У зв'язку з чим, вартість реставрації меблів
                    в
                    кожному випадку розраховується індивідуально. <br>
                    <br>
                    <strong>Ціни на реставрацію залежать від багатьох факторів, таких як: </strong>

                    <ul class="graduation-bottom__style-ul">
                        <li class="style-ul__item">стан самих меблів;</li>
                        <li class="style-ul__item">характер пошкоджень (наявність тріщин, відколів, порушення
                            декоративних
                            елементів, стан
                            облицювання і
                            т.д.);
                        </li>
                        <li class="style-ul__item">складність реставраційних робіт;</li>
                        <li class="style-ul__item">витратні матеріали, використані при реставрації.</li>
                    </ul>
                    <br>
                    Немає і не можуть бути перевіреними методиками і методами. Кожен предмет потребує індивідуального
                    підходу та індивідуальних методів реставрації. Саме тому фіксованих цін на такі роботи немає.
                    <br>
                    <br>
                    Тому не можна в телефонній розмові складно назвати конкретну суму вартості робіт, а іноді, навіть
                    приблизну. <br>
                    <br>
                    Ми надаємо гарантію на всі виконані роботи протягом 1 року. Терміни проведення реставрації
                    безпосередньо
                    залежать від складності та обсягу проведених реставраційних робіт. <br>
                    Будь-яка реставрація антикварних, антикварних меблів починається з попереднього огляду предмета, щоб
                    дати більш об'єктивну оцінку його стану. В ході обстеження можна точно визначити вартість
                    відновлення
                    предмета. Оскільки можна дати висновок про зовнішній стан об'єкта по фотографії, стан вузлових
                    елементів
                    і цілісність столярної конструкції, наявність внутрішніх прихованих дефектів залишаються
                    незрозумілими.
                </div>
            </div>
        </div>
    </main>
@endsection