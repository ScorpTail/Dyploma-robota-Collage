@extends("admin.layouts.main")

@section("content")
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Додати нового користувача</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="pt-3 col-3 card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Додати нового користувача</h3></div>
                        <form action="{{route("admin.user.store")}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="userName">Ім'я користувача</label>
                                    <input type="text" class="form-control" name="name" id="userName"
                                           placeholder="Вкажіть ім'я користувача" value="{{old("name")}}">
                                    @error("name")
                                    <div class="text-danger">{{$message}}</div> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="userEmail">Електронна адреса</label>
                                    <input type="email" class="form-control" name="email" id="userEmail"
                                           placeholder="Вкажіть електронну адресу" value="{{old("email")}}">
                                    @error("email")
                                    <div class="text-danger">{{$message}}</div> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="userPhone">Номер телефону</label>
                                    <input type="tel" class="form-control" name="phone" id="userPhone"
                                           placeholder="Вкажіть номер телефону" value="{{old("phone")}}"
                                    >
                                    @error("phone")
                                    <div class="text-danger">{{$message}}</div> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="userPsw">Введіть пароль</label>
                                    <input type="password" class="form-control" name="password" id="userPsw"
                                           placeholder="Пароль">
                                    @error("password")
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="userPswConfirm">Підтвердіть пароль</label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                           id="userPswConfirm"
                                           placeholder="Підтвердіть пароль">
                                    @error("password_confirmation")
                                    <div class="text-danger">{{$message}}</div> @enderror
                                </div>
                                <div class="form-group">
                                    <label>Оберіть роль</label>
                                    <select name="role_id" class="form-control">
                                        <option selected> -----Оберіть роль-----</option>
                                        @foreach($roles as $role)
                                            <option {{ $role->id == old("role") ? " selected" : "" }} value="{{$role->id}}">{{$role->name_role}}</option>
                                        @endforeach
                                    </select>
                                    @error("role_id")
                                    <div class="text-danger">{{$message}}</div> @enderror
                                </div>

                                <div class="card">
                                    <button type="submit" class="btn btn-primary">Додати користувача</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection