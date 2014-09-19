<?php
include_once '../class/Suburb.class.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$port_id = $_POST['portID'];
$suburb_name = $_POST['suburb'];
$a20GP_charge = $_POST['a20GPCharge'];
$a40GP_charge = $_POST['a40GPCharge'];
//$port_id = 2;
//$suburb_name = "AA";
//$a20GP_charge = 200;
//$a40GP_charge = 200;
        
$suburb = new Suburb("export", $port_id, $port_id);

if($suburb->add_new_cartage($port_id, $a20GP_charge, $a40GP_charge, $suburb_name)) {
    echo json_encode("Add Cartage Success!");
} else {
    echo json_encode("Add Cartage Faild!");
}

