<?php
include('connect.php');	

$equipment = $_POST['equipment'];
$specification = $_POST['specification'];
$manufacturer = $_POST['manufacturer'];
$bill_no = $_POST['bill_no'];
$bill_date = $_POST['bill_date'];
$receive_date = $_POST['receive_date'];
$remark = $_POST['remark'];
$rate_unit = $_POST['rate_unit'];
$no_unit = $_POST['no_unit'];
$total_cost = $_POST['total_cost'];

// query
$sql = "INSERT INTO `transaction` (id,equipment,specification,manufacturer,bill_no,bill_date,receive_date,remark,rate_unit,no_unit,total_cost) VALUES (NULL,:sas,:asas,:asafs,:offff,:statttt,:dot,:rd,:ft,:tat,:tig)";
$q = $db->prepare($sql);
$q->execute(array(':sas'=>$equipment,':asas'=>$specification,':asafs'=>$manufacturer,':offff'=>$bill_no,':statttt'=>$bill_date,':dot'=>$receive_date,':rd'=>$remark,':ft'=>$rate_unit,':tat'=>$no_unit,':tig'=>$total_cost));

header("location: index.php");


?>