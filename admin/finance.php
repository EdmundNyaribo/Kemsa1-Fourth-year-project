<?php

if (!isset($_SESSION['user'])) {
    // header('Location: login.php');

}

$corepage = explode('/', $_SERVER['PHP_SELF']);
$corepage = end($corepage);
if ($corepage !== 'index.php') {
    if ($corepage == $corepage) {
        $corepage = explode('.', $corepage);
        header('Location: index.php?page=' . $corepage[0]);
    }
}
$sql = "SELECT * FROM payment";
$result = mysqli_query($db_con, $sql);
?>

<div class="col-sm-4">
    <div class="card text-white bg-info mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-4">
                    <i class="fas fa-dollar" style="font-size: 48px;"></i>
                </div>
                <div class="col-sm-8">
                    <div class="float-sm-right">Amount Recieved</div>
                    <div class="float-sm-right">&nbsp;<span style="font-size: 30px">
                            <?php $tusers = mysqli_query($db_con, 'SELECT SUM(paid_amount) AS "paysum" FROM `payment`');
                            $row = mysqli_fetch_assoc($tusers);
                            $sum = $row['paysum'];
                            

                            echo $sum; ?></span>
                    </div>
                    <div class="clearfix"></div>

                </div>
            </div>
        </div>
        <div class="list-group-item-primary list-group-item list-group-item-action">
            <a href="index.php?page=finance">
                <div class="row">
                    <div class="col-sm-8">
                        <p class="">All Finances</p>
                    </div>
                    <div class="col-sm-4">
                        <i class="fa fa-arrow-right float-sm-right"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<div class="row container">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">FINANCES</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 250px;">

                    </div>
                </div>
            </div>

                <table class="table  table-striped table-hover table-bordered" id="data">
                    <thead class="thead-dark">
                        <tr>
                            <th>RECIEPT NUMBER</th>
                            <th>PURCHASE ID</th>
                            <th>PRODUCT NAME</th>
                            <th>CLIENT NAME</th>
                            <th>DUE AMOUNT</th>
                            <th>PAID AMOUNT</th>
                            <th>STATUS </th>
                            <th>ACTION </th>


                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <td><?php echo $row["receipt_no"] ?></td>
                                    <td><?php echo $row["purchase_id"] ?></td>
                                    <td><?php echo $row["prod_name"] ?></td>
                                    <td><?php echo $row["client_name"] ?></td>
                                    <td><?php echo $row["due_amount"] ?></td>
                                    <td><?php echo $row["paid_amount"] ?></td>
                                    <td><?php echo $row["status"] ?></td>

                                    <?php
                                    $id = $row["receipt_no"];
                                    echo "
                                                <td><button  class='btn btn-primary' style=\"background-color:white;\">
                                                  <a href='payedit.php?uid=$id  
                                                  '> Edit</a>               
                </button></td>"  ?>
                        </tr>
                <?php
                                }
                            }
                ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Finance</title>
</head>

<body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>