<?php
include 'db_con.php';



if (isset($_GET["uid"])) {
    $uid = $_GET["uid"];

    $sql = "SELECT  * FROM supplies WHERE batch_no=\"$uid\";";
    $result = mysqli_query($db_con, $sql);

    $sql1 = "SELECT  * FROM types;";
    $result1 = mysqli_query($db_con, $sql1);

    $sql2 = "SELECT  * FROM types;";
    $result2 = mysqli_query($db_con, $sql1);



    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $bno = $row["batch_no"];
            $pname = $row["prod_name"];
            $type = $row["type"];
            $quan = $row["quantity"];
            $sname = $row["supplier_name"];
            $sdate = $row["date_supplied"];
            $edate = $row["expiry_date"];
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
    <title>edits</title>
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
            <form role="form" action="supplies_update.php" method="POST">
                <div class="card-body">

                    <div class="form-group">
                        <label for="sel1">EDIT BATCH NUMBER:</label>
                        <br> <input type="text" id="bno" name="bno" value="<?php echo $bno; ?>" class="form-control" required maxlength="12">
                    </div>

                    <div class="form-group">
                        <label for="sel1">EDIT PRODUCT NAME:</label>
                        <br><input type="text" id="pname" name="pname" value="<?php echo $pname; ?>" class="form-control" required maxlength="30" readonly>
                    </div>

                    <div class="form-group">
                        <label for="sel1">EDIT PRODUCT TYPE:</label>
                        <br><input type="text" id="type" name="type" value="<?php echo $type; ?>" class="form-control" required maxlength="20" >
                    </div>



                    <div class="form-group">
                        <label for="sel1">EDIT QUANTITY:</label>
                        <br><input type="number" id="quan" name="quan" value="<?php echo $quan; ?>" class="form-control" required maxlength="30">
                    </div>

                    <div class="form-group">
                        <label for="sel1">EDIT SUPPLIER NAME:</label>
                        <br><input type="text" id="sname" name="sname" value="<?php echo $sname; ?>" class="form-control" required maxlength="30" readonly>
                    </div>

                    <div class="form-group">
                        <label for="sel1">DATE SUPPLIED :</label>
                        <br><input type="date" id="sdate" value="<?php echo $sdate; ?>" name="sdate" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="sel1">EXPIRY DATE :</label>
                        <br><input type="date" id="edate" name="edate" value="<?php echo $edate; ?>" class="form-control">
                    </div>

                    <input type="hidden" name="uid" value="<?php echo $uid; ?>">
                </div>


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