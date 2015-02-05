<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NOISE</title>
    <meta http-equiv="X-UA-Compatible" content="chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Dev CSS -->
    <link rel="stylesheet" type="text/css" href="{{ Theme::base('assets/css/naked/css/naked.min.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ Theme::base('assets/css/animate.css/animate.min.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ Theme::base('assets/css/font-awesome/css/font-awesome.min.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ Theme::base('assets/css/jacket-awesome/jacket-awesome.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ Theme::base('assets/css/lato/css/lato.min.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ Theme::base('assets/css/tshirt-popup/tshirt-popup.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ Theme::base('assets/css/main.css') }}" media="screen" />

    <!-- Dev JS -->
    <script type="text/javascript" src="{{ Theme::base('assets/js/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ Theme::base('assets/css/tshirt-popup/tshirt-popup.js') }}"></script>
    <script type="text/javascript" src="{{ Theme::base('assets/js/jQuery.fileinput.js') }}"></script>
    <script type="text/javascript" src="{{ Theme::base('assets/js/select.js') }}"></script>
    <script type="text/javascript" src="{{ Theme::base('assets/js/main.js') }}"></script>
</head>
<body>
    <main class="home">
        <div class="container-fluid">
            <div class="landingPage">
                <div class="logo">
                    <div class="icon" style="background: url({{ Theme::base('assets/img/logo.png') }}) center no-repeat; background-size: cover;"></div>
                </div>
                <div class="desc">
                    <h2><strong>NOISE</strong>, The Discussion Machine you've been waiting for.</h2>
                </div>
                <blockquote>
                    <p><i>
                        "To say that nothing is true, is to realize that the foundations of society are fragile, and that we must be the shepherds of our own civilization."
                    </i></p>
                    <footer><cite title="Ezio Auditore da Firenze">Ezio Auditore</cite></footer>
                </blockquote>
                <div class="buttonArea">
                    <a class="button solid" href="{{ URL::site('/example') }}">Example <i class="xn xn-comments"></i></a>
                </div>
            </div>
        </div>
        <div class="background"></div>
    </main>
</body>
</html>
