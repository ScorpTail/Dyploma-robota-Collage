@extends("admin.layouts.main")
@section("content")
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-3">{{$type->type_name}}</h1>
                        <a href="{{route("admin.typeUser.edit", $type->id)}}" class="text-success pl-3"><i
                                    class="fas fa-pencil-alt"></i></a>
                        <form action="{{route("admin.typeUser.destroy", $type->id)}}"
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
                    <div class="col-3">
                        <div class="card ml-2">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Назва ролі</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{$type->id}}</td>
                                        <td>{{$type->type_name}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection