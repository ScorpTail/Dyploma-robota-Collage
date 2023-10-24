@if($alert = session()->pull("admin-alert"))
    @vite(["resources/sass/app.scss"])
    <div class="alert alert-danger p-3 mb-0 rounded-0 text-center">
        {{$alert}}
    </div>
@endif