<div class="modal fade" id="deny" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="deny">Відхили та видалити</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{route("admin.contact.destroy", $contact->id)}}"
                  method="POST">
                @csrf
                @method("DELETE")
                <div class="modal-body">
                    <h5>Вкажіть причину відхилення <span class="text-info">{{$contact->name}}</span>
                    </h5>
                    <label for="textarea"></label>
                    <textarea class="form-control" name="response" id="textarea"
                              rows="20" style="resize: none" placeholder="Вкажіть вашу відповідь..."></textarea>
                    @error("response") <span
                            class="text-danger">{{$message}} </span>@enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити
                    </button>
                    <button type="submit" class="btn btn-danger">Відхилити
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>