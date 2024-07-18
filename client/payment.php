<?php
include 'db_con.php';

if (isset($_GET["uid"])) {
    $uid = $_GET["uid"];

    $sql = "SELECT  * FROM purchases WHERE purchase_id=\"$uid\";";
    $result = mysqli_query($db_con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $pid = $row["purchase_id"];
            $pname = $row["prod_name"];
            $squan = $row["quantity"];
            $rprice = $row["cost"];
            // echo $pname;
        }
    }

    $sql1 = "SELECT  * FROM stocks WHERE prod_name = '$pname';";
    $result1 = mysqli_query($db_con, $sql1);

    if (mysqli_num_rows($result1) > 0) {
        while ($row = mysqli_fetch_assoc($result1)) {
            $quan = $row["quantity"];
            $stid = $row["stock_id"];
            // echo $stid;
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
    <title>PAYMENT</title>
</head>

<body style="background-color:#e6ffff; ">
    <br><br>
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary" class="d-flex justify-content-center">
            <div class="card-header" align="center">
                <h3 class="card-title"><b>MAKE PAYMENT</b></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="payment_process.php" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label for="cy">PURCHASE ID</label>
                        <input type="text" class="form-control" id="pid" name="pid" value="<?php echo $pid; ?>" required maxlength="12" readonly>
                    </div>



                    <div class="form-group">
                        <label for="cy">PRODUCT NAME</label>
                        <input type="text" class="form-control" id="pname" name="pname" value="<?php echo $pname; ?>" required maxlength="30" readonly>
                    </div>

                    <div class="form-group">
                        <label for="quantity">QUANTITY</label>
                        <input type="number" class="form-control" id="squan" name="squan" value="<?php echo $squan; ?>" required maxlength="7" readonly>
                    </div>

                    <div class="form-group">
                        <label for="price"><b> AMOUNT PAYABLE <?php echo $rprice ?></b></label>
                        <br><label for="price">TOTAL PAID</label>
                        <input type="number" class="form-control" id="price" name="price"  maxlength="7">
                    </div>



                    <input type="hidden" name="uid" value="<?php echo $uid; ?>">
                    <input type="hidden" name="stid" id="stid" value="<?php echo $stid; ?>">
                    <input type="hidden" name="quan" id="quan" value="<?php echo $quan; ?>">
                    <input type="hidden" name="rprice" id="rprice" value="<?php echo $rprice; ?>">
                    


                </div>
                <!-- /.card-body -->


                <div class="card-footer">
                    <button type="submit" class="btn btn-danger" name="remove" id="remove" >Remove from cart</button>
                    <button type="submit" class="btn btn-success" name="submit" id="submit" >Make Payment</button>
                    
                </div>

            </form>
        </div>

    </div>


</body>

</html>

<script>
    // function calculatequantity() {
    //     var squan = document.getElementById("squan").value;
    //     console.log(squan);
    //     var quan = document.getElementById("quan").value;
    //     console.log(quan);
    //     var nquan = document.getElementById("nquan").value;
        

    //     // var new
    // }
    // function checkpayment() {
    //     var r = document.getElementById("quan");
    //     var squan = document.getElementById("squan");
    //     document.g
    // }
</script>