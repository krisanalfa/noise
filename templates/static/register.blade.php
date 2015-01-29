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
    <script type="text/javascript" src="{{ Theme::base('assets/js/register.js') }}"></script>
</head>
<body>
    <div id="body">
        <div class="container-fluid">
            <div class="box">
                <div class="wrapper">
                    <div class="profile">
                        <fieldset>
                            <legend>Register</legend>
                            <form action="" method="post" class="row">
                                <div class="row">
                                    <div class="block xlarge-6 large-6 medium-6 small-6 tiny-12">
                                        <div class="row profilePicture">
                                            <label for="file">Choose Avatar</label>
                                            <div class="avatarArea">
                                                <div class="avatar" style="background: url({{ Theme::base('assets/img/default.png') }}) center no-repeat; background-size: cover;"></div>
                                            </div>
                                            <div class="uploadImage">
                                                <input type="file" name="file" id="file" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block xlarge-6 large-6 medium-6 small-6 tiny-12">
                                        <div class="row">
                                            <label for="name">Username</label>
                                            <input type="text" name="name" placeholder="Input Username" value="" />
                                        </div>
                                        <div class="row">
                                            <label for="email">Email</label>
                                            <input type="text" name="email" placeholder="Input email" value="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="block xlarge-6 large-6 medium-6 small-6 tiny-12">
                                        <div class="row">
                                            <label for="name">First Name</label>
                                            <input type="text" name="name" placeholder="Input Name" value="" />
                                        </div>
                                    </div>
                                    <div class="block xlarge-6 large-6 medium-6 small-6 tiny-12">
                                        <div class="row">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" placeholder="Input Password" value="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="block xlarge-6 large-6 medium-6 small-6 tiny-12">
                                        <div class="row">
                                            <label for="name">Last Name</label>
                                            <input type="text" name="name2" placeholder="Input Name" value="" />
                                        </div>
                                    </div>
                                    <div class="block xlarge-6 large-6 medium-6 small-6 tiny-12">
                                        <div class="row">
                                            <label for="password">Retype Password</label>
                                            <input type="password" name="password2" placeholder="Retype Password" value="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row buttonArea">
                                    <div class="block pull-right">
                                        <input type="submit" name="submit" value="Save" class="button solid" />
                                    </div>
                                </div>
                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
