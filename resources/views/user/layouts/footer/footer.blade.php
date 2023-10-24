<footer class="footer">
    <div class="footer__container">
        <div class="footer__footer-content">
            <div class="footer__logo-footer">
                <a href="#">
                    <img class="logo-footer__project" src="{{ asset("storage/image/footer_logo.svg") }}"
                         alt="footer_logo">
                </a>
            </div>

            <div class="footer__navigation-footer">
                <ul class="navigation-footer__menu-footer">
                    <li class="menu-footer__item"><a href="{{ route("user.contacts.index") }}">Контакти</a></li>
                    <li class="menu-footer__item"><a href="{{ route("user.graduation.index") }}">Оцінка</a></li>
                    <li class="menu-footer__item"><a href="{{ route("user.guarantee.index") }}">Гарантії</a></li>
                    <li class="menu-footer__item"><a href="{{ route("user.policy.index") }}">Політика
                            конфіденційності</a></li>
                </ul>
            </div>

            <div class="footer__contacts-footer">
                <div class="contacts-footer__title">
                    Наші контакти:
                </div>
                <div class="contacts-footer__information">
                    <ul class="information__information-content">
                        <li class="information-content__item">Telegram: <a href="#">+38095-220-43-35</a></li>
                        <li class="information-content__item">Viber: <a href="#">+38095-220-43-35</a></li>
                        <li class="information-content__item">Гаряча лінія: <a href="#">+38095-220-43-35</a></li>
                        <li class="information-content__item">Електронна пошта: <a href="#">example@gmail.com</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="footer__subtitle">
            <h6> Офіційне Інтернет-представництво
                Скрині давнини.
                <br>Усіх прав дотримано © 2003—2023
            </h6>
        </div>
    </div>
</footer>