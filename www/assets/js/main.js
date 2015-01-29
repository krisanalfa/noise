$(function () {
    $(".profile-picture a").popup({
        className: "uploadPopup"
    });

    $(".browse .button-area a:first-child, .detail .button-area div:first-child a").popup({
        className: "detailPopup",
        closeButton: false,
        width: 700
    });

    $(document).on('click', ".replyButton", function(event) {
        event.preventDefault();
        $(this).closest(".post").find(".replyComment").addClass("open");
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
            form.closest('.replyComment').removeClass('open');
            form.closest('.postPoint').append(makeReplyDom(data, false));
            // renderReplyForPost(data, form.closest('.postPoint').attr('reply-id'));
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

    // $('.loginButton').click(function(event) {
    //     event.preventDefault();
    //     event.stopImmediatePropagation();

    //     var strWindowFeatures = "menubar=yes,location=yes,resizable=yes,scrollbars=yes,status=yes";

    //     window.open("http://xinix.co.id", "mywindow", strWindowFeatures);
    // });
});
