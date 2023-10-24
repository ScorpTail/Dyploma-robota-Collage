@extends("admin.layouts.main")
@vite(["resources/sass/app.scss", "resources/sass/lightbox.scss", "resources/js/plugins/lightbox.js"])
@section("content")
    <div class="content-wrapper">
        <section class="content mt-3">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-10">
                        <div class="d-flex flex-column pl-3">
                            @error("response")
                            <span class="text-danger">{{$message}} </span>
                            @enderror
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <button data-toggle="modal" data-target="#accept" type="submit"
                                    class="btn btn-success pr-3 m-3" role="button">відповісти на
                                повідомлення
                            </button>
                            <button data-toggle="modal" data-target="#deny" type="submit" class="btn btn-danger"
                                    role="button">видалити повідомлення
                            </button>
                        </div>
                        <div class="card ml-2">
                            <div class="card-body table-responsive p-2">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Ім'я</th>
                                        <th>Електронна адреса</th>
                                        <th>Номер телефону</th>
                                        <th>Дата створення</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{$graduation->id}}</td>
                                        <td>{{$graduation->name}}</td>
                                        <td>{{$graduation->email}}</td>
                                        <td>{{$graduation->phone}}</td>
                                        <td>{{$graduation->created_at}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="form-group mt-3">
                                    <label>Повідомлення користувача</label>
                                    <textarea style="resize: none" class="form-control" rows="5"
                                              disabled>{{$graduation->message}}</textarea>
                                </div>
                                @php
                                    $temps = explode("|", $graduation->photo)
                                @endphp
                                <div class="form-group mt-3">
                                    <div class="timeline-body photoListGraduation">
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
    @include("admin.graduation.includes.accept-modal")
    @include("admin.graduation.includes.deny-modal")
@endsection