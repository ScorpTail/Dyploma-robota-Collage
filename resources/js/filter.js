
const filterButton = document.querySelector('.services-content__button');
const backButton = document.querySelector('.filter__button');
const filter = document.querySelector('.services-section__filter');
const body = document.body;
const bodyBack = document.querySelector('fixed::after');

if (filterButton && filter) {
    filterButton.addEventListener('click', () => {
        filter.classList.toggle('open');
        body.classList.toggle('fixed');
        if (document.body.classList.contains("fixed")) {
            body.addEventListener('click', (event) => {
                if (event.target.matches('.fixed')) {
                    filter.classList.remove('open');
                    body.classList.remove('fixed');
                }
            });
        }
    });
}
if (backButton && filter) {
    backButton.addEventListener('click', () => {
        filter.classList.toggle('open');
        body.classList.toggle('fixed');
    });
}




