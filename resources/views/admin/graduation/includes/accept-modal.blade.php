<div class="modal fade" id="accept" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="accept">Надіслати відповідь</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{route("admin.graduation.store", $graduation)}}"
                  method="POST">
                @csrf
                <div class="modal-body">
                    <h5>Надіслати відповідь <span class="text-info">{{$graduation->name}}</span>
                    </h5>
                    <label for="textarea"></label>
                    <textarea class="form-control" name="response" id="textarea"
                              rows="20" style="resize: none" placeholder="Вкажіть вашу відповідь..."></textarea>
                    @error("response")
                    <span class="text-danger">{{$message}} </span>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити
                    </button>
                    <button type="submit" class="btn btn-success">Надіслати
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>