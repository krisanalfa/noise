var userLogin = {},
    counter   = 0;

$('.noiseReplyBox').attr('thread-id', threadId);
$('.sort').hide();

function updateIframeHeight()
{
    var iframe = $(parent.top.$('iframe.noiseIframe')[0]);
    var body = document.body,
        html = document.documentElement;

    var height = Math.max( body.scrollHeight, body.offsetHeight,
                           html.clientHeight, html.scrollHeight, html.offsetHeight );

    if (iframe) {
        iframe.attr('style', 'width: 100% !important; border: none !important; overflow: hidden !important; height: '+height+'px !important;');
    }
}

function renderReply(reply, hasReply)
{
    hasReply = typeof hasReply !== undefined ? hasReply : false;

    $('.sort').show();
    $('.commentArea ul#commentList').append(makeReplyDom(reply, hasReply));

    updateIframeHeight();
}

function openWindow(url, windowTitle)
{
    var width = 760,
        height = 480,
        left = parseInt((screen.availWidth/2) - (width/2)),
        top = parseInt((screen.availHeight/2) - (height/2)),
        windowFeatures = "width=" + width + ",height=" + height + ",status,resizable,left=" + left + ",top=" + top + "screenX=" + left + ",screenY=" + top;

    myWindow = window.open(url, windowTitle, windowFeatures);
}

