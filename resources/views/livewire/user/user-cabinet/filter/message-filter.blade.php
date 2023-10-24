<div class="user-cabinet__content">
    <div class="content__message-select">
        <select wire:model="selectFilter" name="messageFilter">
            <option value="1">Усі повідомлення</option>
            <option value="2">Надано відповідь</option>
            <option value="3">Очікує на відповідь</option>
        </select>
    </div>
    @if(!$messages->isEmpty())
        @foreach($messages as $message)
            <div class="services-content__services-card {{isset($message->deleted_at) ? "delete" :($message->is_read ? " border" : "")}}">
                <div class="services-card__card-description">
                    <div class="card-description__upper-section-card">
                        <div class="middle-section-card__graduation-left-side">
                            <span class="bottom-section-card__graduation-title">ПІБ користувача під час відправки:</span>
                            {{$message->name}}
                        </div>
                        <div class="upper-section-card__graduation-date">
                            {{\Carbon\Carbon::parse($message->created_at)->isoFormat('D MMMM YYYY', 'Do MMMM YYYY')}}
                        </div>
                    </div>
                    <div class="card-description__bottom-section-card">
                        <span class="bottom-section-card__graduation-title">Відповідь на повідомлення</span>
                        <div class="bottom-section-card__graduation-message">
                            {{$message->response}}
                        </div>
                    </div>
                    @if(isset($message->deleted_at))
                        <span class="danger text-end">
                    <i>*{{"Відмова"}}*</i>
                    </span>
                    @endif
                </div>
            </div>
        @endforeach
        {{$messages->links("livewire.pagination")}}
    @else
        <div class="content__else-empty">Нічого не знайдено!</div>
    @endif
</div>