const rangeInput = document.querySelectorAll(".range-input input"),
    priceInput = document.querySelectorAll(".price-input input"),
    range = document.querySelector(".slider .progres");
let priceGap = 0;

priceInput.forEach(input => {
    input.addEventListener("input", e => {
        let minPrice = parseInt(priceInput[0].value),
            maxPrice = parseInt(priceInput[1].value);
        if ((maxPrice - minPrice >= priceGap) && maxPrice <= rangeInput[1].max) {
            if (e.target === priceInput[0]) {
                rangeInput[0].value = minPrice;
                range.style.left = ((minPrice / rangeInput[0].max) * 100) + "%";
            } else {
                rangeInput[1].value = maxPrice;
                range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
            }
        }
    });
});

rangeInput.forEach(input => {
    input.addEventListener("input", e => {
        let minVal = parseInt(rangeInput[0].value),
            maxVal = parseInt(rangeInput[1].value);
        if ((maxVal - minVal) < priceGap) {
            if (e.target === rangeInput[0]) {
                rangeInput[0].value = maxVal - priceGap
            } else {
                rangeInput[1].value = minVal + priceGap;
            }
        } else {
            priceInput[0].value = minVal;
            priceInput[1].value = maxVal;
            range.style.left = ((minVal / rangeInput[0].max) * 100) + "%";
            range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
        }
    });
});

window.addEventListener("load", () => {
    const rangeInput = document.querySelectorAll(".range-input input"),
        range = document.querySelector(".slider .progres");

    // Оновлення стилю слайдера при завантаженні сторінки
    const updateSliderStyle = () => {
        const minVal = parseInt(rangeInput[0].value),
            maxVal = parseInt(rangeInput[1].value),
            maxRange = parseInt(rangeInput[1].max);

        const left = ((minVal / maxRange) * 100) + "%",
            right = 100 - ((maxVal / maxRange) * 100) + "%";

        range.style.left = left;
        range.style.right = right;
    };

    // Виклик функції оновлення стилю слайдера
    updateSliderStyle();
});