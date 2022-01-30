<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rf_data";
session_start();

//On page 2
$K = $_SESSION['varname'];

echo $K;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['perform'])){
  $usn=array($_POST["usn1"],$_POST["usn2"],  $_POST["usn3"],$_POST["usn4"],$_POST["usn5"],$_POST["usn6"]);

unset($_POST);
for ($i=0;$i<6;$i++){ 
  if(!empty($usn[$i])){
    $sql = "UPDATE master_table SET Kit_Name='$K', Kit_Login=NOW() WHERE USN='$usn[$i]'";
    $usn[$i]='';
    mysqli_query($conn, $sql);
 }
  }
  
    mysqli_close($conn);
    header("Location: index.php");
    

    exit;
}

?>