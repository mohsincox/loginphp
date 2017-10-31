<?php  
include("../db_connection_mysqli.php");

$agent = $_GET['user'];
$start_date = $_GET['start_date'];
$end_date = $_GET['end_date'];
$start_date = $start_date.' 00:00:00';
$end_date = $end_date.' 23:59:59';
$start_date1 = $_GET['start_date'];
if ($agent == "All Agent") {
	$setSql = "SELECT `id`, `agent`, `phone_number`, `created_at`, `recall_representative`, `recall_about`, `ever_bought`, `get_any_leaflet`, `bought_budget_pack`, `how_many_per_month`, `why_did_not_buy`, `baby_age`, `remarks`, `gender` FROM `tbl_koko_krunch_crm` where created_at BETWEEN '$start_date' AND '$end_date'";
} else {
	$setSql = "SELECT `id`, `agent`, `phone_number`, `created_at`, `recall_representative`, `recall_about`, `ever_bought`, `get_any_leaflet`, `bought_budget_pack`, `how_many_per_month`, `why_did_not_buy`, `baby_age`, `remarks`, `gender` FROM `tbl_koko_krunch_crm` where agent = '$agent' AND created_at BETWEEN '$start_date' AND '$end_date'";
}

$setRec = mysqli_query($conn, $setSql);  
  
$columnHeader = '';  
$columnHeader = "ID" . "\t" . "Agent" . "\t" . "Phone Number" . "\t" . "Created At" . "\t" . "Recall Representative" . "\t" . "Recall About" . "\t" . "Ever Bought" . "\t" . "Get Any Leaflet" . "\t" . "Bought Budget Pack" . "\t" . "How Many Per Month" . "\t" . "Why Did Not Buy" . "\t" . "Baby Age" . "\t" . "Remarks" . "\t" . "Gender" . "\t";  
  
$setData = '';  
  
while ($rec = mysqli_fetch_row($setRec)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
//$d= date("Y-m-d");
$report_name = "KokuKrunch_";
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=".$report_name.$agent.".xls");  
header("Pragma: no-cache");  
header("Expires: 0");  
  
echo ucwords($columnHeader) . "\n" . $setData . "\n";  