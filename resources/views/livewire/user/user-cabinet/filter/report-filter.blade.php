<div class="user-cabinet__content">
    <div class="content__message-select">
        <select wire:model="selectFilter" name="messageFilter">
            <option value="1">Усі повідомлення</option>
            <option value="2">Надано відповідь</option>
            <option value="3">Очікує на відповідь</option>
        </select>
    </div>
    @if(!$reports->isEmpty())
        @foreach($reports as $report)
            <div class="services-content__services-card {{isset($report->deleted_at) ? "delete" :($report->is_read ? " border" : "")}}">
                <div class="services-card__card-description">
                    <div class="card-description__upper-section-card">
                        <div class="middle-section-card__graduation-left-side">
                            <span class="bottom-section-card__graduation-title">ПІБ користувача під час відправки:</span>
                            {{$report->user->name}}
                        </div>
                        <div class="upper-section-card__graduation-date">
                            {{\Carbon\Carbon::parse($report->created_at)->isoFormat('D MMMM YYYY', 'Do MMMM YYYY')}}
                        </div>
                    </div>
                    <div class="card-description__bottom-section-card">
                        <span class="bottom-section-card__graduation-title">Відповідь на повідомлення</span>
                        <div class="bottom-section-card__graduation-message">
                            {{$report->response}}
                        </div>
                        <span class="danger">
                    <i>*{{$report->type == 1 ? "Шахрайство" : ($report->type == 2 ? "Неправильні відомості про послугу" : "Автор видає сторонню послугу за власну")}}*</i>
                    </span>
                    </div>
                </div>
            </div>
        @endforeach
        {{ $reports->links("livewire.pagination") }}
    @else
        <div class="content__else-empty">Скарг не виявлено!</div>
    @endif
</div>