var btnEdit = document.querySelector(".__button");
var form = document.querySelector(".personal-information__form");
var inputs = document.querySelectorAll(".content-title__field");


btnEdit.addEventListener("click", function () {
    inputs.forEach(input => {
        input.disabled = false;
        input.classList.toggle("__input");
    });
    form.classList.toggle("edit--active");
});

