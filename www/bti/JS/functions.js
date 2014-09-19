$("#head_left").click(function(){
	if($("#table_fcl").is(":visual")){

	} else {
		$("#table_lcl").hide();
		$("#table_fcl").show();
	}
});

$("#head_right").click(function(){
	if($("#table_lcl").is(":visual")){

	} else {
		$("#table_fcl").hide();
		$("#table_lcl").show();
	}
});

$("#head_left").hover(function(){
	$(this).css("background-color","#ddd");
});