<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rf_data";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if(isset($_POST['logout']))
{
    $usn = $_POST['usn'];

    $sql = "UPDATE master_table SET Kit_Logout=NOW() WHERE USN='$usn'";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("Location:newdata.php");

    exit;
}

?>