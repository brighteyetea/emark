<?php
include_once 'DB.class.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Company {
    var $company;
    
    public function __construct() {
        $this->company = array();
        $db = new DB();
        $db->connect();
        $sql = "SELECT id_corporation, tb_corporation_name FROM tb_company ;";
        $result = $db->execute($sql);
        
        while($row = mysql_fetch_array($result)) {
            $this->company[$row[0]] = $row[1];
        }
    }
    
    public function get_company_list() {
        return $this->company;
    }
    
    public function add_new_company($company_name, $company_desc) {
        $db = new DB();
        $db->connect();
        
        $sql = $sql = "INSERT INTO  `db_bti_quotation_system`.`tb_company` (`id_corporation` ,`tb_corporation_name` ,`tb_corporation_desc`)".
               " VALUES (NULL ,  '$company_name',  '$company_desc');";
        
        if($db->execute($sql)) {
            return true;
        } else {
            return FALSE;
        }
    }
}
