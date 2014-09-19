<?php
include_once '../class/Ports.class.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$port_name = $_POST['portName'];
$port_country = $_POST['countryName'];
$port_code = $_POST['code'];


$port = new Ports();

if($port->add_new_port($port_name, $port_country, $port_code)) {
    echo json_encode("Add port Success!");
} else {
    echo json_encode("Add port Faild!");
}



