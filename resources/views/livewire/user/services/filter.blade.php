<div class="services-section__filter">
    <button type="button" class="services-filter__toggle">
                        <span class="services-filter__toggle-title">
                            Ціна
                            <div class="arrow">
                            </div>
                        </span>
    </button>
    <div class="services-filter__services-filter-list">
        <form method="get">
            <div class="price-input">
                <div class="field">
                    <input wire:model="min" name="min" type="number" step="0.01"
                           class="input-min" min="{{$startMin}}" max="{{$startMax}}">
                </div>
                <div class="separator">—</div>
                <div class="field">
                    <input wire:model="max" name="max" type="number" class="input-min"
                           min="{{$startMin}}"
                           max="{{$startMax}}">
                </div>
                <button type="submit" class="price-success">OK</button>
            </div>
            <div class="slider" wire:ignore>
                <div class="progres" wire:ignore></div>
            </div>
            <div class="range-input">
                <input wire:model="min" onchange="this.form.submit()" type="range" class="range-min" min="{{$startMin}}"
                       max="{{$startMax}}">
                <input wire:model="max" onchange="this.form.submit()" type="range" class="range-max" min="{{$startMin}}"
                       max="{{$startMax}}">
            </div>
        </form>
    </div>
    <div class="filter__services-filter">
        <button type="button" class="services-filter__toggle">
            <span class="services-filter__toggle-title">
                                Вид роботи
            <span class="services-filter__quantity">2</span>
        <div class="arrow"></div>
        </span>
        </button>
        <ul class="services-filter__services-filter-list">
            <li class="services-filter-list__list-item">
                <a href="{{request()->fullUrlWithQuery(["type_work" => "2"])}}"
                   class="services-filter-list__link {{request()->get("type_work") == 2 ? "services--active" : ""}}">
                    Ремонт
                    <span class="services-filter-list__quantity">({{$remont}})</span>
                </a>
            </li>
            <li class="services-filter-list__list-item">
                <a href="{{request()->fullUrlWithQuery(["type_work" => "1"])}}"
                   class="services-filter-list__link {{request()->get("type_work") == 1 ? "services--active" : ""}}">
                    Реставрація
                    <span class="services-filter-list__quantity">({{$restavration}})</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="filter__services-filter">
        <button type="button" class="services-filter__toggle">
            <span class="services-filter__toggle-title">
                                Нове - Популярне - Звичайне
            <span class="services-filter__quantity">2</span>
        <div class="arrow"></div>
        </span>
        </button>
        <ul class="services-filter__services-filter-list">
            <li class="services-filter-list__list-item">
                <a href="{{request()->fullUrlWithQuery(["status" => "1"])}}"
                   class="services-filter-list__link {{request()->get("status") == 1 ? "services--active" : ""}}">
                    Нове
                    <span class="services-filter-list__quantity">({{$new}})</span>
                </a>
            </li>
            <li class="services-filter-list__list-item">
                <a href="{{request()->fullUrlWithQuery(["status" => "2"])}}"
                   class="services-filter-list__link {{request()->get("status") == 2 ? "services--active" : ""}}">
                    Популярне
                    <span class="services-filter-list__quantity">({{$popular}})</span>
                </a>
            </li>
            <li class="services-filter-list__list-item">
                <a href="{{request()->fullUrlWithQuery(["status" => "3"])}}"
                   class="services-filter-list__link {{request()->get("status") == 3 ? "services--active" : ""}}">
                    Звичайне
                    <span class="services-filter-list__quantity">({{$old}})</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="filter__services-filter">
        <button type="button" class="services-filter__toggle">
            <span class="services-filter__toggle-title">
                                Доставка
            <span class="services-filter__quantity">2</span>
        <div class="arrow"></div>
        </span>
        </button>
        <ul class="services-filter__services-filter-list">
            <li class="services-filter-list__list-item">
                <a href="{{request()->fullUrlWithQuery(["delivery" => "true"])}}"
                   class="services-filter-list__link {{request()->get("delivery") === "true" ? "services--active" : ""}}">
                    Безкоштовна доставка
                    <span class="services-filter-list__quantity">({{$delivery}})</span>
                </a>
            </li>
            <li class="services-filter-list__list-item">
                <a href="{{request()->fullUrlWithQuery(["delivery" => "false"])}}"
                   class="services-filter-list__link {{request()->get("delivery") === "false" ? "services--active" : ""}}">
                    За власний рахунок
                    <span class="services-filter-list__quantity">({{$noDelivery}})</span>
                </a>
            </li>
        </ul>
    </div>
    <button class="filter__button">
        Назад
    </button>
</div>

@push('scripts')
    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('filterApplied', function (filter) {
                var currentUrl = new URL(window.location.href);
                currentUrl.searchParams.set('filter', filter);
                window.history.pushState({}, '', currentUrl);
            });
        });
    </script>
@endpush





