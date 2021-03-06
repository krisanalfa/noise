<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NOISE</title>
    <meta http-equiv="X-UA-Compatible" content="chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Required CSS -->
    <link rel="stylesheet" type="text/css" href="{{ Theme::base('assets/css/naked/css/naked.min.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ Theme::base('assets/css/animate.css/animate.min.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ Theme::base('assets/css/font-awesome/css/font-awesome.min.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ Theme::base('assets/css/jacket-awesome/jacket-awesome.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ Theme::base('assets/css/lato/css/lato.min.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ Theme::base('assets/css/tshirt-popup/tshirt-popup.css') }}" media="screen" />

    <!-- Dev CSS -->
    <link rel="stylesheet" type="text/css" href="{{ Theme::base('assets/css/main.css') }}" media="screen" />
</head>
<body>
    <div id="body">
        <div class="container-fluid">
            <div class="box noiseReplyBox">
                <div class="wrapper">
                    <div class="headerArea">
                        <nav class="row">
                            <div class="span-6">
                                <h3><span class="count"></span>Comments</h3>
                            </div>
                            <div class="span-6 right">
                                <!-- <h3>
                                    <a href="javascript: openWindow('{{ URL::site('/login') }}', 'Login')">
                                        <i class="xn xn-sign-in"></i>Login
                                    </a>
                                </h3> -->
                            </div>
                        </nav>
                    </div>
                    <div class="commentUser">
                        <div class="avatarArea">
                            <div class="avatar" style="background: url({{ Theme::base('assets/img/alfa.jpg') }}) center no-repeat; background-size: cover;"></div>
                        </div>
                        <div class="commentBox">
                            <form action="" class="noiseForm">
                                <textarea name="" id="" cols="30" rows="10" placeholder="Leave a message"></textarea>
                                <div class="postArea row">
                                    <a href="#"><i class="xn xn-image"></i></a>
                                    <input type="submit" class="button solid pull-right" value="Post">
                                </div>
                            </form>
                        </div>
                    </div>
                    <nav class="sortReg row">
                        <div class="span-6">
                            <h3>
                                <p class="sort">
                                    Sort by
                                    <select class="turnintodropdown">
                                        <option data-sort="best">Best</option>
                                        <option data-sort="newest">Newest</option>
                                        <option data-sort="oldest">Oldest</option>
                                    </select>
                                    <i class="xn xn-caret-down"></i>
                                </p>
                            </h3>
                        </div>
                        <div class="span-6 right">
                            <!-- <h3>
                                <a href="javascript: openWindow('{{ URL::site('/register') }}', 'Register')">
                                    <i class="xn xn-edit"></i>Register
                                </a>
                            </h3> -->
                        </div>
                    </nav>
                    <div class="commentArea">
                        <ul id="commentList"></ul>
                    </div>
                    <div class="footer">
                        <ul class="row">
                            <li class="copyright xlarge-9 large-9 medium-9 small-9 tiny-12">
                                <p>Copyright © 2015 Xinix Technolgy.</p>
                            </li>
                            <li class="watermark xlarge-3 large-3 medium-3 small-3 tiny-12">
                                <p>NOISE</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var urlBase   = '{{ URL::base() }}',
            urlSite   = '{{ URL::site() }}',
            threadId  = '54c84468c8577abc078b4567';
    </script>

    <!-- Required JS -->
    <script type="text/javascript" src="{{ Theme::base('assets/js/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ Theme::base('assets/css/tshirt-popup/tshirt-popup.min.js') }}"></script>
    <script type="text/javascript" src="{{ Theme::base('assets/js/jQuery.fileinput.min.js') }}"></script>
    <script type="text/javascript" src="{{ Theme::base('assets/js/select.min.js') }}"></script>

    <!-- Dev JS -->
    <script type="text/javascript" src="{{ Theme::base('assets/js/noise.js') }}"></script>
    <script type="text/javascript" src="{{ Theme::base('assets/js/main.js') }}"></script>
</body>
</html>
