<?php

if (isset($_GET['id'])) {
}
$corepage = explode('/', $_SERVER['PHP_SELF']);
$corepage = end($corepage);
if ($corepage !== 'index.php') {
  if ($corepage == $corepage) {
    $corepage = explode('.', $corepage);
    header('Location: index.php?page=' . $corepage[0]);
  }
}
$query = "SELECT * FROM suppliers";

$stage = mysqli_query($db_con, $query);


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
  <title>Add Supplier</title>
</head>

<body>
  <div class="col-md-6">
    <div class="card card-body">
      <div class="card-header">
        <center>
          <h2 class="page-header lead"><b> ADD SUPPLIER </b></h2><br>
        </center>
      </div>
      <form action="supplier_process.php" method=GET>
        <div class="form-group" class="col-md-6">
          Supplier ID <br> <input type="text" id="id" name="id" class="form-control"> <br>
        </div>

        <div class="form-group">
          Supplier Email <br> <input type="email" id="mail" name="mail" class="form-control"> <br>
        </div>

        <div class="form-group">
          Supplier Name <br> <input type="text" id="name" name="name" class="form-control" > <br>
        </div>

        <div class="form-group">
          Address <br> <input type="text" id="add" name="add" class="form-control"> <br>
        </div>



        <div>
          <button type="submit" class="btn btn-primary container col-sm-3 " name='submit'>Submit</button>
        </div>
      </form>

    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>