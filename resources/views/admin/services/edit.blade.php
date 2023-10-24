@extends("admin.layouts.main")
@section("content")
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="pt-3 col-6 card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Редагувати послугу</h3></div>
                        <form action="{{route("admin.services.update", $service)}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method("PATCH")
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="postName">Назва послуги</label>
                                    <input type="text" class="form-control" name="title" id="postName"
                                           placeholder="Вкажіть назву" value="{{$service->title}}">
                                    @error("title")
                                    <div class="text-danger">{{$message}}</div> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="summernote">Опис</label>
                                    <textarea name="description"
                                              id="summernote">{!! htmlspecialchars_decode($service->description) !!}</textarea>
                                    @error("description")
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="priceName">Ціна</label>
                                    <input type="text" class="form-control" name="price" id="priceName"
                                           placeholder="Вкажіть ціну" value="{{$service->price}}">
                                    @error("price")
                                    <div class="text-danger">{{$message}}</div> @enderror
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="customCheckbox1"
                                               value="true" name="is_delivery" @checked($service->is_delivery)>
                                        <label for="customCheckbox1" class="custom-control-label">Безкоштовна
                                            доставка</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Оберіть стан</label>
                                    <select name="status" class="form-control">
                                        <option selected> -----Оберіть стан-----</option>
                                        <option @selected(2 == $service->status) value="2">Популярна</option>
                                    </select>
                                    @error("status")
                                    <div class="text-danger">{{$message}}</div> @enderror
                                </div>
                                <div class="form-group">
                                    <input name="hidden" type="text" class="hidden-input" hidden>
                                    <label for="exampleInputFile">Оберіть фото</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="photo[]" class="custom-file-input"
                                                   id="previewImage" multiple accept=".svg, .png, .jpg">
                                            <label class="custom-file-label" for="previewImage">Оберіть
                                                файли</label>
                                            @error("photo[]")
                                            <div class="text-danger">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    @php
                                        $temps = explode("|", $service->photo);
                                    @endphp
                                    <ul class="graduation-form__photoList">
                                        @foreach($temps as $temp)
                                            @if(!empty($temp))
                                                <li><img src="{{asset($temp)}}"></li>
                                            @endif
                                        @endforeach
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
@endsection