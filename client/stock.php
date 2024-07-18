<?php

// include ('db_con.php');
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
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">STOCKS</h3>

                <!-- <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <button class="btn btn-primary " ><a href="addsupply.php" class="text-white"> ADD STOCK</a></button>
                            
                        </div>
                    </div> -->
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" >
                <table class="table  table-striped table-hover table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>PRODUCT</th>
                            <th>TYPE</th>
                            <th>QUANTITY</th>
                            <th>UNIT PRICE (KSH)</th>
                            <th>DESCRIPTION</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <td><?php echo $row["stock_id"] ?></td>
                                    <td><?php echo $row["prod_name"] ?></td>
                                    <td><?php echo $row["type"] ?></td>
                                    <td><?php echo $row["quantity"] ?></td>
                                    <td><?php echo $row["unit_price"] ?></td>
                                    <td><?php echo $row["description"] ?></td>
                                    <?php
                                    $id = base64_encode($row["batch_no"]);

                                    echo "
                                                <td><button  class='btn btn-success' style=\"background-color:white;\">
                                                  <a href='make_purchase.php?uid=$id '> Make Purchase</a> </button></td>"  ?>
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
    <title>Stock</title>
</head>

<body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>