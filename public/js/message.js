$(document).ready(function(){
	console.log("test");

	var replyHide = $(".replyArea").hide();
	var replyBtn = $(".replyBtn");

	replyBtn.on('click', function (e) {
        e.preventDefault();
        $(this).siblings(".replyArea").toggle("slow");
    });
});