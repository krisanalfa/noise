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
            <div class="box">
                <div class="wrapper">
                    <div class="headerArea">
                        <nav class="row">
                            <div class="span-6">
                                <h3><span class="count">5</span>Comments</h3>
                            </div>
                            <div class="span-6 right">
                                <h3>
                                    <a href="{{ URL::site('/login') }}">
                                        <i class="xn xn-sign-in"></i>Login
                                    </a>
                                </h3>
                            </div>
                        </nav>
                    </div>
                    <div class="commentUser">
                        <div class="avatarArea">
                            <div class="avatar" style="background: url({{ Theme::base('assets/img/default.png') }}) center no-repeat; background-size: cover;"></div>
                        </div>
                        <div class="commentBox">
                            <textarea name="" id="" cols="30" rows="10" placeholder="Leave a message"></textarea>
                            <div class="imageArea">
                                <a href="#"><i class="xn xn-image"></i></a>
                            </div>
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
                            <h3>
                                <a href="register.php">
                                    <i class="xn xn-edit"></i>Register
                                </a>
                            </h3>
                        </div>
                    </nav>
                    <div class="commentArea">
                        <ul></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var site = '{{ URL::base() }}';

        function renderReply(reply, hasReply)
        {
            hasReply = typeof hasReply !== undefined ? hasReply : false;

            dom = makeReplyDom(reply, hasReply);

            $('.commentArea ul').append(dom);
        }

        function makeReplyDom(reply, hasReply)
        {
            hasReply = typeof hasReply !== undefined ? hasReply : false;

            var user = reply.created_by,
                vote = reply.upvotes.length - reply.downvotes.length,
                dom = $('<li> \
                    <div class="post" id="'+reply.id+'"> \
                        <div class="avatarArea"> \
                            <a href="#"> \
                                <div class="avatar" style="background: url('+site+'assets/img/'+user.avatar+') center no-repeat; background-size: cover;"></div> \
                            </a> \
                        </div> \
                        <div class="content"> \
                            <ul class="meta"> \
                                <li> \
                                    <a class="username" href="">'+user.username+'</a> \
                                </li> \
                                <li> \
                                    <i class="sparator xn xn-circle"></i> \
                                </li> \
                                <li> \
                                    <span class="time">1 months ago</span> \
                                </li> \
                            </ul> \
                            <p> \
                                '+reply.content+' \
                            </p> \
                            <ul class="reply"> \
                                <li class="voteup"> \
                                    <a href="#"><i class="xn xn-thumbs-o-up"></i></a> \
                                </li> \
                                <li class="votedown"> \
                                    <a href="#"><i class="xn xn-thumbs-o-down"></i></a> \
                                </li> \
                                <li> \
                                    <i class="sparator xn xn-circle"></i> \
                                </li> \
                                <li> \
                                    <a href="#">Reply</a> \
                                </li> \
                            </ul> \
                        </div> \
                    </div> \
                </li>');

            var thisReplyHasReply = (reply.replies.length > 0) ? true : false;

            if (vote !== 0) {
                var voteDom = $('<span class="badgeVote"> \
                    <i>'+vote+'</i> \
                </span>');

                if (vote < 0) {
                    voteDom.addClass('negative');
                }

                $(dom.find('.avatarArea a')[0]).append(voteDom);
            }

            if (hasReply) {
                dom.html('<ul class="nested"><li>'+dom.html()+'</li></ul>');

                $.each(reply.replies, function(index, replyChild) {
                    var replyChildHasReply = (replyChild.replies.length > 0) ? true : false;

                    $(dom.find('ul.nested li')[0]).append(makeReplyDom(replyChild, replyChildHasReply));
                });
            } else {
                if (reply.reply_for_post_id) {
                    dom.html('<ul class="nested">'+dom.html()+'</ul>');
                }
            }

            return dom;
        }

        $.getJSON('http://localhost/noise/index.php/api/thread/54c84468c8577abc078b4567', function(data) {
            var replies = data.replies;

            $.each(replies, function(index, reply) {
                var hasReply = (reply.replies.length > 0) ? true : false;

                renderReply(reply, hasReply, true);
            });
        });
    </script>
</body>
</html>