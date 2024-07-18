<?php
include "db_con.php";

session_start();
$ses = $_SESSION['user_login'];
$sql = "SELECT * FROM users WHERE `username`='$ses';";
$result = mysqli_query($db_con, $sql);
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $name = $row["name"];
    $mail = $row["email"];
  }
}

if (isset($_GET['submit'])) {
  $pname = mysqli_real_escape_string($db_con, $_GET['pname']);
  $type = mysqli_real_escape_string($db_con, $_GET['type']);
  $quan = mysqli_real_escape_string($db_con, $_GET['quan']);
}



$sql1 = "insert into request(`prod_name`,`type`,`quantity`,`client_name`)
    values('$pname','$type','$quan','$name');";


if (mysqli_query($db_con, $sql1)) {
  echo "<script>
            alert(\"Request Submitted Successfully\");
            
    window.location.href = \"dashboard.php\";
    
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
  <title>adding course</title>
</head>

<body>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>