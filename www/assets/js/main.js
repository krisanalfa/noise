$(function () {
	
	$(".profile-picture a").popup({
		className: "uploadPopup"
	});

	$(".browse .button-area a:first-child, .detail .button-area div:first-child a").popup({
		className: "detailPopup",
		closeButton: false,
		width: 700
	});

});
