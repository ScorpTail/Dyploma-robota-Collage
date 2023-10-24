var label = document.querySelector(".card-description__service-description-card");
if (label.innerText.length > 40) {
    label.innerText = label.innerText.substring(0, 37) + '...';
}