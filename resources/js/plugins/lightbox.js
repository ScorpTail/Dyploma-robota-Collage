const galleryItem = document.getElementsByClassName("photoListGraduation__photoListGraduationImg")
// create element for lightbox
const lightBoxContainer = document.createElement("div");
//for basic area
const lightBoxContent = document.createElement("div");
//for images
const lightBoxImg = document.createElement("img");
//for prev button to change images
const lightBoxPrev = document.createElement("div");
//for next button
const lightBoxNext = document.createElement("div");
// create classlist
lightBoxContainer.classList.add('lightbox');
lightBoxContent.classList.add('lightbox-content');
lightBoxPrev.classList.add("fa", "fa-angle-left", "lightbox-prev");
lightBoxNext.classList.add("fa", "fa-angle-right", "lightbox-next");

lightBoxContainer.appendChild(lightBoxContent);
lightBoxContent.appendChild(lightBoxImg);
lightBoxContent.appendChild(lightBoxPrev);
lightBoxContent.appendChild(lightBoxNext);
document.body.appendChild(lightBoxContainer);

let index = 0;

function showLightBox(n) {
    index = n;
    if (index >= galleryItem.length) {
        index = 0;
    } else if (index < 0) {
        index = galleryItem.length - 1;
    }
    lightBoxImg.src = galleryItem[index].getAttribute("src");
}

function currentImage() {
    lightBoxContainer.style.display = "block";
    let imageIndex = parseInt(this.getAttribute("data-index"));
    showLightBox(imageIndex);
}

for (let i = 0; i < galleryItem.length; i++) {
    galleryItem[i].addEventListener("click", currentImage);
}

function sliderImage(n) {
    showLightBox(index += n);
}

function prevImage() {
    sliderImage(-1);
}

function nextImage() {
    sliderImage(1);
}

lightBoxPrev.addEventListener("click", prevImage);
lightBoxNext.addEventListener("click", nextImage);

function closeLightBox() {
    if (this === event.target) {
        lightBoxContainer.style.display = "none";
    }
}

lightBoxContainer.addEventListener("click", closeLightBox);