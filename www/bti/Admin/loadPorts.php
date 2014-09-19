<?php
include_once '../class/Ports.class.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$country_name = $_POST['countryName'];

$ports = new Ports();

$json_ports = $ports->get_ports_list($country_name);

 echo json_encode($json_ports);
