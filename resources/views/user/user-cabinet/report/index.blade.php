@extends("user.user-cabinet.index")
@vite(["resources/sass/cabinet-message.scss"])
@section("user-cabinet-content")
    <livewire:user.user-cabinet.filter.report-filter/>
@endsection