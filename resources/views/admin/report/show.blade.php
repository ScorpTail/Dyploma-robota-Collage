@extends("admin.layouts.main")
@vite(["resources/sass/app.scss"])
@section("content")
    <div class="content-wrapper">
        <section class="content mt-3">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-11">
                        <div class="d-flex flex-column pl-3">
                            <h1 class="m-0 fs-2">{{$report->type == 1 ? "Шахрайство" : ($report->type == 2 ? "Неправильні відомості про послугу" : "Автор видає сторонню послугу за власну")}}</h1>
                            @error("accept")
                            <span class="text-danger">{{$message}} </span>
                            @enderror
                            @error("deny")
                            <span class="text-danger">{{$message}} </span>
                            @enderror
                        </div>
                        @if (!$report->is_read)
                            <div class="d-flex align-items-center mb-3">
                                <button data-toggle="modal" data-target="#accept" type="submit"
                                        class="btn btn-success pr-3 m-3" role="button">відповісти на
                                    повідомлення
                                </button>
                                <button data-toggle="modal" data-target="#deny" type="submit" class="btn btn-danger"
                                        role="button">видалити повідомлення
                                </button>
                            </div>
                        @endif
                        <div class="card ml-2">
                            <div class="card-body table-responsive p-2">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        @if(isset($report->user_id))
                                            <th>Ім'я відправника скарги</th>
                                            <th>Електронна адреса відправника скарги</th>
                                            <th>Номер телефону відправника скарги</th>
                                        @else
                                            <th>Електронна адреса відправника скарги</th>
                                        @endif
                                        <th>Дата створення скарги</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{$report->id}}</td>
                                        @if(isset($report->user_id))
                                            <td>{!! $report->user->name ?? "<span class='text-bg-warning'> Дану послугу було видалено </span>" !!}</td>
                                            <td>{!! $report->user->email ?? "<span class='text-bg-warning'> Дану послугу було видалено </span>" !!}</td>
                                            <td>{!! $report->user->phone ?? "<span class='text-bg-warning'> Дану послугу було видалено </span>" !!}</td>
                                        @else
                                            <td>{{$report->email}}</td>
                                        @endif
                                        <td>{{$report->created_at}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <h1 class="text-info fw-bolder mt-3">
                                    //
                                    <a href="{{route("user.services.services-item.show", $report->service_id ?? "")}}">
                                        Посилання на послугу
                                    </a>
                                    //
                                    <a href="{{route("admin.services.show", $report->service_id ?? "")}}">
                                        Посилання на послугу (Адмін панель)
                                    </a>
                                    //
                                    <a href="{{route("admin.user.show", $report->service->user->id ?? "")}}">Посилання
                                        на автора (Адмін панель)</a>
                                    //
                                </h1>
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Ім'я порушника</th>
                                        <th>Електронна адреса порушника</th>
                                        <th>Номер телефону порушника</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{$report->id}}</td>
                                        <td>
                                            <i>*{!!$report->service->user->name ?? "<span class='text-bg-warning'> Дану послугу було видалено </span>"!!}
                                                *</i></td>
                                        <td>
                                            <i>*{!!$report->service->user->email ?? "<span class='text-bg-warning'> Дану послугу було видалено </span>"!!}
                                                *</i></td>
                                        <td>
                                            <i>*{!!$report->service->user->phone ?? "<span class='text-bg-warning'> Дану послугу було видалено </span>" !!}
                                                *</i></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="form-group mt-3">
                                    <label>Повідомлення користувача</label>
                                    <textarea style="resize: none" class="form-control" rows="15" placeholder=""
                                              disabled>{{$report->content}}</textarea>
                                </div>
                                @if($report->is_read)
                                    <div class="form-group mt-3">
                                        <label>Відповідь адміністрації</label>
                                        <textarea style="resize: none" class="form-control" rows="15" placeholder=""
                                                  disabled>{{$report->response}}</textarea>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include("admin.report.includes.accept-modal")
    @include("admin.report.includes.deny-modal")
@endsection