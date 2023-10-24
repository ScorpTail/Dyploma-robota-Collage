@extends("admin.layouts.main")

@section("content")
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Змінити назву</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="pt-3 col-3 card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Змінити назву</h3></div>
                        <form action="{{route("admin.typeUser.update", $type)}}" method="POST">
                            @csrf
                            @method("PATCH")
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="typeName">Змінити назву</label>
                                    <input type="text" class="form-control" name="type_name" id="typeName"
                                           placeholder="Змінити назву" value="{{$type->type_name}}">
                                    @error("type_name")
                                    <div class="text-danger">{{$message}}</div> @enderror
                                </div>
                                <div class="card">
                                    <button type="submit" class="btn btn-primary">Застосувати зміни</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection