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
	})

	$(document).on('click', ".reply .voteup, .reply .votedown", function(event) {
		event.preventDefault();
		$(this).find("a").addClass("voted animated flash");
	})

});
