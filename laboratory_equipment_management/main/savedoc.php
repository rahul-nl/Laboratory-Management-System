<!--Save equiment-->
<?php
include('connect.php');	

$eqname = $_POST['eqname']; //comes from adddoc.php

// query
$sql = "INSERT INTO equipment (eq_name) VALUES (:sas)";
$q = $db->prepare($sql);
$q->execute(array(':sas'=>$eqname));
header("location: doctype.php");


?>