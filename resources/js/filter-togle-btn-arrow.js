
const categories = document.querySelectorAll('.services-filter__toggle');
const categoryLists = document.querySelectorAll('.services-filter__services-filter-list');
const arrows = document.querySelectorAll('.arrow');

categories.forEach((category, index) => {
    category.addEventListener("click", () => {
        if (categoryLists[index] && arrows[index]) {
            categoryLists[index].classList.toggle('active');
            arrows[index].classList.toggle('active');
        }
    });
});

