<?php

include "db_con.php";
$uid = $_POST["uid"];
if (isset($_POST['submit'])) {


  $bno = $_POST['bno'];
  $pname = $_POST['pname'];
  $type = $_POST['type'];
  $quan = $_POST['quan'];
  $sname = $_POST['sname'];
  $sdate = $_POST['sdate'];
  $edate = $_POST['edate'];


  $sql = "UPDATE supplies SET batch_no=\"$bno \",prod_name=\"$pname \",supplies.type=\"$type \",quantity=\"$quan\",supplier_name=\"$sname \",date_supplied=\"$sdate \",expiry_date =\"$edate\"  WHERE batch_no=\"$uid\"";
  $sql1 = "UPDATE stocks SET batch_no=\"$bno \",prod_name=\"$pname \",stocks.type=\"$type \",quantity=\"$quan\"  WHERE batch_no=\"$uid\"";
  if (mysqli_query($db_con, $sql)) {
    echo "
      <script>
        alert(\"Supply Record updated successfully\");
        
window.location.href = \"supplies.php\";

      </script>";
  } else {
    echo "Error updating record: " . mysqli_error($db_con);
  }
  if (mysqli_query($db_con, $sql1)) {
    echo "
          <script>
            alert(\"Stock Record updated successfully\");
            
    window.location.href = \"supplies.php\";
    
          </script>";
  } else {
    echo "Error updating record: " . mysqli_error($db_con);
  }
} elseif (isset($_POST['delete'])) {
  $sql2 = "DELETE FROM supplies WHERE batch_no=\"$uid\"";
  $sql3 = "DELETE FROM stocks WHERE batch_no=\"$uid\"";

  if (mysqli_query($db_con, $sql2)) {
    echo " <script>
        alert(\"Supply Record Deleted successfully\");
        
window.location.href = \"supplies.php\";

      </script>";
  } else {
    echo "Error Deleting Supply record: " . mysqli_error($db_con);
  }

  if (mysqli_query($db_con, $sql3)) {
    echo " <script>
        alert(\"Stock Record Deleted successfully\");
        
window.location.href = \"supplies.php\";

      </script>";
  } else {
    echo "Error Deleting Stock record: " . mysqli_error($db_con);
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