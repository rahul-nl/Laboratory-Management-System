
<form action="reg.php" method="POST">
Material/Equipments<br>
<select name="equipment" class="ed">
	<?php
	include('connect.php');		
		$result = $db->prepare("SELECT * FROM equipment ORDER BY id DESC");
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
		echo '<option value="'.$row['eq_name'].'">'.$row['eq_name'].'</option>';
		}
	?>
</select><br /><br>
Specification<br>
<input type="text" name="specification" /><br><br>
Manufacturer<br>
<input type="text" name="manufacturer" /><br><br>
Bill Number<br>
<input type="text" name="bill_no" /><br><br>
Bill Date<br>
<input type="date" name="bill_date"><br><br>
Receive Date<br>
<input type="date" name="receive_date" /><br><br>
Remark<br>
<select name="remark" class="ed">
	<option value="">--select--</option>
	<option value="Working">Working</option>
	<option value="Notworking">Not working</option>
</select><br /><br>
Rate per unit<br>
<input type="number" name="rate_unit" /><br><br>
Number of Unit<br>
<input type="number" name="no_unit" /><br><br>
Total Cost<br>
<input type="number" name="total_cost" /><br><br>
<input type="submit" value="Save" />
</form>