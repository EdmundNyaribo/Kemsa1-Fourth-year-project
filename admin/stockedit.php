<?php
include 'db_con.php';

if (isset($_GET["uid"])) {
    $uid = $_GET["uid"];

    $sql = "SELECT  * FROM stocks WHERE batch_no=\"$uid\";";
    $result = mysqli_query($db_con, $sql);
    $sql1 = "SELECT  * FROM types;";
    $result1 = mysqli_query($db_con, $sql1);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $bno = $row["batch_no"];
            $pname = $row["prod_name"];
            $type = $row["type"];
            $quan = $row["quantity"];
            $price = $row["unit_price"];
            $desc = $row["description"];
        }
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <title>EDIT</title>
</head>

<body style="background-color:#e6ffff; ">
    <br><br>
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary" class="d-flex justify-content-center">
            <div class="card-header" align="center">
                <h3 class="card-title"><b>UPDATE STOCK</b></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="stock_update.php" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label for="cy">BATCH NUMBER</label>
                        <input type="text" class="form-control" id="bno" name="bno" value="<?php echo $bno; ?>" required maxlength="12" readonly>
                    </div>

                    <!-- <div class="form-group">
                        <label for="sel1">SELECT PRODUCT NAME:</label>
                        <select class="form-control" id="code" name="code">
                            <?php
                            if (mysqli_num_rows($result1) > 0) {
                                while ($row = mysqli_fetch_assoc($result1)) {

                            ?>
                                    <option value="<?php echo $row["course_code"] ?>"><?php echo ucfirst($row["course_name"]) ?></option>


                            <?php
                                }
                            } else {
                                echo "0 results";
                            }

                            ?>
                        </select>
                    </div> -->

                    <div class="form-group">
                        <label for="cy">PRODUCT NAME</label>
                        <input type="text" class="form-control" id="pname" name="pname" value="<?php echo $pname; ?>" required maxlength="30" readonly>
                    </div>

                    <div class="form-group">
                        <label for="cy">PRODUCT TYPE</label>
                        <input type="text" class="form-control" id="type" name="type" value="<?php echo $type; ?>" required maxlength="50" readonly>
                    </div>

                    <div class="form-group">
                        <label for="quantity">QUANTITY</label>
                        <input type="number" class="form-control" id="quan" name="quan" value="<?php echo $quan; ?>" required maxlength="7" readonly>
                    </div>

                    <div class="form-group">
                        <label for="price">UNIT PRICE</label>
                        <input type="number" class="form-control" id="price" name="price" value="<?php echo $price; ?>" required maxlength="7" readonly>
                    </div>

                    <div class="form-group">
                        <label for="description">DESCRIPTION</label>
                        <input type="text" class="form-control" id="desc" name="desc" value="<?php echo $desc; ?>" required maxlength="100">
                    </div>

                    <input type="hidden" name="uid" value="<?php echo $uid; ?>">


                </div>
                <!-- /.card-body -->


                <div class="card-footer">

                    <button type="submit" class="btn btn-danger" name="delete">DELETE</button>
                    <button type="submit" class="btn btn-primary" name="submit">UPDATE</button>
                </div>

            </form>
        </div>

    </div>


</body>

</html>