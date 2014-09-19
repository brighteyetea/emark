<?php
include_once '../class/Company.class.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$company = new Company();

echo json_encode($company->get_company_list());