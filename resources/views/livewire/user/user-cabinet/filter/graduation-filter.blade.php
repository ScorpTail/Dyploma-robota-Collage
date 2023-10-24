<div class="user-cabinet__content">
        <div class="content__graduation-select">
            <select wire:model="selectFilter" name="messageFilter">
                <option value="1">Усі повідомлення</option>
                <option value="2">Надано відповідь</option>
                <option value="3">Очікує на відповідь</option>
            </select>
        </div>
    @if(!$graduations->isEmpty())
        @foreach($graduations as $graduation)
            <div class="services-content__services-card">
                <div class="services-card__card-description">
                    <div class="card-description__upper-section-card">
                        <div class="upper-section-card__graduation-photo-list">
                            @foreach(explode("|", $graduation->photo) as $temp)
                                @if(!empty($temp))
                                    <img class="graduation-photo-list__graduation-image" src="{{asset($temp)}}">
                                @else
                                    <i>Нема фото*</i>
                                @endif
                            @endforeach
                        </div>
                        <div class="upper-section-card__graduation-date">
                            {{\Carbon\Carbon::parse($graduation->created_at)->isoFormat('D MMMM YYYY', 'Do MMMM YYYY')}}
                        </div>
                    </div>
                    <div class="card-description__middle-section-card">
                        <div class="middle-section-card__graduation-left-side">
                            <span class="bottom-section-card__graduation-title">ПІБ користувача під час відправки:</span>
                            {{$graduation->name}}
                        </div>
                    </div>
                    <div class="card-description__bottom-section-card">
                        <span class="bottom-section-card__graduation-title">Відповідь на повідомлення</span>
                        <div class="bottom-section-card__graduation-message">
                            {{$graduation->response}}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{ $graduations->links("livewire.pagination") }}
    @else
        <div class="content__else-empty">Нічого не знайдено!</div>
    @endif
</div>
