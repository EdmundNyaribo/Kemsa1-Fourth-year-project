<?php

include "db_con.php";
$uid = $_POST["uid"];
if (isset($_POST['submit']) ) {
  
  
  $id=$_POST['id'];
  $mail=$_POST['mail'];
  $name=$_POST['name'];
  $add=$_POST['add'];
  

  $sql="UPDATE suppliers SET supplier_id=\"$id\",supplier_email=\"$mail \",supplier_name=\"$name \",suppliers.address=\"$add \"  WHERE supplier_id=\"$uid\"";
  if (mysqli_query($db_con, $sql)) {
    echo "
      <script>
        alert(\"Supplier Updated Successfully\");
        
window.location.href = \"suppliers.php\";

      </script>";
      
      } else {
        echo "Error Updating Supplier: " . mysqli_error($db_con);
      }
      
} elseif (isset($_POST['delete'])) {
    $sql3="DELETE FROM suppliers WHERE supplier_id=\"$uid\"";
    if (mysqli_query($db_con, $sql3)) {
        echo " <script>
        alert(\"Supplier Deleted Successfully\");
        
window.location.href = \"suppliers.php\";

      </script>";
      } else {
        echo "Error Deleting Supplier: " . mysqli_error($db_con);
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

