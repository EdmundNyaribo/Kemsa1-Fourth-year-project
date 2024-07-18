<?php
include 'db_con.php';

if (isset($_GET["uid"])) {
    $uid = $_GET["uid"];

    $sql = "SELECT  * FROM request WHERE request_id=\"$uid\";";
    $result = mysqli_query($db_con, $sql);


    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $rid = $row["request_id"];
            $pname = $row["prod_name"];
            $type = $row["type"];
            $quan = $row["quantity"];
            $cname = $row["client_name"];
            $sts = $row["status"];
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
    <div class="col-md-6" class="d-flex justify-content-center">
        <!-- general form elements -->
        <div class="card card-primary" class="d-flex justify-content-center">
            <div class="card-header" align="center">
                <h3 class="card-title"><b>UPDATE REQUEST STATUS</b></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="request_update.php" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label for="cy">REQUEST ID</label>
                        <input type="number" class="form-control" id="rno" name="rno" value="<?php echo $rid; ?>" required maxlength="12" readonly>
                    </div>

                    <div class="form-group">
                        <label for="cy">PRODUCT NAME</label>
                        <input type="text" class="form-control" id="pname" name="pname" value="<?php echo $pname; ?>" required maxlength="30" readonly>
                    </div>

                    <div class="form-group">
                        <label for="price">PRODUCT TYPE</label>
                        <input type="text" class="form-control" id="type" name="type" value="<?php echo $type; ?>" required maxlength="7" readonly>
                    </div>

                    <div class="form-group">
                        <label for="description">QUANTITY</label>
                        <input type="number" class="form-control" id="quan" name="quan" value="<?php echo $quan; ?>" required maxlength="100" readonly>
                    </div>

                    <div class="form-group">
                        <label for="quantity">CLIENT NAME</label>
                        <input type="text" class="form-control" id="cname" name="cname" value="<?php echo $cname; ?>" required maxlength="7" readonly>
                    </div>

                    <div class="form-group">
                        <label for="description">STATUS</label>
                        <br>
                        <select name="sts" id="sts" style="width:200px;">
                            <option value="Solved">Solved</option>
                            <option value="Pending" selected>Pending</option>
                        </select>
                    </div>

                    <input type="hidden" name="uid" value="<?php echo $uid; ?>">
                    <input type="hidden" name="pid" value="<?php echo $pid; ?>">


                </div>
                <!-- /.card-body -->


                <div class="card-footer">

                    <button type="submit" class="btn btn-primary" name="submit">UPDATE</button>
                </div>

            </form>
        </div>

    </div>


</body>

</html>