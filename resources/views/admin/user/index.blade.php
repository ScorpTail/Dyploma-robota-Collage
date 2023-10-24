@extends("admin.layouts.main")
@section("content")
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Користувачі</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-3 mb-3">
                        <a href="{{route("admin.user.create")}}" class="btn btn-block btn-primary">Додати</a>
                    </div>
                </div>
                @if(!$users->isEmpty())
                <div class="row">
                    <div class="col-6">
                        <div class="card ml-2">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Ім'я Користувача</th>
                                        <th colspan="3" class="text-center">Дія</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td><a href="{{route("admin.user.show", $user->id)}}"><i
                                                            class="far fa-eye"></i></a></td>
                                            <td><a href="{{route("admin.user.edit", $user->id)}}"
                                                   class="text-success">
                                                    <i class="fas fa-pencil-alt"></i></a></td>
                                            <td>
                                                @if($user->role_id != 2)
                                                    <form action="{{route("admin.user.destroy", $user->id)}}"
                                                          method="POST">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button type="submit" class="border-0 bg-transparent">
                                                            <i class="fas fa-trash text-danger" role="button"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{$users->links("admin.layouts.pagination.pagination")}}
                    </div>
                </div>
                    @else
                        <div class="text-center fs-4">Ця таблиця пуста! Очікуйте на повідомлення</div>
                    @endif
            </div>
        </section>
    </div>
@endsection