function makeReplyDom(reply, hasReply)
{
    counter++;

    hasReply = typeof hasReply !== undefined ? hasReply : false;

    var user = reply.created_by,
        vote = reply.upvotes.length - reply.downvotes.length,
        dom  = $('<li> \
            <div class="post" id="'+reply.id+'"> \
                <div class="avatarArea"> \
                    <a href="#"> \
                        <div class="avatar" style="background: url('+urlBase+'assets/img/'+user.avatar+') center no-repeat; background-size: cover;"></div> \
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
                        <li class="voteup forVote" vote-for="'+reply.id+'" vote-type="1"> \
                            <a href="#"><i class="xn xn-thumbs-o-up"></i></a> \
                        </li> \
                        <li class="votedown forVote" vote-for="'+reply.id+'" vote-type="2"> \
                            <a href="#"><i class="xn xn-thumbs-o-down"></i></a> \
                        </li> \
                        <li> \
                            <i class="sparator xn xn-circle"></i> \
                        </li> \
                        <li> \
                            <a href="#" class="replyButton">Reply</a> \
                        </li> \
                    </ul> \
                </div> \
                <div class="replyComment animated fadeIn"> \
                    <div class="avatarArea"> \
                        <div class="avatar" style="background: url('+urlBase+'assets/img/'+userLogin.avatar+') center no-repeat; background-size: cover;"></div> \
                    </div> \
                    <div class="commentBox"> \
                        <form class="replyForPost" post-id="'+reply.id+'"> \
                            <textarea name="" id="" cols="30" rows="10" placeholder="Reply a message"></textarea> \
                            <div class="postArea row"> \
                                <a href="#"><i class="xn xn-image"></i></a> \
                                <input type="submit" class="button solid pull-right" value="Post"> \
                            </div> \
                        </form> \
                    </div> \
                </div> \
            </div> \
        </li>');

    if (vote !== 0) {
        var voteDom = $('<span class="badgeVote animated bounceIn"> \
            <i>'+vote+'</i> \
        </span>');

        if (vote < 0) {
            voteDom.addClass('negative');
        }

        $(dom.find('.avatarArea a')[0]).append(voteDom);
    }

    $.each(reply.upvotes, function(index, upvote) {
        if(upvote.created_by.username === userLogin.username) {
            dom.find('.reply .voteup a').addClass('voted animated flash');
        }
    });

    $.each(reply.downvotes, function(index, downvote) {
        if(downvote.created_by.username === userLogin.username) {
            dom.find('.reply .votedown a').addClass('voted animated flash');
        }
    });

    if (hasReply) {
        var ulClass = (reply.reply_for_thread_id) ? '' : 'nested';

        dom.html('<ul class="'+ulClass+'"><li class="postPoint" reply-id="'+reply.id+'">'+dom.html()+'</li></ul>');

        $.each(reply.replies, function(index, replyChild) {
            var replyChildHasReply = (replyChild.replies.length > 0) ? true : false;

            $(dom.find('li[reply-id="'+reply.id+'"]')[0]).append(makeReplyDom(replyChild, replyChildHasReply));
        });
    } else {
        dom.html('<ul class="nested postPoint" reply-id="'+reply.id+'">'+dom.html()+'</ul>');
    }

    $('.headerArea .count').text(counter);

    return dom;
}

$(document).on('click', ".replyButton", function(event) {
    event.preventDefault();
    $(this).closest(".post").find(".replyComment").addClass("open");

    updateIframeHeight();
});

$(document).on('click', ".reply .voteup, .reply .votedown", function(event) {
    event.preventDefault();

    var element = $(this),
        data = {
            type: element.attr('vote-type'),
            post_id: element.closest('.post').attr('id'),
            created_by: userId
        };

    $.ajax({
        type: 'POST',
        url: urlSite+'api/vote',
        data: data,
        dataType: 'json',
    })
    .success(function(data) {
        if (data.error) {
            alert(data.message);

            return;
        }

        if (data.neutral) {
            element.closest('.reply').find(".forVote a").removeClass('voted');
        } else {
            element.find("a").addClass("voted animated flash");
        }

        var badgeVote = $('#'+element.closest('.post').attr('id')).find('.badgeVote'),
            x = data.upvotes.length - data.downvotes.length;

        if (typeof badgeVote[0] == 'undefined') {
            var voteDom = $('<span class="badgeVote animated bounceIn"> \
                <i>'+x+'</i> \
            </span>');

            if (x < 0) {
                voteDom.addClass('negative');
            }

            $($('#'+element.closest('.post').attr('id')).find('.avatarArea a')[0]).append(voteDom);
        } else {
            if (x === 0) {
                $(badgeVote[0]).remove();
            } else {
                $(badgeVote[0]).find('i').text(x);
            }

            if (x < 0) {
                $(badgeVote[0]).addClass('negative');
            }
        }
    })
    .fail(function(err) {
        alert('Error while posting');
        console.log(err);
    });
});

$(document).on('submit', '.replyForPost', function(event) {
    event.preventDefault();
    event.stopImmediatePropagation();

    var form      = $(this),
        textarea  = $(form.find('textarea')[0])
        post      = {
            'post_id': form.attr('post-id'),
            'created_by': userId,
            'content': textarea.val(),
        };

    textarea.val('');

    form.closest('.replyComment').removeClass('open');

    $.ajax({
        type: 'POST',
        url: urlSite+'api/reply',
        data: post,
        dataType: 'json',
    })
    .success(function(data) {
        form.closest('.postPoint').append(makeReplyDom(data, false));

        updateIframeHeight();
    })
    .fail(function(err) {
        alert('Error while posting');
        console.log(err);
    });
});

$('.noiseForm').submit(function(event) {
    event.preventDefault();
    event.stopImmediatePropagation();

    var form      = $(this),
        textarea  = $(form.find('textarea')[0])
        post      = {
            'thread_id': threadId,
            'created_by': userId,
            'content': textarea.val(),
        };

    textarea.val('');

    $.ajax({
        type: 'POST',
        url: urlSite+'api/reply',
        data: post,
        dataType: 'json',
    })
    .success(function(data) {
        renderReply(data, false);
    })
    .fail(function(err) {
        console.log(err);
    });
});

$.getJSON(urlSite+'api/user/'+userId, function(data) {
    userLogin = data;

    $.getJSON(urlSite+'api/thread/'+threadId, function(data) {
        var replies = data.replies;

        $.each(replies, function(index, reply) {
            var hasReply = (reply.replies.length > 0) ? true : false;

            renderReply(reply, hasReply);
        });
    });
});
