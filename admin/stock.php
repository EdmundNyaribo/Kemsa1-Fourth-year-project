<?php


$corepage = explode('/', $_SERVER['PHP_SELF']);
$corepage = end($corepage);
if ($corepage !== 'index.php') {
    if ($corepage == $corepage) {
        $corepage = explode('.', $corepage);
        header('Location: index.php?page=' . $corepage[0]);
    }
}
$sql = "SELECT * FROM stocks";
$result = mysqli_query($db_con, $sql);



?>


<br><br>
<div class="row container">
    <div class="col-md-15">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">STOCKS</h3>
                <a href="printstock.php"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                        Stocks Report
                    </button></a>

                <div class="card-tools">
                    <br>
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <button class="btn btn-primary "><a href="addsupply.php" class="text-white"> ADD STOCK</a></button>

                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table  table-striped table-hover table-bordered" id="data">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>BATCH NUMBER</th>
                            <th>PRODUCT NAME</th>
                            <th>TYPE</th>
                            <th>QUANTITY</th>
                            <th>UNIT PRICE (KSH)</th>
                            <th>DESCRIPTION</th>
                            <th>STOCK LEVEL</th>
                            <th>EDIT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <td><?php echo $row["stock_id"] ?></td>
                                    <td><?php echo $row["batch_no"] ?></td>
                                    <td><?php echo $row["prod_name"] ?></td>
                                    <td><?php echo $row["type"] ?></td>
                                    <td><?php echo $row["quantity"] ?></td>
                                    <td><?php echo $row["unit_price"] ?></td>
                                    <td><?php echo $row["description"] ?></td>

                                    <?php if ($row["quantity"] <= 10000) : ?>


                                        <?php

                                        $id = $row["prod_name"];
                                        echo "
<td>
<div class='alert alert-danger' >
<i class=\"fas fa-exclamation-triangle  fa-1x\" ><br>Kindly Restock</i> 
</div>
</td>"
                                        ?>
                                    <?php endif  ?>

                                    <?php if ($row["quantity"] <= 25000 and $row["quantity"] >= 10001) : ?>


                                        <?php

                                        $id = $row["prod_name"];
                                        echo "
<td>
<div class='alert alert-warning' >
<i class=\"fas fa-battery-half fa-2x\" ><br></i> 
</div>
</td>"
                                        ?>
                                    <?php endif  ?>

                                    <?php if ($row["quantity"] >= 25001) : ?>


                                        <?php

                                        $id = $row["prod_name"];
                                        echo "
<td>
<div class='alert alert-success' >
<i class=\"fas fa-battery-full fa-2x\" ><br></i> 
</div>
</td>"
                                        ?>
                                    <?php endif  ?>

                        

                        <?php
                                    $id = $row["batch_no"];
                                    echo "
                                                <td><button  class='btn btn-primary' style=\"background-color:white;\">
                                                  <a href='stockedit.php?uid=$id  
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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../css/fontawesome.min.css">
    <link rel="stylesheet" href="../css/solid.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap4.min.js"></script>
    <script src="../js/fontawesome.min.js"></script>
    <script src="../js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

    <title>Stocks</title>
</head>

<body>


</body>

</html>