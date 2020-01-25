<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>I Testing</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet"> <!--knižnica text editor-->
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet"> <!--štýl text editor-->
    <link href="/css/dizajn.css" rel="stylesheet">
</head>
<body>
<header>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top navbar-farba">
        <a class="navbar-brand" href="{{ route('home') }}"><img src="/Images/Logo.png" width="200" height="50"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse show" id="navbarCollapse" style="">
            <div class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Učebné materiály
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('učivo') }}">Učivo</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('vytvorucivo') }}">Vytvoriť učebné materiály </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Testy
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('test') }}">Otestuj sa</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('test.create') }}">Vytvor test</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Známky
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Moje známky</a>
                    </div>
                </li>
            </div>
        </div>
        <a href="/login"><button type="submit">Prihlásiť</button></a>
        <form action="{{route('logout')}}" method="post">
            @csrf
            <button type="submit">Odhlásiť</button>
        </form>
        <a href="/register"><button type="submit">Registrácia</button></a>
    </nav>
</header>
<script type="text/javascript"> //Prekladač
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'sk', includedLanguages: 'cs,en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
    }

    function changeGoogleStyles() {
        if(($goog = $('.goog-te-menu-frame').contents().find('body')).length) {
            var stylesHtml = '<style>'+
                '.goog-te-menu2 {'+
                'max-width:100% !important;'+
                'overflow:scroll !important;'+
                'box-sizing:border-box !important;'+
                'height:auto !important;'+
                'color:black !important;'+
                '}'+
                '</style>';
            $goog.prepend(stylesHtml);
        } else {
            setTimeout(changeGoogleStyles, 50);
        }
    }
    changeGoogleStyles();
</script>


<main role="main">

    <div class="container marketing main h-100">
        @yield('content')
    </div>


    <!-- FOOTER -->
    <footer class="container">
        <p>&copy; 2019-2020 · I Testing by Matěj Černý · v1.0 <div class="" id="google_translate_element"></div></p>

    </footer>
</main>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
@stack('scripts')
</body>
</html>