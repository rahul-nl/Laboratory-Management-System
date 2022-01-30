<?php
// configuration
include('connect.php');
// new data
$id=$_GET['id'];
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
$sql = "UPDATE transaction SET equipment=?, specification=?, manufacturer=?, bill_no=?, bill_date=?, receive_date=?, remark=?, rate_unit=?, no_unit=?, total_cost=? WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($equipment,$specification,$manufacturer,$bill_no,$bill_date,$receive_date,$remark,$rate_unit,$no_unit,$total_cost,$id));
header("location: index.php");

?>