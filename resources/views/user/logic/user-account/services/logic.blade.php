@php
    use Carbon\Carbon;
        // Отримання поточної дати
        $currentDate = Carbon::now();

        // Отримання дати створення сервісу
        $createdDate = Carbon::parse($service->created_at);

        // Додавання 7 днів до дати створення
        $endDate = $createdDate->addDays(7);

        // Перевірка, чи поточна дата перевищує кінцеву дату
        if ($currentDate->greaterThan($endDate) && $service->status != 2) {
            $service->update(["status" => 3]);
            $serviceStatus = 3;
        } elseif ($currentDate->lessThan($endDate) && $service->status != 2) {
            $service->update(["status" => 1]);
            $serviceStatus = 1;
        } else {
            $serviceStatus = $service->status;
        }
@endphp

{{$serviceStatus == 1 ? "Нове" : ($serviceStatus == 2 ? "Популярне" : "Звичайна")}}
