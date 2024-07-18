<?php
include "db_con.php";
if (isset($_GET['submit'])) {

  
  $id = mysqli_real_escape_string($db_con, $_GET['id']);
  $mail = mysqli_real_escape_string($db_con, $_GET['mail']);
  $name = mysqli_real_escape_string($db_con, $_GET['name']);
  $add = mysqli_real_escape_string($db_con, $_GET['add']);
}

$sql1 = "INSERT INTO suppliers(`supplier_id`,`supplier_email`,`supplier_name`,`address`)
    values('$id','$mail','$name','$add' )";

if (mysqli_query($db_con, $sql1)) {
  echo "
  <script>
    alert(\"Supplier Added successfully\");
    
window.location.href = \"addsupplier.php\";

  </script>";
} else {
  echo "Error: " . $sql1 . "<br>" . mysqli_error($db_con);
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
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Supplier Process</title>
</head>

<body>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>