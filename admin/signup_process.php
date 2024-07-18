<?php
include "db_con.php";
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($db_con, $_POST['name']);
    $uname = mysqli_real_escape_string($db_con, $_POST['uname']);
    $mail = mysqli_real_escape_string($db_con, $_POST['mail']);
    $pwd = mysqli_real_escape_string($db_con, $_POST['pwd']);
    $add = mysqli_real_escape_string($db_con, $_POST['add']);

    $date = date("Y-m-d");
    $legpass = sha1($pwd);

    $sql1 = "INSERT INTO users values('', '$uname','$name','$mail','$legpass','2','$add','$date')";

    if (mysqli_query($db_con, $sql1)) {
        echo "
  <script>
    alert(\"Sign Up successful\");
    
window.location.href = \"login.php\";

  </script>";
    } else {
        echo "Error Signing Up " . mysqli_error($db_con);
    }
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