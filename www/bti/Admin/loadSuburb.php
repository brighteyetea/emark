<?php
include_once '../class/Suburb.class.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$port_id = $_POST['portID'];

$suburb = new Suburb("import", $port_id, $port_id);

echo json_encode($suburb->get_suburb_list());
