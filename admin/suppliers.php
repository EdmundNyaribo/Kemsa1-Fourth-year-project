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
$sql = "SELECT * FROM suppliers";
$result = mysqli_query($db_con, $sql);
?>
<br> <br>
<div class="row container" syle="">

    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">SUPPLIERS</h3>
                <a href="printsupplier.php" ><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                  Supplier list
                </button></a>
                
                <div class="card-tools">
                <br><div class="input-group input-group-sm" style="width: 150px;">
                        <div class="input-group-append">
                            <button class="btn btn-primary"> <a href="addsupplier.php" class="text-white"> ADD A SUPPLIER</a> </button>

                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0" >
                <table class="table  table-striped table-hover table-bordered" id="data">
                    <thead class="thead-dark">
                        <tr>
                            <th>SUPPLIER ID</th>
                            <th>SUPPLIER EMAIL</th>
                            <th>SUPPLIER NAME</th>
                            <th>ADDRESS</th>
                            <th>EDIT</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <td><?php echo $row["supplier_id"] ?></td>
                                    <td><?php echo $row["supplier_email"] ?></td>
                                    <td><?php echo $row["supplier_name"] ?></td>
                                    <td><?php echo $row["address"] ?></td>
                                    <?php
                                    $id = $row["supplier_id"];
                                    echo "
                                                <td><button  class='btn btn-primary' style=\"background-color:white;\">
                                                  <a href='supplieredit.php?uid=$id  
                                                  '> Edit/Delete</a>               
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Suppliers</title>
</head>

<body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>