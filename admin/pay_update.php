<?php

include "db_con.php";
$uid = $_POST["uid"];
if (isset($_POST['submit'])) {
    $pid = $_POST['pid'];
    $status = $_POST['sts'];



    $sql = "UPDATE purchases SET `pay_verify`=\"Success\"  WHERE purchase_id=\"$pid\"";
    $sql2 = "UPDATE payment SET `status`=\"$status\"  WHERE receipt_no=\"$uid\"";
    if (mysqli_query($db_con, $sql2)) {
        echo "
      <script>
        alert(\"Payment Approved successfully\");
        window.location.href = \"finance.php\";

      </script>";
    } else {
        echo "Error updating record: " . mysqli_error($db_con);
    }

    if (mysqli_query($db_con, $sql)) {
        echo "
      <script>
        alert(\"Verification successful\");
        window.location.href = \"finance.php\";

      </script>";
    } else {
        echo "Error updating record: " . mysqli_error($db_con);
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