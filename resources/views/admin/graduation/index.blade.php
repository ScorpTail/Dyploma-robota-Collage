@extends("admin.layouts.main")
@section("content")
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Оцінка антикваріату</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                    @if(!$graduations->isEmpty())
                <div class="row">
                        <div class="col-5">
                            <div class="card ml-2">
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Ім'я користувача</th>
                                            <th>Номер телефону</th>
                                            <th>Дата створення</th>
                                            <th>Дія</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($graduations as $graduation)
                                            <tr>
                                                <td>{{$graduation->id}}</td>
                                                <td>{{$graduation->name}}</td>
                                                <td>{{$graduation->phone}}</td>
                                                <td>{{$graduation->created_at}}</td>
                                                <td><a href="{{route("admin.graduation.show", $graduation)}}"><i
                                                                class="far fa-eye"></i></a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{$graduations->links("admin.layouts.pagination.pagination")}}
                        </div>
                </div>
                @else
                    <div class="text-center fs-4">Ця таблиця пуста! Очікуйте на повідомлення</div>
                @endif
            </div>
        </section>
    </div>
@endsection