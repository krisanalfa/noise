$(function () {

$(".profile .buttonArea input[type=submit]").click(function(event) {
	event.preventDefault();
	$(this).closest(".profile form").find(".row.error").addClass("animated shake");
})

$('#file').customFileInput();

});
