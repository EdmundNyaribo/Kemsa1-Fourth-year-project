<?php
include 'db_con.php';

session_start();
$ses = $_SESSION['user_login'];
$sql = "SELECT * FROM `users` WHERE `username`='$ses';";
$result = mysqli_query($db_con, $sql);
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $name = $row["name"];
  }
}

$rno =  uniqid(rand(), true);
if (isset($_POST['submit'])) {
  $pid = mysqli_real_escape_string($db_con, $_POST['pid']);
  $pname = mysqli_real_escape_string($db_con, $_POST['pname']);
  $stid = mysqli_real_escape_string($db_con, $_POST['stid']);
  $squan = mysqli_real_escape_string($db_con, $_POST['squan']);
  $rprice = mysqli_real_escape_string($db_con, $_POST['rprice']);
  $price = mysqli_real_escape_string($db_con, $_POST['price']);
  $quan = mysqli_real_escape_string($db_con, $_POST['quan']);

  $nquan = intval($quan) - intval($squan);

  if ($price == $rprice) {
    # code...


    $sql1 = "UPDATE purchases SET purchases.pay_status='Success' WHERE purchase_id = '$pid'";
    $sql2 = "INSERT INTO payment VALUES ('$rno','$pid','$pname','$name','$rprice','$price','Not Approved')";
    $sql3 = "UPDATE stocks SET quantity='$nquan' WHERE stock_id = '$stid'";
    if (mysqli_query($db_con, $sql1)) {
      echo "
    <script>
    alert(\" Payment Made successfully\");
    window.location.href = \"dashboard.php\";
  </script>";
    } else {
      echo "Error updating record: " . mysqli_error($db_con);
    }
    if (mysqli_query($db_con, $sql2)) {
      echo "
        <script>
          alert(\"QUery2 Made successfully\");
          window.location.href = \"dashboard.php\";
        </script>";
    } else {
      echo "Payment Not Made: " . mysqli_error($db_con);
    }
    if (mysqli_query($db_con, $sql3)) {
      echo "
        <script>
          alert(\"Update Made successfully\");
          window.location.href = \"dashboard.php\";
  
        </script>";
    } else {
      echo "Payment Not Made: " . mysqli_error($db_con);
    }
  } else {
    echo "
    <script>
    alert(\" Kindly Pay The Full Amount... Thank You\");
    window.location.href = \"dashboard.php\";
  </script>";
  }
} elseif (isset($_POST['remove'])) {
  $pid = mysqli_real_escape_string($db_con, $_POST['pid']);

  $sql2 = "DELETE FROM purchases WHERE purchase_id = '$pid'";


  if (mysqli_query($db_con, $sql2)) {
    echo " <script>
        alert(\"Purchase Record Deleted successfully\");
        window.location.href = \"stock.php\";
        


      </script>";
  } else {
    echo "Error Deleting Supply record: " . mysqli_error($db_con);
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
  <title>Payment Process</title>
</head>

<body>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>