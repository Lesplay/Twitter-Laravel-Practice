$(document).ready(function(){
	console.log("test");

	var commentHide = $(".commentText").hide();
	var commentBtn = $(".addComment");

	commentBtn.on('click', function (e) {
        e.preventDefault();
        $(this).siblings(".commentText").toggle("slow");
    });
});