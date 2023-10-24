const menu = document.querySelector('.navigation__menu')
const menuBtn = document.querySelector('.burger')
const body = document.body;
if (menu && menuBtn) {
    menuBtn.addEventListener('click', () => {
        menu.classList.toggle('active');
        menuBtn.classList.toggle('active');
        body.classList.toggle('lock');
        if (document.body.classList.contains("lock")) {
            body.addEventListener('click', (event) => {
                if (event.target.matches('.lock')) {
                    body.classList.remove('lock');
                    menu.classList.remove('active');
                    menuBtn.classList.remove('active');
                }
            });
        }
    })
}