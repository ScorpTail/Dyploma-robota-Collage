var sectionList = document.querySelectorAll('.menu__link');
var main = document.getElementById("main");
var url = window.location.href;

sectionList.forEach(section => {

    if (url.includes(section.id)) {
        section.classList.toggle('section--active');
    }

    if (url.indexOf(main.id) === url.length - 1) {
        section.classList.toggle('section--active');
    }
});
