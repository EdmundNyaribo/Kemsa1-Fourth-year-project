<?php
include '..\admin\db_con.php';
session_start();
if (isset($_GET["uid"])) {
    $uid = base64_decode($_GET["uid"]);

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
    <div class="col-md-4">
        <!-- general form elements -->
        <div class="card card-primary" class="d-flex justify-content-center">
            <div class="card-header" align="center">
                <h3 class="card-title"><b>PURCHASE STOCK</b></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="purchase_process.php" method="POST">
                <div class="card-body">
                    <!-- <div class="form-group">
                        <label for="cy">BATCH NUMBER</label>
                        <input type="text" class="form-control" id="bno" name="bno" value="<?php echo $bno; ?>" required maxlength="12" disabled>
                    </div> -->

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
                        <label for="quantity"><b>QUANTITY AVAILABLE = <?php echo $quan; ?></b></label>
                        <br><label for="quantity">SELECT QUANTITY TO PURCHASE</label>
                        <input type="number" class="form-control" id="quan" name="quan" max="<?php echo $quan; ?>" onchange="calculatePrice(this.value)" required maxlength="7">
                    </div>

                    <!-- <div class="form-group">
                        <label for="quantity">PRICE</label>
                        <input type="number" class="form-control" id="price" name="price"  required maxlength="7"disabled >
                    </div> -->

                    <div class="form-group">
                        <label for="price">TOTAL PRICE</label>
                        <input type="number" class="form-control" id="price" name="price" required maxlength="10" readonly>
                    </div>

                    <div class="form-group">
                        <label for="description">DESCRIPTION</label>
                        <input type="text" class="form-control" id="desc" name="desc" value="<?php echo $desc; ?>" required maxlength="100">
                    </div>

                    <input type="hidden" name="uid" value="<?php echo $uid; ?>">
                    <input type="hidden" name="uprice" id="uprice" value="<?php echo $price; ?>">


                </div>
                <!-- /.card-body -->


                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="submit">Make Purchase</button>
                </div>

            </form>
        </div>

    </div>


</body>

</html>

<script>
    function calculatePrice(quan) {
        var uprice = document.getElementById("uprice");
        var Price = quan * uprice.value;

        var priceval = document.getElementById("price");
        priceval.value = Price;
    }
</script>