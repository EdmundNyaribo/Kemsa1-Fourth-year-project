<?php
include 'db_con.php';

// if (isset($_GET["uid"])) {
//     $uid = base64_decode($_GET["uid"]);

//     $sql = "SELECT  * FROM stocks WHERE batch_no=\"$uid\";";
//     $result = mysqli_query($db_con, $sql);
//     $sql1 = "SELECT  * FROM types;";
//     $result1 = mysqli_query($db_con, $sql1);

//     if (mysqli_num_rows($result) > 0) {
//         while ($row = mysqli_fetch_assoc($result)) {
//             $bno = $row["batch_no"];
//             $pname = $row["prod_name"];
//             $type = $row["type"];
//             $quan = $row["quantity"];
//             $price = $row["unit_price"];
//             $desc = $row["description"];
//         }
//     }
// }


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
    <title>Sign Up</title>
</head>

<body style="background-image: url('../images/Functions.png');">
    <br><br>
    <div class="col-md-4 offset-md-4">
        <!-- general form elements -->
        <div class="card card-primary" class="d-flex justify-content-center">
            <div class="card-header" align="center">
                <h3 class="card-title"><b>SIGN UP</b></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <div class="row animate__animated animate__pulse" align="center">
                <form role="form" action="signup_process.php" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="cy"><b> NAME</b></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                        </div>

                        <div class="form-group">
                            <label for="cy"><b>USERNAME</b></label>
                            <input type="text" class="form-control" id="uname" name="uname" placeholder="Username" required maxlength="30">
                        </div>

                        <div class="form-group">
                            <label for="cy"><b>EMAIL</b></label>
                            <input type="email" class="form-control" id="mail" name="mail" placeholder="email@gmail.com">
                        </div>

                        <div class="form-group">
                            <label for="quantity"><b>PASSWORD</b></label>
                            <input type="text" class="form-control" id="pwd" name="pwd" placeholder="Password">
                        </div>

                        <div class="form-group">
                            <label for="quantity"><b>CONFIRM PASSWORD</b></label>
                            <input type="text" class="form-control" id="cpwd" name="cpwd" placeholder="Confirm Password">
                        </div>

                        <div class="form-group">
                            <label for="price"><b>ADDRESS</b></label>
                            <input type="text" class="form-control" id="add" name="add" placeholder="Nairobi, Kenya" onkeyup="checkadd()" required maxlength="30">
                            <span id="address"></span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="submit" name="submit">Sign Up</button>
                        </div>
                    </div>

                </form>
                <!-- form end -->
            </div>
        </div>

    </div>


</body>

</html>

<script>
    function checkadd() {
        jQuery.ajax({
            url: "val.php",
            data: 'add=' + $("#add").val(),
            type: "POST",
            success: function(data) {
                $("#address").html(data);

            },
            error: function() {}
        });
    }
</script>