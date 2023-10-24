<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:regular,500,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,regular,500,600,700,800" rel="stylesheet">
    <link href="https://code.jquery.com/jquery-3.6.0.min.js">
    <link rel="shortcut icon" href="{{asset("storage/image/image 8.svg")}}">
    @vite([
    "resources/sass/style.scss",
    "resources/sass/reset.scss",
    "resources/sass/burger.scss",
    "resources/sass/header.scss",
    "resources/sass/footer.scss",
    "resources/sass/input.scss",
    "resources/sass/information.scss",
    "resources/sass/swiper.scss",
    "resources/sass/errors.scss",
    "resources/js/app.js",
    "resources/js/burger-menu.js",
    "resources/js/underline.js",
    ])

    <title>@yield("title")</title>
</head>