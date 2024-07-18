<?php
// include 'db_con.php';

if (isset($_GET["id"])) {
    $uid = $_GET["id"];
    $id = base64_decode($uid);

    $sql = "SELECT  * FROM users WHERE user_id=\"$id\";";
    $result = mysqli_query($db_con, $sql);
    $sql1 = "SELECT  * FROM users;";
    $result1 = mysqli_query($db_con, $sql1);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $uname = $row["username"];
            $name = $row["name"];
            $mail = $row["email"];
            $pword = $row["password"];
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
                <h3 class="card-title"><b>UPDATE USER INFORMATION</b></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="user_update.php" method="POST">
                <div class="card-body">

                    <div class="form-group">
                        <label for="cy">USERNAME</label>
                        <input type="text" class="form-control" id="uname" name="uname" value="<?php echo $uname; ?>" required maxlength="12">
                    </div>

                    <div class="form-group">
                        <label for="cy">NAME</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" required maxlength="30">
                    </div>

                    <div class="form-group">
                        <label for="quantity">EMAIL</label>
                        <input type="email" class="form-control" id="mail" name="mail" value="<?php echo $mail; ?>" required maxlength="30">
                    </div>

                    <div class="form-group">
                        <label for="price">PASSWORD</label>
                        <input type="text" class="form-control" id="pword" name="pword" value="<?php echo $pword; ?>" required maxlength="50">
                    </div>

                    <div class="form-group">
                        <label for="description">ADDRESS</label>
                        <input type="text" class="form-control" id="add" name="add" value="<?php echo $add; ?>" required maxlength="100">
                    </div>

                    <input type="hidden" name="id" value="<?php echo $id; ?>">


                </div>
                <!-- /.card-body -->


                <div class="card-footer">

                    <!-- <button type="submit" class="btn btn-danger" name="delete">DELETE</button> -->
                    <button type="submit" class="btn btn-primary" name="submit">UPDATE</button>
                </div>

            </form>
        </div>

    </div>


</body>

</html>