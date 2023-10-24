<div>
    @vite(["resources/sass/app.scss", "resources/sass/search.scss"])
    <div wire:ignore.self class="modal fade" id="search" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header rounded-2">
                    <form wire:submit.prevent="handleSearch" class="w-100 me-3 d-flex align-items-center">
                        <input wire:model.debounce.300ms="search" type="search"
                               class="form-control position-relative"
                               placeholder="Пошук..."
                               aria-label="Search">
                        <button wire:keydown.enter="handleSearch" type="submit"
                                class="position-absolute" style="right: 100px;">
                            <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 2.75a7.25 7.25 0 015.63 11.82l4.9 4.9a.75.75 0 01-.98 1.13l-.08-.07-4.9-4.9A7.25 7.25 0 1110 2.75zm0 1.5a5.75 5.75 0 100 11.5 5.75 5.75 0 000-11.5z"
                                ></path>
                            </svg>
                        </button>
                    </form>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                @if(!empty($hints))
                    <span class="m-3 mt-0 mb-0 text-gray opacity-50" style="font-size: 12px">
                        Всього результатів: {{count($hints)}}
                    </span>
                    @if(count($hints) == 0)
                        <span class="m-3 mt-0 mb-0 text-gray opacity-50" style="font-size: 12px">
                        За результатами пошуку, співпадінь не виявлено.
                    </span>
                    @endif
                @endif
                @if(!empty($hints))
                    <div class="modal-body">
                        <div class="suggestions d-flex flex-column">
                            @foreach($hints as $hint)
                                <div class="d-flex flex-row w-100">
                                    <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 2.75a7.25 7.25 0 015.63 11.82l4.9 4.9a.75.75 0 01-.98 1.13l-.08-.07-4.9-4.9A7.25 7.25 0 1110 2.75zm0 1.5a5.75 5.75 0 100 11.5 5.75 5.75 0 000-11.5z"
                                              fill="#8080804D"></path>
                                    </svg>
                                    <a class="d-flex flex-column w-100"
                                       href="{{route("user.services.services-item.show", $hint)}}">
                                        {{$hint->title}}
                                        <span class="text-gray opacity-75"
                                              style="font-size: 10px">Автор: {{$hint->user->name}}</span>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>