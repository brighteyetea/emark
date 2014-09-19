$(document).ready(function(){
    //clear suburb
	$("#lcl_import_or_export_select_id").change(function(){
        $("#lcl_suburb_select_id").empty();
        $("#lcl_suburb_select_id").append(new Option("Delivery Or Pick Up", "0"));
        $("#lcl_suburb_select_id [value = 0]").prop("disabled", true);
        $("#lcl_suburb_select_id [value = 0]").attr("selected", true); 
        
		if($("#lcl_import_or_export_select_id").children('option:selected').val() === "export") {
			$("#lcl_clearance_select_id").attr('disabled', 'disabled');
			$("#lcl_clearance_select_id").get(0).selectedIndex=0;
			$("#lcl_suburb_select_id").get(0).selectedIndex=0;	
			$("#lcl_input_l_id").val("");
			$("#lcl_input_w_id").val("");
			$("#lcl_input_h_id").val("");
			$("#lcl_input_weight_id").val("");
		} else {
			$("#lcl_clearance_select_id").attr('disabled', false);
			$("#lcl_suburb_select_id").get(0).selectedIndex=0;	
			$("#lcl_input_l_id").val("");
			$("#lcl_input_w_id").val("");
			$("#lcl_input_h_id").val("");
			$("#lcl_input_weight_id").val("");
		}
		
        var request = $.ajax({
            type: "POST",
            url: "loadPorts.php",
            dataType: "json",
            data: {transferType: $(this).children('option:selected').val()},
            ansync: false,
            cache: false
        });
        
        request.done(function(jsonData){
            //init ports select
            $("#lcl_load_port_select_id").empty();
            $("#lcl_discharge_port_select_id").empty();
            $("#lcl_load_port_select_id").append(new Option("Select an origin port", "0"));
            $("#lcl_load_port_select_id [value = 0]").prop("disabled", true);
            $("#lcl_load_port_select_id [value = 0]").attr("selected", true);
            $("#lcl_discharge_port_select_id").append(new Option("Select a destination port", "0"));
            $("#lcl_discharge_port_select_id [value = 0]").prop("disabled", true);
            $("#lcl_discharge_port_select_id [value = 0]").attr("selected", true);
            
            for(var portID in jsonData[0]) {
                $("#lcl_load_port_select_id").append(new Option(jsonData[0][portID], portID));
            }
            
            for(var portID in jsonData[1]) {
                $("#lcl_discharge_port_select_id").append(new Option(jsonData[1][portID], portID));
            }
        });
    });

	$("#lcl_discharge_port_select_id").change(function(){//load suburb
		if($("#lcl_import_or_export_select_id").children('option:selected').val() === "import") {
			loadSuburb($(this).children('option:selected').val());
		}
	});
	
	$("#lcl_load_port_select_id").change(function(){//load suburb
		if($("#lcl_import_or_export_select_id").children('option:selected').val() === "export") {
			loadSuburb($(this).children('option:selected').val());
		}
	});

	function loadSuburb($port_id) {
		var request = $.ajax({
			type: "POST",
			url: "loadSuburb.php",
			dataType: "json",
			data: {portID: $port_id},
			ansync: false,
			cache: false
		});
		request.done(function(jsonData){
			$("#lcl_suburb_select_id").empty();
			$("#lcl_suburb_select_id").append(new Option("Delivery Or Pick Up", "0"));
			$("#lcl_suburb_select_id [value = 0]").prop("disabled", true);
			$("#lcl_suburb_select_id [value = 0]").attr("selected", true);
			
			for(var suburbID in jsonData){
				$("#lcl_suburb_select_id").append(new Option(jsonData[suburbID], suburbID));    
			}
		});
	}
	
	//lcl quote button to call email div 
	$("#lcl_quote_button_id").click(function(){
		$("#lcl_quote_id").hide();
		$("#lcl_email_id").show();
	});


	$("#e_mail_cancel_button_lcl").click(function(){
		$("#lcl_email_id").hide();
		$("#lcl_quote_id").show();
	});

	$("#e_mail_confirm_button_lcl").click(function(){
	//	$("#fcl_email_id").hide();
		$("#waiting_id").show();
 
		$("#loading_message_id").css({visibility:"visible"});
		$("#waiting_id").css({visibility:"visible"});
		$("body").css({overflow:"hidden"});
		
		var request = $.ajax({
			type: "POST",
			url: "process_lcl.php",
			dataType: "json",
			data:{ transferType: $("#lcl_import_or_export_select_id").children('option:selected').val(),
					clearance: $("#lcl_clearance_select_id").children('option:selected').val(),
					loadPort: $("#lcl_load_port_select_id").children('option:selected').val(),
					dischargePort: $("#lcl_discharge_port_select_id").children('option:selected').val(),
					cube: $("#lcl_input_l_id").val() * $("#lcl_input_w_id").val() * $("#lcl_input_h_id").val(),
					weight: $("#lcl_input_weight_id").val(),
					suburb: $("#lcl_suburb_select_id").children('option:selected').val(),
					email: $("#e_mail_id_lcl").val()},
			ansync: false,
			cache: false
		});

		request.done(function(jsonData){
			$("#quote_result_id").empty();
			$("#quote_result_id").append(jsonData.transferType.toUpperCase() + "<br />");
			$("#quote_result_id").append("Reference Number: " + jsonData.Ref.toUpperCase() + "<br />");
			$("#quote_result_id").append("E-mail: " + jsonData.email + "<br />");
			$("#quote_result_id").append("From: " + jsonData.From + "<br />");
			$("#quote_result_id").append("To: " + jsonData.To + " <br/>");
			$("#quote_result_id").append("Cube: " + jsonData.Cube + "<br />");
			$("#quote_result_id").append("Freight Charge(Inclusive BAF): $" + jsonData.FreightCharge + " USD<br />");
			if($("#lcl_import_or_export_select_id").children('option:selected').val() === "import") {
				$("#quote_result_id").append("Local Charge(Wharfage Fee): $" + jsonData.LocalCharge + " AUD<br />");
			} else {
				$("#quote_result_id").append("Local Charge(Handing, Document and Clearance Fee): $" + jsonData.LocalCharge + " AUD<br />");
			}                    
			if(jsonData.ClearanceCharge !== 0) {
				$("#quote_result_id").append("Clearance Charge: $" + jsonData.ClearanceCharge + " AUD<br />");
			}
			if(jsonData.Cartage !== 0) {
				$("#quote_result_id").append("Cartage Charge: $" + jsonData.Cartage + " AUD<br />");
			}
			$("#quote_result_id").append("<br/><br/><input id=\"get_new_quote_button_id\" onclick=\"javascript:goToNewQuote()\" type=\"button\" value=\"Get new Quote\" class=\"input_get_quote\"/>"+
				"&nbsp;&nbsp;<input id=\"term_and_comments_button_id\" onclick=\"javascript:goToTermAndComments()\" type=\"button\" value=\"Term&Comments\" class=\"input_get_quote\"/>");
			
			$("#loading_message_id").css({visibility:"hidden"});
			$("#waiting_id").css({visibility:"hidden"});	
			$("#waiting_id").hide();	
			$("#lcl_email_id").hide();
			$("#quote_result_id").show();				
			$("body").css({overflow:"visible"});
			
		});
	});
});