        function loadCountry() {
            var request = $.ajax({
                type: "POST",
                url: "loadCountry.php",
                dataType: "json",
                ansync: false,
                cache: false
            });
            request.done(function(jsonData) {
                $("#country_select_id").empty();
                for(var country_id in jsonData){
                    $("#country_select_id").append(new Option(jsonData[country_id], jsonData[country_id]));    
                }
            });
        }
        
        function loadPorts($countryName) {        
            var request = $.ajax({
                type: "POST",
                url: "loadPorts.php",
                dataType: "json",
                data: {countryName: $countryName},
                ansync: false,
                cache: false
            });
            
            request.done(function(jsonData) {
                $("#ports_select_id").empty();
                for(var port_id in jsonData) {
                    $("#ports_select_id").append(new Option(jsonData[port_id], port_id));    
                }
            });    
        }
        
        function loadCompany() {
            var request = $.ajax({
                type: "POST",
                url: "loadCompany.php",
                dataType: "json",
                ansync: false,
                cache: false
            });
            
            request.done(function(jsonData) {
                $("div#div_company select#company_select_id").empty();
                for(var company_id in jsonData) {
                    $("div#div_company select#company_select_id").append(new Option(jsonData[company_id], company_id));    
                }
                
                $("div#div_local_charge select#company_select_id").empty();
                for(var company_id in jsonData) {
                    $("div#div_local_charge select#company_select_id").append(new Option(jsonData[company_id], company_id));    
                }
                
                $("div#div_freight select#company_select_id").empty();
                for(var company_id in jsonData) {
                    $("div#div_freight select#company_select_id").append(new Option(jsonData[company_id], company_id));    
                }
            });    
        }
        
        function loadLocalChargeAndCartage() {
            var request = $.ajax({
                type: "POST",
                url: "loadPorts.php",
                dataType: "json",
                data: {countryName: "AUSTRALIA"},
                ansync: false,
                cache: false
            });
            
            request.done(function(jsonData) {
                $("#div_cartage #port_select_id").empty();
                for(var port_id in jsonData) {
                    $("#div_cartage #port_select_id").append(new Option(jsonData[port_id], port_id));    
                }
                $("#div_local_charge #port_select_id").empty();
                for(var port_id in jsonData) {
                    $("#div_local_charge #port_select_id").append(new Option(jsonData[port_id], port_id));    
                }
            });  
        }
        
        function loadSuburb($portID) {
            var request = $.ajax({
                type: "POST",
                url: "loadSuburb.php",
                dataType: "json",
                data: {portID: $portID},
                ansync: false,
                cache: false
            });
            
            request.done(function(jsonData) {
                $("#div_cartage #suburb_select_id").empty();
                for(var port_id in jsonData) {
                    $("#div_cartage #suburb_select_id").append(new Option(jsonData[port_id], port_id));    
                }
            });              
        }