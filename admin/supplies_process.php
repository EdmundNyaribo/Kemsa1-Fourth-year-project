<?php
include "db_con.php";
if (isset($_GET['submit'])) {
  $bno = mysqli_real_escape_string($db_con, $_GET['bno']);
  $pname = mysqli_real_escape_string($db_con, $_GET['pname']);
  $type = mysqli_real_escape_string($db_con, $_GET['type']);
  $quan = mysqli_real_escape_string($db_con, $_GET['quan']);
  $price = mysqli_real_escape_string($db_con, $_GET['price']);
  $sname = mysqli_real_escape_string($db_con, $_GET['sname']);
  $sdate = mysqli_real_escape_string($db_con, $_GET['sdate']);
  $edate = mysqli_real_escape_string($db_con, $_GET['edate']);
}

$qry = "SELECT * FROM `stocks` WHERE `prod_name`='$pname';";
$rst = mysqli_query($db_con, $qry);
if (mysqli_num_rows($rst) > 0) {
  while ($row = mysqli_fetch_assoc($rst)) {
    $name = $row["prod_name"];
    $equan = $row["quantity"];
  }


  if ($pname == $name) {
    $qty = intval($equan) + intval($quan);

    $sql2 = "UPDATE stocks SET quantity = $qty WHERE prod_name=\"$pname\"";

    $sql1 = "INSERT into supplies(`batch_no`,`prod_name`,`type`,`quantity`,`supplier_name`,`date_supplied`,`expiry_date`)
    values('$bno','$pname','$type','$quan',\"$sname\",'$sdate','$edate');";

    if (mysqli_query($db_con, $sql2)) {
      echo "
      <script>
      window.alert(\"Update made successfully\");
                
        window.location.href = \"supplies.php\";
        
              </script>";
    } else {
      echo "Error: " . $sql2 . "<br>" . mysqli_error($db_con);
    }

    if (mysqli_query($db_con, $sql1)) {
      echo "<script>
      window.alert(\"Supply Added successfully\");
                
        window.location.href = \"supplies.php\";
        
              </script>";
    } else {
      echo "Error: " . $sql1 . "<br>" . mysqli_error($db_con);
    }
  }
} else {

  $sql4 = "INSERT INTO supplies(`batch_no`,`prod_name`,`type`,`quantity`,`supplier_name`,`date_supplied`,`expiry_date`)
    values('$bno','$pname','$type','$quan','$sname','$sdate','$edate');";

  $sql3 = "INSERT INTO stocks(`batch_no`,`prod_name`,`type`,`quantity`,`unit_price`)
        values('$bno','$pname','$type','$quan','$price');";

  if (mysqli_query($db_con, $sql3)) {
    echo "
          <script>
                    window.alert(\"Stock Added successfully\");
                    
            window.location.href = \"supplies.php\";
            
                  </script>";
  } else {
    echo "Error: " . $sql3 . "<br>" . mysqli_error($db_con);
  }

  if (mysqli_query($db_con, $sql4)) {
    echo "<script>
    window.alert(\"Supply Added successfully\");
                
        window.location.href = \"supplies.php\";
        
              </script>";
  } else {
    echo "Error: " . $sql4 . "<br>" . mysqli_error($db_con);
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
  <title>Supply Process</title>
</head>

<body>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>