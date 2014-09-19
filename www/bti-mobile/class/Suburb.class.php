<?php
include_once 'DB.class.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Suburb {
    private $suburb;
    private $cartage_charge;
    
	public function __construct() {
	}
	
	public function get_cartage_lcl_charge($transfer_type, $load_port_id, $discharge_port_id) {
		$port_id = null;
			
        if($transfer_type == "export"){//export
            $port_id = $load_port_id;
        } else {//import
            $port_id = $discharge_port_id;
        }
        
		$this->suburb = array();
        $this->suburb_detail = array();
        $db = new DB();
        $db->connect();
		
		$sql = "SELECT id_cartage, tb_cartage_suburb, tb_cartage_lcl FROM tb_cartage WHERE fk_port_id = '$port_id';";
        $result = $db->execute($sql);
        if(mysql_num_rows($result) != 0) {
            while($row = mysql_fetch_array($result)) {
                $this->suburb[$row[0]] = $row[1];
                $this->cartage_charge[$row[0]] = $row[2];
            }
        } else {
            $this->cartage_charge = null;
            $this->suburb = null;
        }
	}
	
    public function get_suburb_lcl_detail($id_cartage) {
        return $this->cartage_charge[$id_cartage];
    }	
	
    public function get_cartage_fcl_charge($transfer_type, $load_port_id, $discharge_port_id) {
        $port_id = null;
        
        if($transfer_type == "export"){//export
            $port_id = $load_port_id;
        } else {//import
            $port_id = $discharge_port_id;
        }
        
        
        $this->suburb = array();
        $this->suburb_detail = array();
        $db = new DB();
        $db->connect();
        $sql = "SELECT id_cartage, tb_cartage_suburb,tb_cartage_20, tb_cartage_40  FROM tb_cartage WHERE fk_port_id = '$port_id';";
        $result = $db->execute($sql);
        if(mysql_num_rows($result) != 0) {
            while($row = mysql_fetch_array($result)) {
                $this->suburb[$row[0]] = $row[1];
                $this->cartage_charge[$row[0]] = array($row[2], $row[3]);
            }
        } else {
            $this->cartage_charge = null;
            $this->suburb = null;
        }
    }
    
    public function get_suburb_list() {
        return $this->suburb;
    }
    
    public function get_suburb_detail($id_cartage, $container_type) {
        if($container_type == "20GP") {
            return $this->cartage_charge[$id_cartage][0];
        } else {
            return $this->cartage_charge[$id_cartage][1];
        }
    }
    
    public function add_new_cartage($port_id,$a20GP_charge, $a40GP_charge, $suburb) {
        $db = new DB();
        $db->connect();
        
        $sql = "SELECT * FROM tb_cartage WHERE fk_port_id = '$port_id' AND tb_cartage_suburb = '$suburb';";
        
        $result = $db->execute($sql);
        
        if(mysql_num_rows($result) != 0) {
            $sql_update = "UPDATE  `db_bti_quotation_system`.tb_cartage "
                        . "SET tb_cartage_20 = '$a20GP_charge', "
                        . "tb_cartage_40 = '$a40GP_charge'"
                        . "WHERE fk_port_id = '$port_id' AND tb_cartage_suburb = '$suburb';";
            if($db->execute($sql_update)) {
                return true;
            } else {
                return false;
            }
        } else {
            $sql_insert = "INSERT INTO `db_bti_quotation_system`.tb_cartage "
                        . "(`id_cartage` ,`tb_cartage_suburb` ,`tb_cartage_20` ,`tb_cartage_40` ,`fk_port_id`)"
                        . " VALUES (NULL ,  '$suburb',  '$a20GP_charge',  '$a40GP_charge',  '$port_id');";
            
            if($db->execute($sql_insert)) {
                return true;
            } else {
                return FALSE;
            }
        }
    }
}
