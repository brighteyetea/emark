<?php
include_once './class/Ports.class.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$tranferType = $_POST['transferType'];

$ports = new Ports();

$countries = $ports->get_countries_list();

$json_ports = array();

foreach($countries as $country) {
    $ports_list = $ports->get_ports_list($country);
    if($tranferType == "export") { //export
        if($country == "AUSTRALIA") {
            foreach($ports_list as $port_id => $port_name) { //load ports
                $json_ports[0][$port_id] = $port_name;
            }
        } else {
            foreach($ports_list as $port_id => $port_name) { //discharge ports
                $json_ports[1][$port_id] = $port_name;
            }        
        }
    } else {
        if($country != "AUSTRALIA") {
            foreach($ports_list as $port_id => $port_name) { //load ports
                $json_ports[0][$port_id] = $port_name;
            }
        } else {
            foreach($ports_list as $port_id => $port_name) { //discharge ports
                $json_ports[1][$port_id] = $port_name;
            }        
        }       
    }
}

 echo json_encode($json_ports);


