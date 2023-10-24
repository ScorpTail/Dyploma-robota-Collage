<div class="modal fade" id="report" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="report">Повідомити про порушення</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route("user.services.services-item.report.store", $service)}}"
                  method="POST">
                @csrf
                <div class="modal-body">
                    <h1 class="fs-5"><span class="text-danger bg-transparent">Надіслати скаргу</span></h1>
                    @guest("web")
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="email" aria-label="Username"
                                   aria-describedby="basic-addon1" name="email">
                        </div>
                        @error("email")
                        <div class="text-danger text-bg-warning w-25 text-center"
                             style="font-size: 16px">{{$message}}</div>
                        @enderror
                    @endguest
                    <div class="form-group fs-5 d-flex flex-column gap-2 mb-2 ml-5">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" id="flexRadioDefault1"
                                   value="1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Шахрайство
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" id="flexRadioDefault2"
                                   value="2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Неправильні відомості про послугу
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" id="flexRadioDefault3"
                                   value="3">
                            <label class="form-check-label" for="flexRadioDefault3">
                                Автор видає сторонню послугу за власну
                            </label>
                        </div>
                        @error("type")
                        <div class="text-danger text-bg-warning w-25 text-center"
                             style="font-size: 16px">{{$message}}</div>
                        @enderror
                    </div>
                    <label for="textarea" class="mb-1 bg-info p-1 rounded-2">Поле для розширеної заяви (не
                        обов'язково)</label>
                    <textarea class="form-control" name="content" id="textarea"
                              rows="10" style="resize: none" placeholder="Надайте додаткову інформацію"></textarea>
                    @error("content")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити
                    </button>
                    <button type="submit" class="btn btn-success">Надіслати
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>