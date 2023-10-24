const fileInput = document.getElementById('avatar-upload');
const placeholder = document.getElementById('avatar-placeholder');

fileInput.onchange = function (event) {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.addEventListener('load', function () {
            placeholder.style.backgroundImage = 'url(' + reader.result + ')';
            placeholder.style.backgroundSize = 'cover';
            placeholder.style.backgroundPosition = 'center';
        });
        reader.readAsDataURL(file);
    }
}