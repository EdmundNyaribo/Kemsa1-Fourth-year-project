<?php

include "db_con.php";
$uid = $_POST["id"];

if (isset($_POST['submit']) ) {
  

  $uname=$_POST['uname'];
  $name=$_POST['name'];
  $mail=$_POST['mail'];
  $pword=$_POST['pword'];
  $add=$_POST['add'];
  
  

  $sql2="UPDATE users SET username=\"$uname \",users.name=\"$name \",email=\"$mail \",users.password=\"$pword\",users.address=\"$add \"  WHERE user_id=\"$uid\"";
  if (mysqli_query($db_con, $sql2)) {
    echo "
      <script>
        alert(\"Record updated successfully\");
        
window.location.href = \"dashboard.php\";

      </script>";
      } else {
        echo "Error updating record: " . mysqli_error($db_con);
      }
      
} elseif (isset($_POST['delete'])) {
    $sql3="DELETE FROM users WHERE user_id=\"$uid\"";
    if (mysqli_query($db_con, $sql3)) {
        echo " <script>
        alert(\"Record Deleted successfully\");
        
window.location.href = \"logout.php\";

      </script>";
      } else {
        echo "Error deleting record: " . mysqli_error($db_con);
      }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Updated</title>
</head>
<body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

</body>
</html>

