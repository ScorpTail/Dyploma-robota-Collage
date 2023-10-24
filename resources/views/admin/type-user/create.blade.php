@extends("admin.layouts.main")
@section("content")
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Додати тип користувача</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="pt-3 col-3 card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Додати тип користувача</h3></div>
                        <form action="{{route("admin.typeUser.store")}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="typeUser">Назва для типу</label>
                                    <input type="text" class="form-control" name="type_name" id="typeUser"
                                           placeholder="Вкажіть назву">
                                    @error("type_name")
                                    <div class="text-danger">{{$message}}</div> @enderror
                                </div>
                                <div class="card">
                                    <button type="submit" class="btn btn-primary">Додати тип</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection