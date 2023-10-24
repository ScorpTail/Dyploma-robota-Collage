@extends("user.user-cabinet.index")
@vite(["resources/sass/cabinet-favorite.scss", "resources/js/cabinet-favorite.js"])
@section("user-cabinet-content")
    <livewire:user.user-cabinet.delete-component/>
@endsection