<?php
include_once 'DB.class.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class LocalCharge{
    private $charge;
	
	public function  __construct(){
	
	}
    /**
     * 
     * @param type $company_id
     * @param type $load_port_id
     * @param type $discharge_port_id
     * @param string $container_type
     * @param type $transfer_type
     */
    public function  get_fcl_local_charge($company_id, $load_port_id, $discharge_port_id, $container_type, $transfer_type) {
        $db = new DB();
        $db->connect();
        $port_id = null;
        $table_name = null;
        
        if($transfer_type == "export"){//export
            if($container_type == "20GP") {
                $container_type = "tb_export_fcl_local_charge_20";
            } else if($container_type == "40GP") {
                $container_type = "tb_export_fcl_local_charge_40";
            }
            $port_id = $load_port_id;
            $table_name = "tb_export_fcl_local_charge";
        } else {//import
            if($container_type == "20GP") {
                $container_type = "tb_import_fcl_local_charge_20";
            } else if($container_type == "40GP") {
                $container_type = "tb_import_fcl_local_charge_40";
            }
            $port_id = $discharge_port_id;
            $table_name = "tb_import_fcl_local_charge";
        }
        
        $export_sql = "SELECT " . $container_type
                    . " FROM " . $table_name
                    . " WHERE fk_port_id ='$port_id' AND fk_company_id = '$company_id';";
        $result = $db->execute($export_sql);

        if(mysql_num_rows($result) != 0) {
            while($row = mysql_fetch_array($result)){
                $this->charge = $row[0];
            }
        } else {
            $this->charge = null;
        }
		
		return $this->charge;
    }
    
    /**
     * 
     * @return type null not found in table
     */	
	public function get_lcl_local_charge($company_id, $load_port_id, $discharge_port_id, $transfer_type) {
		$db = new DB();
        $db->connect();
        $port_id = null;
        $table_name = null;
        
        if($transfer_type == "export"){//export
			$lcl_charge = "tb_export_lcl_local_charge";
            $port_id = $load_port_id;
            $table_name = "tb_export_fcl_local_charge";
        } else {//import
			$lcl_charge = "tb_import_lcl_local_charge";
            $port_id = $discharge_port_id;
            $table_name = "tb_import_fcl_local_charge";
        }
        
        $export_sql = "SELECT " . $lcl_charge
                    . " FROM " . $table_name
                    . " WHERE fk_port_id ='$port_id' AND fk_company_id = '$company_id';";
        $result = $db->execute($export_sql);

        if(mysql_num_rows($result) != 0) {
            while($row = mysql_fetch_array($result)){
                $this->charge = $row[0];
            }
        } else {
            $this->charge = null;
        }
		
		return $this->charge;
	}
    
    public function add_new_local_charge($port_id, $company_id, $a20GP_charge, $a40GP_charge, $transfer_type) {
        $table_name = null;
        $table_id = null;
        $table_20GP = null;
        $table_40GP = null;
        
        if($transfer_type == "import") {
            $table_name = "tb_import_fcl_local_charge";
            $table_id = "id_import_fcl_local_charge";
            $table_20GP = "tb_import_fcl_local_charge_20";
            $table_40GP = "tb_import_fcl_local_charge_40";
        } else {
            $table_name = "tb_export_fcl_local_charge";
            $table_id = "id_export_fcl_local_charge";
            $table_20GP = "tb_export_fcl_local_charge_20";
            $table_40GP = "tb_export_fcl_local_charge_40";
        }
        
        $db = new DB();
        $db->connect();
        if($this->charge == null) {
            $sql_insert = "INSERT INTO `db_bti_quotation_system`." .$table_name 
                        . "(" . $table_id . ", " . $table_20GP . ", " . $table_40GP . ", fk_company_id, fk_port_id)"
                        . "VALUES (NULL, '$a20GP_charge', '$a40GP_charge', '$company_id', '$port_id');";
            if($db->execute($sql_insert)) {
                return true;
            } else {
                return false;
            }
        } else {
            $sql_update = "UPDATE  `db_bti_quotation_system`." . $table_name
                        . " SET ". $table_20GP . "= '$a20GP_charge' "
                        . ", " . $table_40GP . "= '$a40GP_charge' "
                        . "WHERE fk_port_id = '$port_id' AND fk_company_id = '$company_id';";
            if($db->execute($sql_update)) {
                return true;
            } else {
                return false;
            }
        }
        
    }
}
