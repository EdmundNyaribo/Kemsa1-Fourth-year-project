<?php
include 'ajaxkemsa.php';
$corepage = explode('/', $_SERVER['PHP_SELF']);
$corepage = end($corepage);
if ($corepage !== 'index.php') {
    if ($corepage == $corepage) {
        $corepage = explode('.', $corepage);
        header('Location: index.php?page=' . $corepage[0]);
    }
}

if (isset($_POST['addproduct'])) {

    $pname = filter_var($_POST['pname'], FILTER_SANITIZE_STRING);
    $type = filter_var($_POST['type'], FILTER_SANITIZE_STRING);
    $sname = filter_var($_POST['sname'], FILTER_SANITIZE_STRING);
    $smail = filter_var($_POST['smail'], FILTER_SANITIZE_STRING);


    $query = "INSERT INTO `products`(`prod_name`, `type`, `supplier_name`, `supplier_email`) 
    VALUES ('$pname', '$type', '$sname','$smail');";
    if (mysqli_query($db_con, $query)) {
        $datainsert['insertsucess'] = '<p style="color: green;">Product Inserted!</p>';
        echo $datainsert['insertsucess'];
    } else {
        $datainsert['inserterror'] = '<p style="color: red;">Product Not Inserted !!</p>';
        echo ($datainsert['inserterror'] . mysqli_error($db_con));
    }
}

?>

<?php

$query9 = "SELECT * FROM types";
$rslt = $db_con->query($query9);

$query1 = "SELECT * FROM suppliers";
$result = mysqli_query($db_con, $query1);

$query2 = "SELECT * FROM suppliers";
$result1 = mysqli_query($db_con, $query2);


?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="jquery.min.js"></script>
</head>

<div class="row">
    <div class="col-md-8">
        <?php if (isset($datainsert)) { ?>
            <div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-animation="true" data-delay="200">
                <div class="toast-header">
                    <strong class="mr-auto">Product Insert Alert</strong>
                    <small><?php echo date('d-M-Y'); ?></small>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    <?php
                    if (isset($datainsert['insertsucess'])) {
                        echo $datainsert['insertsucess'];
                    }
                    if (isset($datainsert['inserterror'])) {
                        echo $datainsert['inserterror'];
                    }
                    ?>
                </div>
            </div>
        <?php } ?>

        <script>
            $(document).ready(function() {
                $('.toast').toast('show');
            });
        </script>

        <div class="col-md-8 ">
            <div class="card card-body">
                <!-- general form elements -->
                <div class="card card-primary" class="d-flex justify-content-center">
                    <div class="card-header" align="center">
                        <h3 class="card-title"><b>ADD PRODUCT</b></h3>
                    </div>
                </div>
                <form method="POST" action="" class="container " style="width: 75%;">

                    <div class="form-group">
                        PRODUCT NAME <br><input type="text" id="pname" name="pname" class="form-control" required maxlength="50" >
                    </div>

                    <div class="form-group">
                        <label for="school">PRODUCT TYPE</label>
                        <select name="type" id="type" class="form-control" required>
                            <?php
                            if (mysqli_num_rows($rslt) > 0) {
                                while ($row = mysqli_fetch_assoc($rslt)) {

                            ?>
                                    <option value="<?php echo $row["type_name"] ?>"><?php echo ucfirst($row["type_name"]) ?></option>


                            <?php
                                }
                            } else {
                                echo "0 results";
                            }

                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="sel1">SELECT SUPPLIER NAME:</label>
                        <select class="form-control" id="sname" name="sname" onchange="Fetchmail(this.value)" required>
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {

                            ?>
                                    <option value="<?php echo $row["supplier_name"] ?>"><?php echo ucfirst($row["supplier_name"]) ?></option>


                            <?php
                                }
                            } else {
                                echo "0 results";
                            }

                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="sel1">SELECT SUPPLIER EMAIL:</label>
                        <select class="form-control" id="smail" name="smail" required>
                            <?php
                            if (mysqli_num_rows($result1) > 0) {
                                while ($row = mysqli_fetch_assoc($result1)) {

                            ?>
                                    <option value="<?php echo $row["supplier_email"] ?>"><?php echo ucfirst($row["supplier_email"]) ?></option>


                            <?php
                                }
                            } else {
                                echo "0 results";
                            }

                            ?>
                        </select>
                    </div>



                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-info" name="addproduct"> Submit </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>





<script type="text/javascript">
    function Fetchmail(id) {


        $('#smail').html('');

        $.ajax({
            type: 'POST',
            url: 'ajaxkemsa.php',
            data: {
                supplier_name: id
            },
            success: function(data) {
                $('#smail').html(data);
            }

        })

    }
</script>