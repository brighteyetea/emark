<?php
include_once './class/Ports.class.php';
include_once './class/ClearenceCharge.class.php';
include_once './class/FreightCharge.class.php';
include_once './class/LocalCharge.class.php';
include_once './class/User.class.php';
include_once './class/Suburb.class.php';
include_once './functions.php';

$container_type = $_POST['containerType'];
$load_port_id = $_POST['loadPort'];
$discharge_port_id = $_POST['dischargePort'];
$transfer_type = $_POST['transferType'];
$suburb = $_POST['suburb'];
$clearance = $_POST['clearance'];
$email = $_POST['email']; //check user's email 

$total_charge = array();// store all componies charge
$freight_charge = array();
$local_charge_charge = array();
$chargeArray = array();

$user = new User($email);
$user_discount = $user->get_user_infor();// user discount mutil charge

$freight = new FreightCharge();

if($transfer_type == "export") {
	$freight_charge = $freight->get_export_fcl_freight_charge($load_port_id, $discharge_port_id, $container_type);
} else {
	$freight_charge = $freight->get_import_fcl_freight_charge($load_port_id, $discharge_port_id, $container_type);
}
//print_r($freight_charge);
$companies_id = $freight->get_company_id();

$local_charge = new LocalCharge();

//compare price
foreach($companies_id as $company_id) {
    $local_charge_fee = $local_charge->get_fcl_local_charge($company_id, $load_port_id, $discharge_port_id, $container_type, $transfer_type);
    if( $local_charge_fee != null) {
        $local_charge_fee_array[$company_id] = $local_charge_fee;
    } else {
        continue;
    }
    $total_charge[$company_id] = $freight_charge[$company_id][0] + $local_charge_fee_array[$company_id];
}

$max_company_id = array_search(max($total_charge),$total_charge);
$max_total_charge = $total_charge[$max_company_id];



$cartage_charge = 0;
if($suburb != 0) {
	$cartage = new Suburb();
    $cartage->get_cartage_fcl_charge($transfer_type, $load_port_id, $discharge_port_id);
    $cartage_charge = $cartage->get_suburb_detail($suburb, $container_type);    
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
$chargeArray["Email"] = $email;
$chargeArray["TransferType"] = $transfer_type;
$chargeArray["From"] = $ports->get_port_name($load_port_id);
$chargeArray["To"] = $ports->get_port_name($discharge_port_id);
$chargeArray["ContainerType"] = $container_type;
$chargeArray["FreightCharge"] = $freight_charge[$max_company_id][0];
$chargeArray["LocalCharge"] = $local_charge_fee_array[$max_company_id];
$chargeArray["Cartage"] = $cartage_charge;
$chargeArray["ClearanceCharge"] = $clearance_charge;

$content = date('Y-m-d H:i:s', $timeStamp) . "\n";
foreach($chargeArray as $keyName => $value) {
	$content = $content . $keyName . ": " . $value . "\n";
}
saveFile('quote/' . $referenceNumber . '.txt', $content);
sendEmail($email, $content);    
echo json_encode($chargeArray);

