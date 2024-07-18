<?php
include 'db_con.php';

if (isset($_GET["uid"])) {
    $uid = $_GET["uid"];

    $sql = "SELECT  * FROM suppliers WHERE supplier_id=\"$uid\";";
    $result = mysqli_query($db_con, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row["supplier_id"];
            $mail = $row["supplier_email"];
            $name = $row["supplier_name"];
            $add = $row["address"];
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
                <h3 class="card-title">UPDATE SUPPLIER DETAILS</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="supplierupdate.php" method="POST">
                <div class="card-body">

                    <div class="form-group">
                        <label for="building">SUPPLIER ID</label>
                        <input type="text" class="form-control" id="id" name="id" value="<?php echo $id; ?>" required maxlength="30">
                    </div>

                    <div class="form-group">
                        <label for="building">SUPPLIER EMAIL</label>
                        <input type="text" class="form-control" id="mail" name="mail" value="<?php echo $mail; ?>" required maxlength="30">
                    </div>

                    <div class="form-group">
                        <label for="building">SUPPLIER NAME</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" required maxlength="30">
                    </div>

                    <div class="form-group">
                        <label for="building">ADDRESS</label>
                        <input type="text" class="form-control" id="add" name="add" value="<?php echo $add; ?>" required maxlength="30">
                    </div>


                    <input type="hidden" name="uid" value="<?php echo $uid; ?>">


                </div>
                <!-- /.card-body -->


                <div class="card-footer">

                    <button type="submit" class="btn btn-danger" name="delete">Delete</button>
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