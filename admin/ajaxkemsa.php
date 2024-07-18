<?php
include_once 'db_con.php';

if (isset($_POST['prod_name'])) {

	$name = $_POST['prod_name'];
	$query1 = "SELECT supplier_name FROM products WHERE" . " prod_name ='$name'";
	$result1 = $db_con->query($query1);

	if (mysqli_num_rows($result1) > 0) {
		

		while ($row = mysqli_fetch_assoc($result1)) {
			echo '<option value=' . $row['supplier_name'] . '>' . $row['supplier_name'] . '</option>';
		}
	} else {

		echo '<option>No Supplier Found!</option>';
	}
} 

if (isset($_POST['supplier_name'])) {

	$name = $_POST['supplier_name'];
	$query = "SELECT supplier_email FROM suppliers WHERE" . " supplier_name ='$name'";
	$result = $db_con->query($query);

	if ($result->num_rows > 0) {
		

		while ($row = mysqli_fetch_assoc($result)) {
			echo '<option value=' . $row['supplier_email'] . '>' . $row['supplier_email'] . '</option>';
		}
	} else {

		echo '<option>No Email Found!</option>';
	}
} 

