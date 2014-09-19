<?php
include_once '../class/Ports.class.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$ports = new Ports();

$countries = $ports->get_countries_list();

$json_ports = $countries;

 echo json_encode($json_ports);