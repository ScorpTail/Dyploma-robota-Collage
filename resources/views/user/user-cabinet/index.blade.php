@extends("user.layouts.index")
@section("title", "")
@vite(["resources/sass/cabinet.scss"])
@section("content")
    <main class="main">
        <div class="main__container">
            <div class="main__user-cabinet">
                <div class="user-cabinet__sidebar-navigation">
                    @if(isset(auth()->user()->typeUser->id) && auth()->user()->typeUser->id == 1)
                        @include("user.user-cabinet.sidebar.sidebar-user")
                    @else
                        @include("user.user-cabinet.sidebar.sidebar-solder")
                    @endif
                </div>
                @yield("user-cabinet-content")
            </div>
        </div>
    </main>
@endsection
