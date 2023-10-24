@extends("user.user-cabinet.index")
@vite([ "resources/sass/cabinet-favorite.scss", "resources/sass/favorite-star.scss", "resources/sass/services.scss"])
@section("user-cabinet-content")
    <livewire:user.user-cabinet.viewed.delete-component/>
@endsection