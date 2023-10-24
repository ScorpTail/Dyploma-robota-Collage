<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Всі послуги</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-5 d-flex align-items-center ">
                    <a href="{{route("admin.services.create")}}" class="btn btn-block btn-primary">Додати</a>
                </div>
                <div class="input-group input-group-sm d-flex align-items-center" style="width: 250px;">
                    <input type="text" wire:model="searchOrder" name="table_search"
                           class="form-control float-right"
                           placeholder="Пошук... (пошук за ID)" oninput="validateInput(this)">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="form-check mt-2 mb-4">
                <input wire:model="is_withTrashed" type="checkbox" class="form-check-input"
                       id="withTrashed">
                <label class="form-check-label" for="withTrashed">Фільтр: разом зі смітником</label>
            </div>
            <div class="row">
                @if(!$services->isEmpty())
                    <div class="col-8">
                        <div class="card ml-2">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Назва послуги</th>
                                        <th colspan="3" class="text-center">Дія</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($services as $service)
                                        <tr>
                                            <td>{{$service->id}}</td>
                                            <td style="word-wrap: break-word;overflow-wrap: break-word;word-break: break-all;">{{$service->title}}</td>
                                            @if(empty($service->deleted_at))
                                                <td><a href="{{route("admin.services.show", $service)}}"><i
                                                                class="far fa-eye"></i></a></td>
                                                <td><a href="{{route("admin.services.edit", $service)}}"
                                                       class="text-success">
                                                        <i class="fas fa-pencil-alt"></i></a></td>
                                                <td>
                                                    <form action="{{route("admin.services.destroy", $service)}}"
                                                          method="POST">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button type="submit" class="border-0 bg-transparent">
                                                            <i class="fas fa-trash text-danger" role="button"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            @else
                                                <td>
                                                    <button wire:click="restore({{$service->id}})">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                             viewBox="0 0 448 512">
                                                            <path d="M53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32zm70.11-175.8l89.38-94.26a15.41 15.41 0 0 1 22.62 0l89.38 94.26c10.08 10.62 2.94 28.8-11.32 28.8H256v112a16 16 0 0 1-16 16h-32a16 16 0 0 1-16-16V320h-57.37c-14.26 0-21.4-18.18-11.32-28.8zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"/>
                                                        </svg>
                                                    </button>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    {{$services->links("admin.layouts.pagination.pagination-livewire")}}
                @else
                    <div class="text-center fs-4">Ця таблиця пуста! Очікуйте на повідомлення</div>
                @endif
            </div>
        </div>
    </section>
</div>

<script>
    function validateInput(input) {
        // Видаляємо будь-які нецифрові символи, залишаючи тільки цифри
        input.value = input.value.replace(/\D/g, '');

        if (input.value.length > 0) {
            // Якщо в полі введено щось, окрім цифр, виводимо підказку
            input.setCustomValidity('Дозволено тільки цифри');
        } else {
            // Якщо введено тільки цифри або поле порожнє, видаляємо підказку
            input.setCustomValidity('');
        }
    }
</script>