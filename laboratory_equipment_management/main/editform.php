<?php
	include('connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM transaction WHERE id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $rows = $result->fetch(); $i++){
?>
<form action="edit.php" method="POST">
<input type="hidden" name="memids" value="<?php echo $id; ?>" />
Material/Equipments<br>
<select name="equipment" class="ed">
	<?php
	echo '<option value="'.$rows['equipment'].'">'.$rows['equipment'].'</option>';
	include('connect.php');		
		$result = $db->prepare("SELECT * FROM equipment ORDER BY id DESC");
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
		echo '<option value="'.$row['eq_name'].'">'.$row['eq_name'].'</option>';
		}
	?>
</select><br /><br>
Specification<br>
<input type="text" name="specification" value="<?php echo $rows['specification']; ?>"/><br><br>
Manufacturer<br>
<input type="text" name="manufacturer" value="<?php echo $rows['manufacturer']; ?>"/><br><br>
Bill Number<br>
<input type="text" name="bill_no" value="<?php echo $rows['bill_no']; ?>"/><br><br>
Bill Date<br>
<input type="date" name="bill_date" value="<?php echo $rows['bill_date']; ?>"/><br><br>
Receive Date<br>
<input type="date" name="receive_date" value="<?php echo $rows['receive_date']; ?>"/><br><br>
Remark<br>
<select name="remark" class="ed">
    <?php echo '<option value="'.$rows['remark'].'">'.$rows['remark'].'</option>'; ?>
	<option value="Working">Working</option>
	<option value="Notworking">Not working</option>
</select><br /><br>
Rate per unit<br>
<input type="number" name="rate_unit" value="<?php echo $rows['rate_unit']; ?>"/><br><br>
Number of Unit<br>
<input type="number" name="no_unit" value="<?php echo $rows['no_unit']; ?>"/><br><br>
Total Cost<br>
<input type="number" name="total_cost" value="<?php echo $rows['total_cost']; ?>"/><br><br>
<input type="submit" value="Save" />

</form>
<?php
	}
?>






















<!--Date In<br>
<input type="text" name="date" value="<?php //echo $rows['date']; ?>" /><br><br>
Date Out<br>
<input type="text" name="dateo" value="<?php //echo $rows['dateout']; ?>" /><br><br>
Received By<br>
<input type="text" name="rb" value="<?php //echo $rows['receive_by']; ?>" /><br><br>
Document Type<br>
<select name="doc_type" class="ed">
	<?php
/*	echo '<option value="'.$rows['doc_type'].'">'.$rows['doc_type'].'</option>';
	include('connect.php');		
		$result = $db->prepare("SELECT * FROM doc_type ORDER BY id DESC");
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
		echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
		}
	?>
</select><br /><br>
Description<br>
<textarea name="desc"><?php echo $rows['description']; ?></textarea><br><br>
Office<br>
<select name="office" class="ed">
	<?php
	echo '<option value="'.$rows['office'].'">'.$rows['office'].'</option>';
	include('connect.php');		
		$result = $db->prepare("SELECT * FROM offices ORDER BY id DESC");
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
		echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
		}
	?>
</select><br /><br>
Status<br>
<input type="text" name="status" value="<?php echo $rows['status']; ?>" /><br><br>
Forwarded To<br>
<input type="text" name="ft" value="<?php echo $rows['ft']; ?>" /><br><br>
<input type="submit" value="Save" /> -->*/
