import 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js'


var swiperPhoto = new Swiper(".mySwiper", {
    loop: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

var swiperAllPosts = new Swiper(".all-posts-content-card__swiper-posts-card", {
    loop: true,
    slidesPerView: (window.innerWidth <= 768 ? 3 : 4),
    centeredSlides: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
