<?php
include_once 'DB.class.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ClearanceCharge{
    var $charge;
    
    public function __construct() {
        $db = new DB();
        $db->connect();
        
        $sql = "SELECT tb_clearence_charge_CCLR, tb_clearence_charge_BPP, tb_clearence_charge_BQR FROM tb_clearence_charge;";
    
        $result = $db->execute($sql);
        while($row = mysql_fetch_array($result)) {
            $this->charge = $row[0] + $row[1] + $row[2];
        }
    }
    
    public function get_clearance_charge() {
        return $this->charge;
    }
}
