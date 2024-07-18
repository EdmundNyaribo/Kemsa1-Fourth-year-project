<?php

$corepage = explode('/', $_SERVER['PHP_SELF']);
$corepage = end($corepage);
if ($corepage !== 'index.php') {
    if ($corepage == $corepage) {
        $corepage = explode('.', $corepage);
        header('Location: index.php?page=' . $corepage[0]);
    }
}
$sql = "SELECT * FROM purchases";
$result = mysqli_query($db_con, $sql);

?>


<br><br>
<div class="row container">
    <div class="col-15">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Purchases</h3>
                <a href="printpurchase.php"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                        Purchases Report
                    </button></a>

                
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="display: contents;">
                <table class="table  table-striped table-hover table-bordered" id="data">
                    <thead class="thead-dark">
                        <tr>
                            <th>PURCHASE ID</th>
                            <th>PRODUCT NAME</th>
                            <th>QUANTITY</th>
                            <th>CLIENT NAME</th>
                            <th>EMAIL</th>
                            <th>PURCHASE DATE</th>
                            <th>COST</th>
                            <th>STATUS</th>
                            <th>PAYMENT VERIFICATION</th>
                            <th>EDIT</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <td><?php echo $row["purchase_id"] ?></td>
                                    <td><?php echo $row["prod_name"] ?></td>
                                    <td><?php echo $row["quantity"] ?></td>
                                    <td><?php echo $row["client_name"] ?></td>
                                    <td><?php echo $row["email"] ?></td>
                                    <td><?php echo $row["DOP"] ?></td>
                                    <td><?php echo $row["cost"] ?></td>
                                    <td><?php echo $row["pay_status"] ?></td>
                                    <td><?php echo $row["pay_verify"] ?></td>
                                    <?php
                                    $id = $row["purchase_id"];
                                    echo "
                                                <td><button  class='btn btn-primary' style=\"background-color:white;\">
                                                  <a href='purchase_edit.php?uid=$id  
                                                  '> EDIT/DELETE</a>               
                </button></td>"  ?>
                        </tr>
                <?php
                                }
                            }
                ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>

        <!-- /.card -->
    </div>

</div>

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
    <title>DEPARTMENT</title>
</head>

<body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>