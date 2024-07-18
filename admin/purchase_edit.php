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
            $quan = $row["quantity"];
            $cname = $row["client_name"];
            $cmail = $row["email"];
            $dop = $row["DOP"];
            $cost = $row["cost"];
            $sts = $row["pay_status"];            
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
    <link rel="stylesheet" href="assets/css1/style.css">
    <title>Purchase Edit</title>
</head>

<body>
    <br><br>
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">UPDATE DETAILS</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="purchase_update.php" method="POST">
                <div class="card-body">
                <div class="form-group">
                        <label for="sel1">PURCHASE ID:</label>
                        <br><input type="text" id="pid" name="pid" value="<?php echo $pid; ?>" class="form-control" required maxlength="20" disabled>
                    </div>

                    <div class="form-group">
                        <label for="sel1">PRODUCT:</label>
                        <br><input type="text" id="pname" name="pname" value="<?php echo $pname; ?>" class="form-control" required maxlength="50" readonly>
                    </div>

                    <div class="form-group">
                        <label for="sel1">QUANTITY:</label>
                        <br><input type="number" id="quan" name="quan" value="<?php echo $quan; ?>" onchange="calculatePrice(this.value)" class="form-control" required maxlength="30" readonly>
                    </div>

                    <div class="form-group">
                        <label for="sel1">CLIENT NAME:</label>
                        <br><input type="text" id="cname" name="cname" value="<?php echo $cname; ?>" class="form-control" required maxlength="35" readonly>
                    </div>

                    <div class="form-group">
                        <label for="sel1">CLIENT EMAIL :</label>
                        <br><input type="email" id="cmail" name="cmail" value="<?php echo $cmail; ?>"  class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="sel1">PURCHASE DATE :</label>
                        <br><input type="date" id="dop" name="dop" value="<?php echo $dop; ?>" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label for="sel1">COST :</label>
                        <br><input type="number" id="cost" name="cost" value="<?php echo $cost; ?>" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="sel1">STATUS :</label>
                        <br><input type="text" id="sts" name="sts" value="<?php echo $sts; ?>" class="form-control" disabled>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>

<?php 
$sql1 = "SELECT  * FROM stocks WHERE prod_name=\"$pname\";";
$result1 = mysqli_query($db_con, $sql1);

if (mysqli_num_rows($result1) > 0) {
    while ($row = mysqli_fetch_assoc($result1)) {
        $uprice = $row["unit_price"];
    }
}

?>

<input type="hidden" name="uprice" id="uprice" value="<?php echo $uprice; ?>">

<script>
    function calculatePrice(quan) {
        var uprice = document.getElementById("uprice");
        var Price = quan * uprice.value;

        var priceval = document.getElementById("cost");
        priceval.value = Price;
    }
</script>