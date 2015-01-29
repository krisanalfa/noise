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
    <script type="text/javascript" src="{{ Theme::base('assets/js/select.js') }}"></script>
    <script type="text/javascript" src="{{ Theme::base('assets/js/main.js') }}"></script>
</head>
<body>
    <div id="body">
        <div class="container-fluid">
            <div id="login">
                <div class="logo">
                    <img src="{{ Theme::base('assets/img/logo.png') }}" alt="NOISE - Nothing Is True">
                </div>
                <div class="input error">
                    <span class="alertError">Invalid Username</span>
                    <input type="text" name="username" value="" placeholder="Username / Email">
                </div>
                <div class="input">
                    <input type="password" name="password" placeholder="Password">
                </div>
                <div class="submit">
                    <label class="placeholder"><input type="checkbox" class="checkbox"> Keep me sign in</label>
                    <input type="submit" value="Login" class="button solid">
                </div>
            </div>
        </div>
    </div>
</body>
</html>
