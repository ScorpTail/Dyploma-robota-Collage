<!DOCTYPE html>
<html lang="uk">
@include("user.layouts.head.head")
@include("user.layouts.includes.alert")
<body>
@include("user.layouts.header.header")
<div class="wrapper">
    @yield("content")
</div>
@include("user.layouts.footer.footer")
@livewireStyles
@livewireScripts
</body>
</html>
