@vite(["resources/sass/pagination-user.scss"])
<div>
    @if($paginator->hasPages() && $paginator->lastPage() >= $paginator->currentPage())
        <div class="pagination">
            @if(!$paginator->onFirstPage())
                <button wire:click="previousPage" class="btn-nav left-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor"
                         class="left-icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/>
                    </svg>
                </button>
            @endif
            <div class="page-numbers">
                @php
                    $currentPage = $paginator->currentPage();
                    $lastPage = $paginator->lastPage();
                @endphp
                @if ($lastPage <= 5)
                    @foreach (range(1, $lastPage) as $pageNumber)
                        <button wire:click="gotoPage({{$pageNumber}})"
                                class="btn-page {{ $pageNumber === $currentPage ? 'btn-selected' : '' }}">{{ $pageNumber }}</button>
                    @endforeach
                @else
                    @if ($currentPage <= 4)
                        @foreach (range(1, 4) as $pageNumber)
                            <button wire:click="gotoPage({{$pageNumber}})"
                                    class="btn-page {{ $pageNumber === $currentPage ? 'btn-selected' : '' }}">{{ $pageNumber }}</button>
                        @endforeach
                        <button wire:click="gotoPage({{$currentPage}})" class="btn-page">{{ $lastPage }}</button>
                    @elseif ($currentPage >= $lastPage - 3)
                        <button wire:click="gotoPage({{1}})" class="btn-page">1</button>
                        @foreach (range($lastPage - 4, $lastPage) as $pageNumber)
                            <button wire:click="gotoPage({{$pageNumber}})"
                                    class="btn-page {{ $pageNumber === $currentPage ? 'btn-selected' : '' }}">{{ $pageNumber }}</button>
                        @endforeach
                    @else
                        <button wire:click="gotoPage({{1}})" class="btn-page">1</button>
                        @foreach (range($currentPage - 1, $currentPage + 1) as $pageNumber)
                            <button wire:click="gotoPage({{$pageNumber}})"
                                    class="btn-page {{ $pageNumber === $currentPage ? 'btn-selected' : '' }}">{{ $pageNumber }}</button>
                        @endforeach
                        <button wire:click="gotoPage({{$lastPage}})" class="btn-page">{{ $lastPage }}</button>
                    @endif
                @endif
            </div>
            @if(!$paginator->onLastPage())
                <button wire:click="nextPage" class="btn-nav right-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor"
                         class="right-icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                    </svg>
                </button>
            @endif
        </div>
    @else
        @if($paginator->lastPage() < $paginator->currentPage())
            @php
                return redirect()->route("user.user-cabinet.favorite.index");
            @endphp
        @endif
    @endif
</div>