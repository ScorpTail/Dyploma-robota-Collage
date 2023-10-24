document.addEventListener("livewire:load", function () {
    Livewire.hook('message.processed', (message, component) => {
        // Перевірте, чи повідомлення містить оновлення списку опцій
        if (message.updateQueue.hasOwnProperty('options')) {
            // Отримайте актуальні дані про опції з повідомлення
            const options = message.updateQueue.options;

            // Отримайте посилання на елемент select
            const selectElement = document.querySelector('[wire:model="selectedOption"]');

            // Очистіть поточний список опцій
            selectElement.innerHTML = '';

            // Додайте оновлені опції до списку
            options.forEach((option) => {
                const optionElement = document.createElement('option');
                optionElement.value = option.id;
                optionElement.textContent = option.name;
                selectElement.appendChild(optionElement);
            });
        }
    });
});