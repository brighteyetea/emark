<?php
include_once '../class/FreightCharge.class.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$transfer_type = $_POST['transferType'];
$load_port_id = $_POST['loadPortID'];
$discharge_port_id = $_POST['dischargePortID'];
$company_id = $_POST['company'];
$a20GP_charge = $_POST['a20GPCharge'];
$a40GP_charge = $_POST['a40GPCharge'];
$a40HC_charge = $_POST['a40HCCharge'];
$transmit_days = $_POST['transmitDays'];
$expiration = $_POST['expiration'];

//$transfer_type = "import";
//$load_port_id = 12;
//$discharge_port_id = 1;
//$company_id = 1;
//$a20GP_charge = 200;
//$a40GP_charge = 400;
//$a40HC_charge = 800;
//$transmit_days = 11;
//$expiration = "2014-06-30";

$freight = new FreightCharge($load_port_id, $discharge_port_id, "20GP", $transfer_type);

if($freight->add_new_freight_charge($transfer_type, $load_port_id, $discharge_port_id, $company_id, $a20GP_charge, $a40GP_charge, $a40HC_charge, $transmit_days, $expiration)) {
    echo json_encode("Add Freight Charge Success!");
} else {
    echo json_encode("Add Freight Charge Faild!");    
}




