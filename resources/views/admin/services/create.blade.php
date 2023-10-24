@extends("admin.layouts.main")
@section("content")

    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="pt-3 col-8 card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Додати послугу</h3>
                    </div>
                    <form action="{{route("admin.services.store")}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="postName">Назва послуги</label>
                                <input type="text" class="form-control" name="title" id="postName"
                                       placeholder="Вкажіть назву" value="{{old("title")}}">
                                @error("title")
                                <div class="text-danger">{{$message}}</div> @enderror
                            </div>
                            <div class="form-group">
                                <label for="summernote">Опис</label>
                                <textarea name="description" id="summernote">{{old("description")}}</textarea>
                                @error("description")
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="priceName">Ціна</label>
                                <input type="text" class="form-control" name="price" id="priceName"
                                       placeholder="Вкажіть ціну" value="{{old("price")}}">
                                @error("price")
                                <div class="text-danger">{{$message}}</div> @enderror
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="customCheckbox1"
                                           value="true" name="is_delivery" @checked(old("is_delivery"))>
                                    <label for="customCheckbox1" class="custom-control-label">Безкоштовна
                                        доставка</label>
                                </div>
                            </div>
{{--                            <div class="form-group">--}}
                            {{--                                <label>Оберіть статус</label>--}}
                            {{--                                <select name="status" class="form-control">--}}
                            {{--                                    <option selected> -----Оберіть статус-----</option>--}}
                            {{--                                    <option @selected(2 == old("status")) value="2">Популярна</option>--}}
                            {{--                                </select>--}}
                            {{--                                @error("status")--}}
                            {{--                                <div class="text-danger">{{$message}}</div> @enderror--}}
                            {{--                            </div>--}}
                            <div class="form-group">
                                <label>Оберіть стан</label>
                                <select name="type_work" class="form-control">
                                    <option selected> -----Оберіть категорію-----</option>
                                    <option @selected(1 == old("type_work")) value="1">Реставрація</option>
                                    <option @selected(2 == old("type_work")) value="2">Ремонт</option>
                                </select>
                                @error("type_work")
                                <div class="text-danger">{{$message}}</div> @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Оберіть фото</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="photo[]" class="custom-file-input"
                                               id="previewImage" multiple accept=".svg, .png, .jpg">
                                        <label class="custom-file-label" for="previewImage">Оберіть файли</label>

                                    </div>
                                </div>
                                @error("photo")
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                                <ul class="graduation-form__photoList">

                                </ul>
                            </div>
                            <div class="card">
                                <button type="submit" class="btn btn-primary">Додати послугу</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection