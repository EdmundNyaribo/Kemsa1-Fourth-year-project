<?php


if (!isset($_SESSION['user'])) {
    // header('Location: login.php');
    echo "Welcome";
}


$corepage = explode('/', $_SERVER['PHP_SELF']);
$corepage = end($corepage);
if ($corepage !== 'index.php') {
    if ($corepage == $corepage) {
        $corepage = explode('.', $corepage);
        header('Location: index.php?page=' . $corepage[0]);
    }
}

$query = "SELECT * FROM types";
$dept = mysqli_query($db_con, $query);

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
    <title>STOCK</title>
</head>

<body style="background-color:#e6ffff; ">


    <div class="col-md-6">
        <center>
            <h2 class="page-header lead"> <b> ADD STOCK </b> </h2>
        </center>
        <form action="stock_process.php" method="GET" class="container " style="width: 75%;">

            <div class="form-group">
                <div class="form-group">
                    ENTER BATCH NUMBER <br><input type="text" id="bno" name="bno" class="form-control" required maxlength="30">
                </div>

                <div class="form-group">
                    ENTER PRODUCT NAME <br><input type="text" id="pname" name="year" class="form-control" required maxlength="30">
                </div>

                <label for="sel1">ENTER PRODUCT TYPE:</label>
                <select class="form-control" id="code" name="code" required>
                    <?php
                    if (mysqli_num_rows($dept) > 0) {
                        while ($row = mysqli_fetch_assoc($dept)) {

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
                QUANTITY <br><input type="number" id="cap" name="cap" class="form-control" required maxlength="7">
            </div>

            <div class="form-group">
                SELLING PRICE <br><input type="number" id="sp" name="sp" class="form-control" required maxlength="7">
            </div>

            <div class="form-group">
                DESCRIPTION <br><input type="text" id="des" name="des" class="form-control" required maxlength="100">
            </div>

            <button type="submit" class="btn btn-info" name="submit"> Submit information</button>

        </form>
    </div>


</body>

</html>