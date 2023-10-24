@extends("admin.layouts.main")

@section("content")
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-3">{{$service->title}}</h1>
                        <a href="{{route("admin.services.edit", $service)}}" class="text-success pl-3"><i
                                    class="fas fa-pencil-alt"></i></a>
                        <form action="{{route("admin.services.destroy", $service)}}"
                              method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="border-0 bg-transparent">
                                <i class="fas fa-trash text-danger pl-3" role="button"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card ml-2">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th class="col-2">Назва послуги</th>
                                        <th class="col-3">Опис</th>
                                        <th>Ціна</th>
                                        <th>Стан</th>
                                        <th>Автор</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{$service->id}}</td>
                                        <td>{{$service->title}}</td>
                                        <td>{!! htmlspecialchars_decode($service->description) !!}</td>
                                        <td>{{$service->price}}</td>
                                        <td>{{$service->status == 1 ? "Нова" : ($service->type == 2 ? "Популярне" : "Звичайна")}}</td>
                                        <td>{{$service->user->name}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                                @php
                                    $temps = explode("|", $service->photo);
                                @endphp
                                <div class="form-group mt-3">
                                    <div class="timeline-body photoListGraduation pl-3">
                                        <a href="{{route("user.services.services-item.show", $service->id)}}">Посилання
                                            на роботу</a>
                                        <a href="{{route("user.services.user-account.show", $service->user->id)}}">Посилання
                                            на автора</a>
                                        <a href="{{route("admin.user.show", $service->user->id)}}">Посилання
                                            на автора (Адмін панель)</a>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <div class="timeline-body photoListGraduation pl-3">
                                        @foreach($temps as $key => $temp)
                                            @if(!empty($temp))
                                                <img class="photoListGraduation__photoListGraduationImg"
                                                     src="{{asset($temp)}}" data-index="{{$key}}">
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection