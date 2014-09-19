<?php
include_once './class/Ports.class.php';
include_once './class/ClearenceCharge.class.php';
include_once './class/FreightCharge.class.php';
include_once './class/LocalCharge.class.php';
include_once './class/User.class.php';
include_once './class/Suburb.class.php';
include_once './functions.php';

$load_port_id = $_POST['loadPort'];
$discharge_port_id = $_POST['dischargePort'];
$cube = $_POST['cube'];
$weight = $_POST['weight'];
$transfer_type = $_POST['transferType'];
$suburb = $_POST['suburb'];
$clearance = $_POST['clearance'];
$email = $_POST['email']; //check user's email 

$cube = processCube($cube, $weight);//compare between cube and weight

$total_charge = array();// store all componies charge
$freight_charge = array();
$local_charge_fee_array = array();
$chargeArray = array();

$user = new User($email);
$user_discount = $user->get_user_infor();// user discount mutil charge

$freight = new FreightCharge();

if($transfer_type == "export") {
	$freight_charge = $freight->get_export_lcl_freight_charge($load_port_id, $discharge_port_id);
} else {
	$freight_charge = $freight->get_import_lcl_freight_charge($load_port_id, $discharge_port_id);
}
//print_r($freight_charge);
$companies_id = $freight->get_company_id();

$local_charge = new LocalCharge();
//compare price and compute total charge to select max total price
foreach($companies_id as $company_id) {
    $local_charge_fee = $local_charge->get_lcl_local_charge($company_id, $load_port_id, $discharge_port_id, $transfer_type);
	//print_r($local_charge_fee);
    if( $local_charge_fee != null) {
        $local_charge_fee_array[$company_id] = $local_charge_fee * $cube + 55;
    } else {
        continue;
    }
	
	$freight_lcl_charge[$company_id] = $freight_charge[$company_id][0] * $cube;
	
    $total_charge[$company_id] = $freight_lcl_charge[$company_id] + $local_charge_fee_array[$company_id];
}

$max_company_id = array_search(max($total_charge),$total_charge);
//$max_total_charge = $total_charge[$max_company_id];

$cartage_charge = 0;
if($suburb != 0) {
    $cartage = new Suburb();
	$cartage->get_cartage_lcl_charge($transfer_type, $load_port_id, $discharge_port_id);
	$cartage_charge = $cartage->get_suburb_lcl_detail($suburb) * $cube;
	if($cartage_charge < 115) {
		$cartage_charge = 115;
	} 
}

$clearance_charge = 0;
if($clearance == "Yes") {
	$clearance = new ClearanceCharge();
	$clearance_charge = $clearance->get_clearance_charge();
}


//return
$ports = new Ports();
date_default_timezone_set("Australia/Sydney");
$timeStamp = time();
$referenceNumber = randomRefe($timeStamp);

$chargeArray["Ref"] = $referenceNumber;
$chargeArray["email"] = $email;
$chargeArray["transferType"] = $transfer_type;
$chargeArray["From"] = $ports->get_port_name($load_port_id);
$chargeArray["To"] = $ports->get_port_name($discharge_port_id);
$chargeArray["Cube"] = round($cube, 2);
$chargeArray["FreightCharge"] = round($freight_lcl_charge[$max_company_id], 2);
$chargeArray["LocalCharge"] = round($local_charge_fee_array[$max_company_id], 2);
$chargeArray["Cartage"] =  round($cartage_charge);
$chargeArray["ClearanceCharge"] = round($clearance_charge, 2);

$content = date('Y-m-d H:i:s', $timeStamp) . "\n";
foreach($chargeArray as $keyName => $value) {
	$content = $content . $keyName . ": " . $value . "\n";
}
saveFile('quote/' . $referenceNumber . '.txt', $content);
sendEmail($email, $content);  
echo json_encode($chargeArray);

