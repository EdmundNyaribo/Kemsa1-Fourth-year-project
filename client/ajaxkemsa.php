<?php
include_once 'db_con.php';

// if (isset($_POST['prod_name'])) {

// 	$name = $_POST['prod_name'];
// 	$query1 = "SELECT supplier_name FROM products WHERE" . " prod_name ='$name'";
// 	$result1 = $db_con->query($query1);

// 	if (mysqli_num_rows($result1) > 0) {
// 		// echo '<option value = "">Select Supplier Name</option>';

// 		while ($row = mysqli_fetch_assoc($result1)) {
// 			echo '<option value=' . $row['supplier_name'] . '>' . $row['supplier_name'] . '</option>';
// 		}
// 	} else {

// 		echo '<option>No Supplier Found!</option>';
// 	}
// } 

if (isset($_POST['prod_name'])) {

	$pname = $_POST['prod_name'];
	$query = "SELECT `type` FROM products WHERE" . " prod_name ='$pname'";
	$result = $db_con->query($query);

	if ($result->num_rows > 0) {
		// echo '<option value="">Select Supplier Email</option>';

		while ($row = mysqli_fetch_assoc($result)) {
			echo '<option value=' . $row['type'] . '>' . $row['type'] . '</option>';
		}
	} else {

		echo '<option>No Type Found!</option>';
	}
} 

