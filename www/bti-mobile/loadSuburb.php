<?php
include_once './class/Suburb.class.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$portID = $_POST['portID'];

$suburb = new Suburb();

$suburb->get_cartage_fcl_charge("import", $portID ,$portID);

$suburbList = $suburb->get_suburb_list();

echo json_encode($suburbList);