<?php
include_once 'DB.class.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User {
    var $user_infor;
    
    public function __construct($email) {
        $this->user_infor = array();
        
        $db = new DB();
        $db->connect();
        
        $sql = "SELECT * FROM tb_users WHERE tb_users_email = '$email'";
        
        $result = $db->execute($sql);
        
        if(mysql_num_rows($result) != 0) {
            
        } else {
            $this->user_infor = array("normal", 0.5, 0.5, 0.5);
        }
    }
    
    public function get_user_infor() {
        return $this->user_infor;
    }
}