<?php
if (!isset($_SESSION['user'])) {
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

$query3 = "SELECT * FROM products";
$result3 = mysqli_query($db_con, $query3);

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
  <title>REQUEST FOR MORE STOCKS</title>
</head>

<body style="background-color:#e6ffff; ">

  <div class="col-md-6">
    <div class="card card-body">
      <div class="card-header">
        <center>
          <h2 class="page-header lead"><b> REQUEST FOR MORE STOCKS </b></h2><br>
        </center>
      </div>
      <form action="request_process.php" method="GET" class="container " style="width: 75%;">


        <div class="form-group">
          <label for="sel1">SELECT PRODUCT NAME:</label>
          <select class="form-control" id="pname" name="pname" onchange="Fetchtype(this.value)" required>
            <option>Select Product Name</option>
            <?php
            if (mysqli_num_rows($result3) > 0) {
              while ($row = mysqli_fetch_assoc($result3)) {

            ?>
                <option value="<?php echo $row["prod_name"] ?>"><?php echo ucfirst($row["prod_name"]) ?></option>


            <?php
              }
            } else {
              echo "0 results";
            }

            ?>
          </select>
        </div>

        <div class="form-group">
          <label for="sel1">PRODUCT TYPE:</label>
          <select class="form-control" id="type" name="type" required>
            <option>Select Product Type</option>
          </select>
        </div>

        <div class="form-group">
          <label for="price">ENTER QUANTITY</label>
          <input type="number" class="form-control" id="quan" name="quan" required maxlength="10" >
        </div>

        <button type="submit" class="btn btn-info" name="submit"> Submit information</button>

      </form>
    </div>
  </div>
</body>

</html>

<script type="text/javascript">
  function Fetchtype(id) {
    $('#type').html('');

    $.ajax({
      type: 'POST',
      url: 'ajaxkemsa.php',
      data: {
        prod_name: id
      },
      success: function(data) {
        $('#type').html(data);
      }
    })
  }
</script>