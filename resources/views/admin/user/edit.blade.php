@extends("admin.layouts.main")

@section("content")
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редагувати користувача</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="pt-3 col-3 card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Редагувати користувача</h3></div>
                        <form action="{{route("admin.user.update", $user->id)}}" method="POST">
                            @csrf
                            @method("PATCH")
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="userName">Змінити ім'я</label>
                                    <input type="text" class="form-control" name="name" id="userName"
                                           placeholder="Введіть ім'я користувача" value="{{$user->name}}">
                                    @error("name")
                                    <div class="text-danger">{{$message}}</div> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="userEmail">Електронна адреса</label>
                                    <input type="email" class="form-control" name="email" id="userEmail"
                                           placeholder="Вкажіть електронну адресу" value="{{$user->email}}">
                                    @error("email")
                                    <div class="text-danger">{{$message}}</div> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="userPhone">Номер телефону</label>
                                    <input type="tel" class="form-control" name="phone" id="userPhone"
                                           placeholder="Вкажіть номер телефону" value="{{$user->phone}}"
                                    >
                                    @error("phone")
                                    <div class="text-danger">{{$message}}</div> @enderror
                                </div>
                                <div class="form-group">
                                    <label>Оберіть роль</label>
                                    <select name="role_id" class="form-control">
                                        <option selected> -----Оберіть роль-----</option>
                                        @foreach($roles as $role)
                                            <option {{ $role->id == $user->role_id ? " selected" : "" }} value="{{$role->id}}">{{$role->name_role}}</option>
                                        @endforeach
                                    </select>
                                    @error("role_id")
                                    <div class="text-danger">{{$message}}</div> @enderror
                                </div>
                                <div class="card">
                                    <button type="submit" class="btn btn-primary">Зберегти зміни</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection