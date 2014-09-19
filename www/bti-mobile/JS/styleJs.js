$(document).ready(function(){
	var topHeight = $("#lcl_quote_id").height();
	$("#fcl_quote_id").css("height",topHeight+"px");
	$("#fcl_email_id").css("height",topHeight+"px");
	$("#lcl_email_id").css("height",topHeight+"px");
	$("#quote_result_id").css("height",topHeight+"px");

	var windowsWidth = $(window).width();
	$("#loading_message_id").css("width",windowsWidth+"px");


	function showFclQuote() {
		$("#fcl_quote_id").show();
		$("#lcl_quote_id").hide();
		$("#fcl_email_id").hide();
		$("#lcl_email_id").hide();
		$("#quote_result_id").hide();
	}

	function showLclQuote() {
		$("#lcl_quote_id").show();
		$("#fcl_quote_id").hide();
		$("#fcl_email_id").hide();
		$("#lcl_email_id").hide();
		$("#quote_result_id").hide();
	}
	
});

	function showFclQuote() {
		$("#fcl_quote_id").show();
		$("#lcl_quote_id").hide();
		$("#fcl_email_id").hide();
		$("#lcl_email_id").hide();
		$("#quote_result_id").hide();
	}

	function showLclQuote() {
		$("#lcl_quote_id").show();
		$("#fcl_quote_id").hide();
		$("#fcl_email_id").hide();
		$("#lcl_email_id").hide();
		$("#quote_result_id").hide();
	}
	
	function goToNewQuote() {
		window.location.href = './index.html';
	}
	
	function goToTermAndComments() {
		window.location.href = './termAndComments.html';	
	}