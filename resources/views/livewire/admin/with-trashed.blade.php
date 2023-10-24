<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid ">
            <div class="row mb-2 ">
                <div class="col-sm-6">
                    <h1 class="m-0">Повідомлення про порушення</h1>
                    <div class="form-check mt-2">
                        <input wire:model="is_withTrashed" type="checkbox" class="form-check-input"
                               id="withTrashed">
                        <label class="form-check-label" for="withTrashed">Фільтр: лише смітник</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-9">
                    @if(!$reports->isEmpty())
                        <div class="card ml-2">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Ім'я порушника</th>
                                        <th>Електронна адреса порушника</th>
                                        <th>Номер телефону порушника</th>
                                        <th>Дата створення скарги</th>
                                        <th>Дія</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($reports as $report)
                                        <tr>
                                            <td>{{$report->id}}</td>
                                            @if(isset($report->user_id))
                                                <td>{!!$report->service->user->name ?? "<span class='text-bg-warning'> Дану послугу було видалено </span>"!!}</td>
                                                <td>{!!$report->service->user->email ?? "<span class='text-bg-warning'> Дану послугу було видалено </span>"!!}</td>
                                                <td>{!!$report->service->user->phone ?? "<span class='text-bg-warning'> Дану послугу було видалено </span>"!!}</td>
                                            @else
                                                <td><i class="text-bg-warning">*Відсутнє*</i></td>
                                                <td>{{$report->email}}</td>
                                                <td><i class="text-bg-warning">*Відсутнє*</i></td>
                                            @endif
                                            <td>{{$report->created_at}}</td>
                                            @if($report->is_read)
                                                <td>
                                                    <a href="{{route("admin.report.show", $report->id ?? "")}}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                             viewBox="0 0 448 512">
                                                            <path d="M53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32zm70.11-175.8l89.38-94.26a15.41 15.41 0 0 1 22.62 0l89.38 94.26c10.08 10.62 2.94 28.8-11.32 28.8H256v112a16 16 0 0 1-16 16h-32a16 16 0 0 1-16-16V320h-57.37c-14.26 0-21.4-18.18-11.32-28.8zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"/>
                                                        </svg>
                                                    </a>
                                                </td>
                                            @else
                                                <td>
                                                    <a href="{{route("admin.report.show", $report->id ?? "")}}"><i
                                                                class="far fa-eye"></i></a>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{$reports->links("admin.layouts.pagination.pagination-livewire")}}
                    @else
                        <div class="text-center fs-4">Ця таблиця пуста! Очікуйте на повідомлення</div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>
