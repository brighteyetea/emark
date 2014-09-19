<?php
include_once '../class/Company.class.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//$company_name = "2";
//$company_desc = "111";

$company_name = $_POST['companyName'];
$company_desc = $_POST['companyDesc'];

$company = new Company();

if($company->add_new_company($company_name, $company_desc)) {
    echo json_encode("Add Company Success!");
} else {
    echo json_encode("Add Company Faild!");
}