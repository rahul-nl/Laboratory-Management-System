
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="body.css">
    <script>

      function refreshPage(){
      window.location.reload();
    } 
    </script>    
    <title>Login Form</title>
</head>

<body onload="myFunction()">
  <form  method="post" action="update.php">
    <div>
      <h2>Log-In</h2>
    
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rf_data";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT sensor FROM lastdata ORDER BY id = 1"; /*select items to display from the sensordata table in the data base*/
 
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $row_sensor = $row["sensor"];
      
    }
  } 
  $k=NULL;?>  
  
      
  <?php if ($row_sensor == 22824012740): $k="A"?>
    <input type="text" name="kitname" class="kitname" value="A" disabled>
      
  <?php elseif($row_sensor == 831438662) : $k="H"?>
    <input type="text" name="kitname" class="kitname" value=" " disabled>

  <?php elseif($row_sensor == 22810311240) : $k="C"?>
    <input type="text" name="kitname" class="kitname" value="C" disabled>
  
  <?php elseif($row_sensor == 834515762) : $k="D"?>
    <input type="text" name="kitname" class="kitname" value="D" disabled>
  
  <?php elseif($row_sensor == 2281866440) : $k="E"?>
    <input type="text" name="kitname" class="kitname" value="E" disabled>
  
  <?php elseif($row_sensor == 610205233) : $k="F"?>
    <input type="text" name="kitname" class="kitname" value="F" disabled>
  
  <?php elseif($row_sensor == 1021942741) : $k="G"?>
    <input type="text"  name="kitname" class="kitname" value="G" disabled>
  
  <?php elseif($row_sensor == 8372262) : $k="H"?>
    <input type="text"  name="kitname" class="kitname" value="H" disabled>

  <?php else : ?>
    <input type="text"  name="kitname" class="kitname" value="Kit Not Valid" disabled>

  <?php endif; ?>
  <button type="button" class="refresh" onClick="refreshPage()">Refresh</button>
  <input type="text" id="usn" name="usn1" class="USN1" placeholder="Enter Your USN 1" autocomplete="off">
  <input type="text" id="usn" name="usn2" class="USN2" placeholder="Enter Your USN 2" autocomplete="off">
  <input type="text" id="usn" name="usn3" class="USN3" placeholder="Enter Your USN 3" autocomplete="off">
  <input type="text" id="usn" name="usn4" class="USN4" placeholder="Enter Your USN 4" autocomplete="off">
  <input type="text" id="usn" name="usn5" class="USN5" placeholder="Enter Your USN 5" autocomplete="off">
  <input type="text" id="usn" name="usn6" class="USN6" placeholder="Enter Your USN 6" autocomplete="off">
  
  </div>
  <button type="sumbit" class="btn" name="perform" value="Log In Here" onclick="document.get_ElementById('usn').value=''">Log In</button> 
  <!-- <button type="sumbit" class="btn" name="perform" value="Log In Here" onclick="submitForm()">Log In</button>  -->

  <a href="newdata.php" class="button" >Log Out</a>  
  
  <?php
session_start();
$_SESSION['varname'] = $k;


?>     
</form>



</body>
</html>


