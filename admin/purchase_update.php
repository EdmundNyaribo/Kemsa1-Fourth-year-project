<?php

include "db_con.php";
$uid = $_POST["uid"];
if (isset($_POST['submit'])) {
  $quan = $_POST['quan'];
  $dop = $_POST['dop'];
  $cost = $_POST['cost'];

  $sql2 = "UPDATE purchases SET quantity=\"$quan\",DOP=\"$dop \",cost=\"$cost \"  WHERE purchase_id=\"$uid\"";
  if (mysqli_query($db_con, $sql2)) {
    echo "
      <script>
        alert(\"Purchase Updated Successfully\");
        
        window.location.href = \"purchases.php\";

      </script>";
    
  } else {
    echo "Error Updating Purchase: " . mysqli_error($db_con);
  }
} elseif (isset($_POST['delete'])) {
  $sql3 = "DELETE FROM purchases WHERE purchase_id=\"$uid\"";
  if (mysqli_query($db_con, $sql3)) {
    echo " <script>
        alert(\"Purchase Deleted Successfully\");
        
window.location.href = \"purchases.php\";

      </script>";
  } else {
    echo "Error Deleting Purchase: " . mysqli_error($db_con);
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
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Updated</title>
</head>

<body>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

</body>

</html>