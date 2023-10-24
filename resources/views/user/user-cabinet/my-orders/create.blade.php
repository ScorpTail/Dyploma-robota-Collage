@extends("user.user-cabinet.index")
@vite([
    "resources/js/plugins/select2/css/select2.min.css",
    "resources/js/plugins/fontawesome-free/css/all.min.css",
    "resources/js/plugins/summernote/summernote-bs4.min.css",
    "resources/js/dist/css/adminlte.min.css",
    "resources/js/plugins/overlayScrollbars/css/OverlayScrollbars.min.css",
    "resources/js/plugins/daterangepicker/daterangepicker.css",
    "resources/sass/app.scss",
    "resources/sass/tools.scss",
    "resources/sass/reset.scss",
    "resources/sass/lightbox.scss",
    "resources/sass/cabinet-order-create.scss",
    ])
@section("user-cabinet-content")
    <div class="user-cabinet__content">
        <section class="content ml-5">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="pt-3 col-12 card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Додати послугу</h3>
                        </div>
                        <form action="{{route("user.user-cabinet.order.store")}}" method="POST"
                              enctype="multipart/form-data">
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
    </div>
    @vite([
    "resources/js/plugins/jquery/jquery.min.js",
    "resources/js/plugins/jquery-ui/jquery-ui.min.js",
    "resources/js/plugins/bootstrap/js/bootstrap.bundle.min.js",
   // "resources/js/plugins/moment/moment.min.js",
   // "resources/js/plugins/daterangepicker/daterangepicker.js",
    "resources/js/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js",
    "resources/js/dist/js/adminlte.js",
    "resources/js/plugins/summernote/summernote-bs4.min.js",
    "resources/js/plugins/bs-custom-file-input/bs-custom-file-input.min.js",
    "resources/js/plugins/select2/js/select2.full.min.js",
    "resources/js/plugins/tools.js",
    "resources/js/plugins/lightbox.js",
    ])
@endsection