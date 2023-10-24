var uploadedPhotos = []; // Масив для зберігання завантажених фотографій

var fileInput = document.querySelector('.graduation-form__file');
var photoList = document.querySelector('.graduation-form__photoList');

fileInput.addEventListener('change', function () {
    var files = fileInput.files;

    if (files.length > 0) {
        for (var i = 0; i < files.length; i++) {
            uploadedPhotos.push(files[i]);
        }

        updatePhotoList();
    }
});

function updatePhotoList() {
    photoList.innerHTML = '';

    for (var i = 0; i < uploadedPhotos.length; i++) {
        var listItem = document.createElement('li');
        listItem.textContent = uploadedPhotos[i].name;

        // Додавання обробника події "click" для видалення фотографії
        listItem.addEventListener('click', createRemoveHandler(i));

        photoList.appendChild(listItem);
        console.log(uploadedPhotos[i].name);
    }

    var userPhoto = document.querySelector('input[type="file"]');

    userPhoto.value = '';

    var files = userPhoto.files;
    var originalArray = Array.from(files);

    // Додавання іншого масиву
    var combinedArray = originalArray.concat(uploadedPhotos);

    // Очищення елементу input
    userPhoto.value = '';

    // Створення об'єкта DataTransfer
    var dataTransfer = new DataTransfer();

    // Додавання файлів до об'єкта DataTransfer
    combinedArray.forEach(function (file) {
        dataTransfer.items.add(file);
    });

    // Встановлення об'єкта DataTransfer як нового значення елементу input
    userPhoto.files = dataTransfer.files;
}

function createRemoveHandler(index) {
    return function () {
        // Видалення фотографії з масиву за індексом
        uploadedPhotos.splice(index, 1);

        // Оновлення списку фотографій на сторінці
        updatePhotoList();
    };
}

