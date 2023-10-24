@extends("user.layouts.index")
@section("title", "")
@vite(["resources/sass/main.scss", "resources/sass/swiper.scss", "resources/js/main-swiper.js"])
@section("content")
    <main class="main">
        <div class="main__main-swiper">
            <div class="swiper main-swiper__swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img class="swiper-slide__main-swiper-slide"
                                                   src="{{ asset("storage/image/background_form.svg") }}">
                    </div>
                    <div class="swiper-slide"><img class="swiper-slide__main-swiper-slide"
                                                   src="{{ asset("storage/image/main-background.svg") }}">
                    </div>
                    <div class="swiper-slide"><img class="swiper-slide__main-swiper-slide"
                                                   src="{{ asset("storage/image/main-background4.jpg") }}">
                    </div>
                    <div class="swiper-slide"><img class="swiper-slide__main-swiper-slide"
                                                   src="{{ asset("storage/image/main-background3.jpg") }}">
                    </div>
                </div>
            </div>
            <div class="main__container">
                <div class="main__main-content-section">
                    <div class="main-content-section__welcome">
                        <div class="welcome__subtitle">
                            ЛАСКАВО ПРОСИМО
                        </div>
                        <div class="welcome__title">
                            ПОТРІБНА РЕСТАВРАЦІЯ?
                        </div>
                        <div class="welcome__description">
                            "Скрині давнини: ремонт та реставрація антикваріату" - це онлайн маркетплейс, який
                            спеціалізується
                            на ремонті та реставрації антикварних меблів та предметів інтер'єру.
                            Компанія була заснована з метою збереження історичної спадщини та популяризації культурної
                            спадщини
                            через збереження антикварних меблів та предметів.
                        </div>
                    </div>
                    <div class="main-content-section__gallery">
                        <div class="gallery__left-side">
                            <img class="left-side__image-gallery" src="{{ asset("storage/image/gallery-left.png") }}">
                        </div>
                        <div class="gallery__right-side">
                            <img class="right-side__image-gallery" src="{{ asset("storage/image/gallery3.jpg") }}">
                        </div>
                    </div>
                    <div class="main-content-section__our-services">
                        <div class="our-services__subtitle">
                            НАШІ ПОСЛУГИ
                        </div>
                        <div class="our-services__title">
                            ЩО МИ ПРОПОНУЄМО?
                        </div>
                        <div class="our-services__description">
                            Кожен предмет антикварних меблів повинен пройти комплекс реставраційних заходів, відповідний
                            часу
                            виготовлення предмета. Всі необхідні процеси майстри проводять вручну, так що
                            відреставрований
                            антикваріат просто не йде ні в яке порівняння з виробами масового виробництва. Вони містять
                            ручні
                            години праці не тільки виробника, а й десятки годин реставраційних робіт
                            художників-реставраторів.
                            Саме тому добре відреставрований античний предмет стає більш цінним і унікальним, ніж новий.
                        </div>
                        <a class="our-services__button" href="{{ route("user.services.services.index") }}">Послуги</a>
                    </div>
                    <div class="main-content-section__our-history">
                        <div class="our-history__subtitle">
                            ІСТОРІЯ
                        </div>
                        <div class="our-history__title">
                            ПРО ВОРКШОП
                        </div>
                        <div class="our-history__description">
                            Велика частина збережених антикварних меблів в Україні представлена предметами кінця 19 -
                            початку 20
                            століть. Цими предметами величезний середній клас прикрашав своє життя. Саме з такими
                            предметами
                            найчастіше звертаються в майстерню «Інтарсія».
                            Більшість наших клієнтів – це ті, хто усвідомлює цінність сімейних предметів меблів, які
                            дісталися
                            їм у спадок, і робить все можливе для їх збереження. Багато з цих предметів антикварних
                            меблів
                            мають
                            не тільки сімейну, а й історичну та культурну цінність для нашої країни.
                            Слід зазначити, що матеріальна цінність антикварних меблів в останнє десятиліття сильно
                            зросла.
                            Тому
                            не поспішайте позбавлятися від старого серванта, комода або напівзруйнованого комода, який
                            дістався
                            вам від бабусі. Багато хто навіть не здогадуються, скільки унікальних предметів вони мають.
                        </div>
                        <a class="our-history__button" href="{{ route("user.about.index") }}">
                            Про нас
                        </a>
                    </div>
                    <div class="main-content-section__what-to-know">
                        <div class="what-to-know__subtitle">
                            ЩО ТАКЕ ПРАВИЛЬНА РЕСТАВРАЦІЯ?
                        </div>
                        <div class="what-to-know__title">
                            ОСОБЛИВОСТІ
                            РЕСТАВРАЦІЇ АНТИКВАРНИХ МЕБЛІВ
                        </div>
                        <div class="what-to-know__description">
                            Справжня реставрація - це повернення меблів первісного вигляду. Після грамотного введення
                            майстра
                            предмет меблів повинен зберігати сліди часу і існування предмета, а не приводити свій
                            зовнішній
                            вигляд в ідеальний стан нового виробу.
                            Якщо ще є можливість провести простий ремонт сучасних меблів або оббивку меблів своїми
                            руками,
                            то
                            комплексна реставрація антикварних і антикварних дерев'яних меблів в домашніх умовах просто
                            неможлива. Цей вид реставрації вимагає наявності спеціально обладнаної майстерні з
                            відповідними
                            інструментами і фахівців з професійними навичками і досвідом ремонту та реставрації
                            антикваріату.
                        </div>
                    </div>
                    <div class="main-content-section__graduation-section">
                        <div class="graduation-section__left-side">
                            <img src="{{ asset("storage/image/graduation-left.jpg") }}">
                        </div>
                        <div class="graduation-section__right-side">
                            <div class="right-side__top-section">
                                <a class="top-section__top-link-section" href="{{ route("user.graduation.index") }}">
                                    <div class="top-section__subtitle">
                                        Розрахувати вартість робіт
                                    </div>
                                    <div class="top-section__title">
                                        Оцінка реставрації
                                    </div>
                                </a>
                            </div>
                            <div class="right-side__bottom-section">
                                <img src="{{ asset("storage/image/graduation-right.jpg") }}">
                            </div>
                        </div>
                    </div>
                    <div class="main-content-section__about-restavration">
                        <div class="about-restavration__subtitle">

                        </div>
                        <div class="about-restavration__title">
                            ТЕ, ЩО БАГАТО ХТО ПОМИЛКОВО НАЗИВАЮТЬ РЕСТАВРАЦІЄЮ МЕБЛІВ,
                            БІЛЬШЕ ПІДХОДИТЬ ДЛЯ ВИРАЗУ «ПОДМАРАФЕТІЛІ».
                        </div>
                        <div class="about-restavration__description">
                            Звертаючись в майстерню або до приватних осіб з питанням ремонту та реставрації антикварних
                            або
                            антикварних меблів, дерев'яних меблів, люди отримують неякісні послуги.

                            Фарба або лак наноситься на дерев'яні предмети меблів, навіть не знімаючи старе лакофарбове
                            покриття, через що через кілька місяців або навіть раніше все це починає успішно зникати.
                            Хитка
                            столярна конструкція стільця, комода або обіднього столу повністю не демонтується і не
                            склеюється
                            заново, а зміцнюється цвяхами і саморізами, при цьому ще більше руйнуючи цілісність хиткої
                            столярної
                            конструкції, дорогого вашому серцю предмета меблів.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection