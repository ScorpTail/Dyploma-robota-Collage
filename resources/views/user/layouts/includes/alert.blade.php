@if($alert = session()->pull("alert"))
    @vite(["resources/sass/app.scss"])
    <div class="alert alert-success p-3 mb-0 rounded-0 text-center">
        {{$alert}}
    </div>
@endif


