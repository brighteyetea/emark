$(document).ready(function(){
	$("#fcl_import_or_export_select_id").change(function(){
        //clear suburb
        $("#fcl_suburb_select_id").empty();
        $("#fcl_suburb_select_id").append(new Option("Delivery Or Pick Up", "0"));
        $("#fcl_suburb_select_id [value = 0]").prop("disabled", true);
        $("#fcl_suburb_select_id [value = 0]").attr("selected", true); 
                
		//export disable clearence
		if($("#fcl_import_or_export_select_id").children('option:selected').val() === "export") {
			$("#fcl_clearance_select_id").attr('disabled', 'disabled');
			$("#fcl_clearance_select_id").get(0).selectedIndex=0;
			$("#fcl_container_type_id").get(0).selectedIndex=0;
			$("#fcl_suburb_select_id").get(0).selectedIndex=0;						
		} else {
			$("#fcl_clearance_select_id").attr('disabled', false);
			$("#fcl_container_type_id").get(0).selectedIndex=0;
			$("#fcl_suburb_select_id").get(0).selectedIndex=0;	
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
			$("#fcl_load_port_select_id").empty();
			$("#fcl_discharge_port_select_id").empty();
			$("#fcl_load_port_select_id").append(new Option("Select an origin port", "0"));
			$("#fcl_load_port_select_id [value = 0]").prop("disabled", true);
			$("#fcl_load_port_select_id [value = 0]").attr("selected", true);
			$("#fcl_discharge_port_select_id").append(new Option("Select a destination port", "0"));
			$("#fcl_discharge_port_select_id [value = 0]").prop("disabled", true);
			$("#fcl_discharge_port_select_id [value = 0]").attr("selected", true);
						
			for(var portID in jsonData[0]) {
				$("#fcl_load_port_select_id").append(new Option(jsonData[0][portID], portID));
			}
						
			for(var portID in jsonData[1]) {
				$("#fcl_discharge_port_select_id").append(new Option(jsonData[1][portID], portID));
				}
        });
    });

	$("#fcl_discharge_port_select_id").change(function(){//load suburb
		if($("#fcl_import_or_export_select_id").children('option:selected').val() === "import") {
			loadSuburbFcl($(this).children('option:selected').val());
		}
	});
	
	$("#fcl_load_port_select_id").change(function(){//load suburb
		if($("#fcl_import_or_export_select_id").children('option:selected').val() === "export") {
			loadSuburbFcl($(this).children('option:selected').val());
		}
	});

	function loadSuburbFcl($port_id) {
		var request = $.ajax({
			type: "POST",
			url: "loadSuburb.php",
			dataType: "json",
			data: {portID: $port_id},
			ansync: false,
			cache: false
		});
		request.done(function(jsonData){
			$("#fcl_suburb_select_id").empty();
			$("#fcl_suburb_select_id").append(new Option("Delivery Or Pick Up", "0"));
			$("#fcl_suburb_select_id [value = 0]").prop("disabled", true);
			$("#fcl_suburb_select_id [value = 0]").attr("selected", true);
			
			for(var suburbID in jsonData){
				$("#fcl_suburb_select_id").append(new Option(jsonData[suburbID], suburbID));    
			}
		});
	}
	
	//fcl quote button to call email div 
	$("#fcl_quote_button_id").click(function(){
		$("#fcl_quote_id").hide();
		$("#fcl_email_id").show();
	});

	$("#e_mail_cancel_button_fcl").click(function(){
		$("#fcl_email_id").hide();
		$("#fcl_quote_id").show();
	});

	$("#e_mail_confirm_button_fcl").click(function(){
	//	$("#fcl_email_id").hide();
		$("#waiting_id").show();
 
		$("#loading_message_id").css({visibility:"visible"});
		$("#waiting_id").css({visibility:"visible"});
		$("body").css({overflow:"hidden"});
		
		var request = $.ajax({
			type: "POST",
			url: "process_fcl.php",
			dataType: "json",
			data:{ transferType: $("#fcl_import_or_export_select_id").children('option:selected').val(),
					loadPort: $("#fcl_load_port_select_id").children('option:selected').val(),
					dischargePort: $("#fcl_discharge_port_select_id").children('option:selected').val(),
					containerType: $("#fcl_container_type_id").children('option:selected').val(),
					suburb: $("#fcl_suburb_select_id").children('option:selected').val(),
					clearance: $("#fcl_clearance_select_id").children('option:selected').val(),
					email: $("#e_mail_id_fcl").val()},
			ansync: false,
			cache: false
		});

		request.done(function(jsonData){
			$("#quote_result_id").empty();
			$("#quote_result_id").append(jsonData.TransferType.toUpperCase() + "<br />");
			$("#quote_result_id").append("Reference Number: " + jsonData.Ref.toUpperCase() + "<br />");
			$("#quote_result_id").append("E-mail: " + jsonData.Email + "<br />");
			$("#quote_result_id").append("From: " + jsonData.From + "<br />");
			$("#quote_result_id").append("To: " + jsonData.To + " <br/>");
			$("#quote_result_id").append("Container Type: " + jsonData.ContainerType + "<br />");
			$("#quote_result_id").append("Freight Charge(Inclusive BAF): $" + jsonData.FreightCharge + " USD<br />");
			if($("#fcl_import_or_export_select_id").children('option:selected').val() === "import") {
				$("#quote_result_id").append("Local Charge: $" + jsonData.LocalCharge + " AUD<br />");
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
			$("#fcl_email_id").hide();
			$("#quote_result_id").show();				
			$("body").css({overflow:"visible"});
		});
		
	});
});