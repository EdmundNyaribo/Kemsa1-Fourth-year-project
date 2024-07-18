<?php
include "db_con.php";
if (isset($_GET['submit'])) {
  $bno = mysqli_real_escape_string($db_con, $_GET['bno']);
  $year = mysqli_real_escape_string($db_con, $_GET['year']);
  $cap = mysqli_real_escape_string($db_con, $_GET['cap']);
  $year = mysqli_real_escape_string($db_con, $_GET['sp']);
  $cap = mysqli_real_escape_string($db_con, $_GET['des']);
  $cap = mysqli_real_escape_string($db_con, $_GET['des']);
}

$sql1 = "insert into std_capacity(`cy_code`,`course_code`,`year`,`capacity`)
    values('$code$year','$code','$year','$cap')";

if (mysqli_query($db_con, $sql1)) {
  echo "
  <script>
    alert(\"Record updated successfully\");
    
window.location.href = \"stock.php\";

  </script>";
} else {
  echo "Error updating record: " . mysqli_error($db_con);
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="Description" content="Enter your description here" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="assets/css1/style.css">
  <title>Add Capacity</title>
</head>

<body>






  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>