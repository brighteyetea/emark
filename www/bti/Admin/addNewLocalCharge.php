<?php
include_once '../class/LocalCharge.class.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$transfer_type = $_POST['transferType'];
$port_id = $_POST['portID'];
$company_id = $_POST['company'];
$a20GP_charge = $_POST['a20GPCharge'];
$a40GP_charge = $_POST['a40GPCharge'];

//$transfer_type = "export";
//$port_id = 1;
//$company_id = 1;
//$a20GP_charge = 500;
//$a40GP_charge = 400;

$local_charge = new LocalCharge($company_id, $port_id, $port_id, "20GP", $transfer_type);

if($local_charge->add_new_local_charge($port_id, $company_id, $a20GP_charge, $a40GP_charge, $transfer_type)) {
    echo json_encode("Add Local Charge Success!");
} else {
    echo json_encode("Add Local Charge Faild!");
}