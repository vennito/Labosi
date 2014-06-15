$(document).ready(function() {
	$(".test").click(function(){
		if($(this).next().css('display') == 'none')
			$(this).next().css({"visibility": "visible", "display": "inline"});
		else
			$(this).next().css({"visibility": "hidden", "display": "none"});
	});
	$("#close").click(function(){
		$("#reklama").css({"z-index": "-100", "display": "none", "visibility": "hidden"});
	});
});