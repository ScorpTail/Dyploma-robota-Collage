import 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js'

var mainSwiper = new Swiper(".main-swiper__swiper", {
    loop: true,
    centeredSlides: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
});
