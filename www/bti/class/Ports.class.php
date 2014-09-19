<?php
include_once 'DB.class.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Ports {
    var $countries_list; //mutil array to store ports country->port && port id
    
    public function __construct() {
	
        $this->countries_list = array();
        
        $db = new DB();
        $db->connect();

        $sql = "SELECT id_ports, ports_name, ports_country_name FROM tb_ports;";
        $result = $db->execute($sql);        
          
        while($row = mysql_fetch_array($result)) {
            if(in_array($row[2], $this->countries_list)) {
               $this->countries_list[$row[2]][$row[0]] = $row[1];
            } else {
                $this->countries_list[$row[2]][$row[0]] = $row[1];
            }
        }
    }
    
    public function get_ports_list($country_name) {
        if(!empty($this->countries_list[$country_name])) {
            return $this->countries_list[$country_name];
        } else {
            return null;
        }
    }
    
    public function get_countries_list() {
        return array_keys($this->countries_list);
    }
    
    /**
     * 
     * @param type $port_id
     */
    public function get_port_name($port_id) {
        foreach($this->countries_list as $country => $ports) {
            if(array_key_exists($port_id, $ports)) {
                return $ports[$port_id];
            } else {
                continue;
            }   
        }
    }
    
    public function add_new_port($port_name, $country, $code) {
        $db = new DB();
        $db->connect();
        
        $sql = "INSERT INTO  `db_bti_quotation_system`.`tb_company` (`id_ports` ,`ports_name` ,`ports_country_name` ,`ports_code`)".
               " VALUES (NULL ,  '$port_name',  '$country',  '$code');";
        
        if($db->execute($sql)) {
            return true;
        } else {
            return FALSE;
        }
    }
}

