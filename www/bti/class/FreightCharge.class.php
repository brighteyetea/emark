<?php
include_once 'DB.class.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class FreightCharge {
    private $freight_charge;
    private $local_charge;
	private $db;
	
	public function __construct() {
		$this->db = new DB();
        $this->db->connect();   
		$freight_charge = Array();
		$local_charge = Array(); 
	}
	
	public function get_export_fcl_freight_charge($load_port_id, $discharge_port_id, $container_type) {
		//database table item name use for searching
		if($container_type === "20GP") {
			$container_type = "export_freight_charge_fcl_international_freight_20GP";
        } else if($container_type === "40GP") {
			$container_type = "export_freight_charge_fcl_international_freight_40GP";
        }
		
		$export_sql = "SELECT fk_company_id," . $container_type . ", export_freight_charge_transit_time, export_freight_charge_expiration_date "
                        . "FROM tb_export_freight_charge "
                        . "WHERE fk_load_port_id ='$load_port_id' AND fk_discharge_port_id = '$discharge_port_id';";
						
		$all_companies_freight_charge = $this->db->execute($export_sql);
		
		if(mysql_num_rows($all_companies_freight_charge) != 0) { 
			while($row = mysql_fetch_array($all_companies_freight_charge)){
				$this->freight_charge[$row[0]] = array($row[1] * 1.15, $row[2], $row[3]);
            } 
        } else {//cannot found export freight charge 
            $this->freight_charge = null;
        }
		
		return $this->freight_charge;
	}

	public function get_import_fcl_freight_charge($load_port_id, $discharge_port_id, $container_type) {
		//database table item name use for searching
		if($container_type === "20GP") {
            $container_type = "import_freight_charge_fcl_international_freight_20GP";
        } else if($container_type === "40GP") {
            $container_type = "import_freight_charge_fcl_international_freight_40GP";
        }
		
		$import_sql = "SELECT fk_company_id," . $container_type . ", import_freight_charge_transit_time, import_freight_charge_expiration_date "
            . "FROM tb_import_freight_charge "
            . "WHERE fk_load_port_id ='$load_port_id' AND fk_discharge_port_id = '$discharge_port_id';";
		
		$all_companies_freight_charge = $this->db->execute($import_sql);
		
		if(mysql_num_rows($all_companies_freight_charge) != 0) { 
			while($row = mysql_fetch_array($all_companies_freight_charge)){
				if($row[1] != 0 ) {
					$this->freight_charge[$row[0]] = array($row[1], $row[2], $row[3]);
				}
            } 
        } else {//cannot found export freight charge 
            $this->freight_charge = null;
        }
		
		return $this->freight_charge;
	}
	
	public function get_export_lcl_freight_charge($load_port_id, $discharge_port_id) {
		$export_sql = "SELECT fk_company_id, export_freight_charge_lcl_international_freight_per_cbm, export_freight_charge_transit_time, export_freight_charge_expiration_date "
                        . "FROM tb_export_freight_charge "
                        . "WHERE fk_load_port_id ='$load_port_id' AND fk_discharge_port_id = '$discharge_port_id';";
        $all_companies_freight_charge = $this->db->execute($export_sql);

        if(mysql_num_rows($all_companies_freight_charge) != 0) {
            while($row = mysql_fetch_array($all_companies_freight_charge)){
				if($row[1] != 0 ) {	
					$this->freight_charge[$row[0]] = array($row[1], $row[2], $row[3]);
				}
            } 
        } else {
            $this->freight_charge = null;
        }
		
		return $this->freight_charge;
	}
	
	public function get_import_lcl_freight_charge($load_port_id, $discharge_port_id) {
	    $import_sql = "SELECT fk_company_id, import_freight_charge_lcl_international_freight_per_cbm, import_freight_charge_transit_time, import_freight_charge_expiration_date "
                . "FROM tb_import_freight_charge "
                . "WHERE fk_load_port_id ='$load_port_id' AND fk_discharge_port_id = '$discharge_port_id';";
        $all_companies_freight_charge = $this->db->execute($import_sql);
        
		if(mysql_num_rows($all_companies_freight_charge) != 0) {
            while($row = mysql_fetch_array($all_companies_freight_charge)) {
				if($row[1] != 0 ) {	
					$this->freight_charge[$row[0]] = array($row[1], $row[2], $row[3]);
				}
            } 
        } else {
            $this->freight_charge = null;
        }
		
		return $this->freight_charge;
	}
	
	
	public function get_company_id() {
        return array_keys($this->freight_charge);
    }
	
    /**
     * 
     * @param type $load_port_id
     * @param type $discharge_port_id
     * @param type $container_type 20GP or 40GP
     * @param type $transfer_type import or export
     */
	 /*
    public function __construct($load_port_id, $discharge_port_id, $container_type, $transfer_type) {
        $this->charge = array();//[company_id]{freight_charge, transit_time, expiration_date}
        $this->local_charge = array();
        
        $db = new DB();
        $db->connect();        
        
        if($transfer_type == "export"){//export
            
            if($container_type === "20GP") {
                $container_type = "export_freight_charge_fcl_international_freight_20GP";
            } else if($container_type === "40GP") {
                $container_type = "export_freight_charge_fcl_international_freight_40GP";
            }
            
            $export_sql = "SELECT fk_company_id," . $container_type . ",export_freight_charge_lcl_international_freight_per_cbm, export_freight_charge_transit_time, export_freight_charge_expiration_date "
                        . "FROM tb_export_freight_charge "
                        . "WHERE fk_load_port_id ='$load_port_id' AND fk_discharge_port_id = '$discharge_port_id';";
            $result = $db->execute($export_sql);

            if(mysql_num_rows($result) != 0) {
               while($row = mysql_fetch_array($result)){
                $this->freight_charge[$row[0]] = array($row[1], $row[2], $row[3], $row[4]);
               } 
            } else {
                $this->freight_charge = null;
            }
            
        } else {//import
                        
            if($container_type === "20GP") {
                $container_type = "import_freight_charge_fcl_international_freight_20GP";
            } else if($container_type === "40GP") {
                $container_type = "import_freight_charge_fcl_international_freight_40GP";
            }
            
            $import_sql = "SELECT fk_company_id," . $container_type . ", import_freight_charge_lcl_international_freight_per_cbm, import_freight_charge_transit_time, import_freight_charge_expiration_date "
                        . "FROM tb_import_freight_charge "
                        . "WHERE fk_load_port_id ='$load_port_id' AND fk_discharge_port_id = '$discharge_port_id';";
            $result = $db->execute($import_sql);
            if(mysql_num_rows($result) != 0) {
               while($row = mysql_fetch_array($result)){
                $this->freight_charge[$row[0]] = array($row[1], $row[2], $row[3], $row[4]);
               } 
            } else {
                $this->freight_charge = null;
            }
            
        }
    }
	*/
    
    public function add_new_freight_charge($transfer_type, $load_port_id, $discharge_port_id, $company_id, 
            $a20GP_charge, $a40GP_charge, $a40HC_charge, $transmit_days, $expiration) {
        $table_name = null;
        $table_id = null;
        $table_20GP = null;
        $table_40GP = null;
        $table_40HC = null;
        $table_tranmit = null;
        $table_cbm = null;
        $table_expiration =null;
        
        if($transfer_type == "import"){
            $table_name = "tb_import_freight_charge";
            $table_id = "id_import_freight_charge";
            $table_20GP = " import_freight_charge_fcl_international_freight_20GP";
            $table_40GP = ", import_freight_charge_fcl_international_freight_40GP";
            $table_40HC = ", import_freight_charge_fcl_international_freight_40HC";
            $table_tranmit = ", import_freight_charge_transit_time";
            $table_cbm = ", import_freight_charge_lcl_international_freight_per_cbm";
            $table_expiration = ", import_freight_charge_expiration_date";
        } else {
            $table_name = "tb_export_freight_charge";
            $table_id = "id_export_freight_charge";
            $table_20GP = " export_freight_charge_fcl_international_freight_20GP";
            $table_40GP = ", emport_freight_charge_fcl_international_freight_40GP";
            $table_40HC = ", emport_freight_charge_fcl_international_freight_40HC";
            $table_tranmit = ", export_freight_charge_transit_time";
            $table_cbm = ", export_freight_charge_lcl_international_freight_per_cbm";
            $table_expiration = ", export_freight_charge_expiration_date";
        }
        
        $db = new DB();
        $db->connect();
        
        $sql_select = "SELECT * FROM `db_bti_quotation_system`." .$table_name 
                    . " WHERE fk_load_port_id = '$load_port_id' AND fk_discharge_port_id = '$discharge_port_id' AND fk_company_id = '$company_id';";
        
        $result = $db->execute($sql_select);
        
        if(mysql_num_rows($result) == 1) {       
            $sql_update = "UPDATE  `db_bti_quotation_system`." . $table_name
                    . " SET " . $table_20GP . "=  '$a20GP_charge' "
                    . $table_40GP . "= '$a40GP_charge' "
                    . $table_40HC . "= '$a40HC_charge' "
                    . $table_tranmit . "= '$transmit_days'"
                    . $table_expiration . " = '$expiration' "
                    . " WHERE fk_load_port_id = '$load_port_id' AND fk_discharge_port_id = '$discharge_port_id' AND fk_company_id = '$company_id';";
            if($db->execute($sql_update)) {
                return true;
            } else {
                return FALSE;
            }
        } else {
            $sql_insert = "INSERT INTO `db_bti_quotation_system`." .$table_name 
                    ."(" . $table_id . "," .$table_20GP . $table_40GP . $table_40HC . $table_tranmit .$table_cbm . $table_expiration . ", `fk_load_port_id`, `fk_discharge_port_id`, `fk_company_id`)" 
                    ." VALUES (NULL, '$a20GP_charge', '$a40GP_charge', '$a40HC_charge', '$transmit_days', 0 , '$expiration', '$load_port_id', '$discharge_port_id', '$company_id');";

            if($db->execute($sql_insert)) {
                return true;
            } else {
                return FALSE;
            }
        }
    }
}