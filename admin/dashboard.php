<?php
$corepage = explode('/', $_SERVER['PHP_SELF']);
$corepage = end($corepage);
if ($corepage !== 'index.php') {
  if ($corepage == $corepage) {
    $corepage = explode('.', $corepage);
    header('Location: index.php?page=' . $corepage[0]);
  }
}



$query = ('SELECT * FROM stocks;');
$result = mysqli_query($db_con, $query);

?>

<h1><a href="index.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a> <small>Statistics Overview</small></h1>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user"></i> Dashboard</li>
  </ol>
</nav>

<div class="row student">
  <div class="col-sm-4">
    <div class="card text-white bg-primary mb-3">
      <div class="card-header">
        <div class="row">
          <div class="col-sm-4">
            <i class="fa fa-users fa-3x"></i>
          </div>
          <div class="col-sm-8">
            <div class="float-sm-right">&nbsp;<span style="font-size: 30px"><?php $stu = mysqli_query($db_con, 'SELECT * FROM `supplies`');
                                                                            $stu = mysqli_num_rows($stu);
                                                                            echo $stu; ?></span></div>
            <div class="clearfix"></div>
            <div class="float-sm-right">SUPPLIES</div>
          </div>
        </div>
      </div>
      <div class="list-group-item-primary list-group-item list-group-item-action">
        <a href="index.php?page=supplies">
          <div class="row">
            <div class="col-sm-8">
              <p class="">All Supplies</p>
            </div>
            <div class="col-sm-4">
              <i class="fa fa-arrow-right float-sm-right"></i>
            </div>
          </div>
        </a>
      </div>
    </div>

  </div>


  <div class="col-sm-4">
    <div class="card text-white bg-info mb-3">
      <div class="card-header">
        <div class="row">
          <div class="col-sm-4">
            <i class="fa fa-users fa-3x"></i>
          </div>
          <div class="col-sm-8">
            <div class="float-sm-right">&nbsp;<span style="font-size: 30px"><?php $tusers = mysqli_query($db_con, 'SELECT * FROM `purchases`');
                                                                            $tusers = mysqli_num_rows($tusers);
                                                                            echo $tusers; ?></span></div>
            <div class="clearfix"></div>
            <div class="float-sm-right">PURCHASES</div>
          </div>
        </div>
      </div>
      <div class="list-group-item-primary list-group-item list-group-item-action">
        <a href="index.php?page=purchases">
          <div class="row">
            <div class="col-sm-8">
              <p class="">All Purchases</p>
            </div>
            <div class="col-sm-4">
              <i class="fa fa-arrow-right float-sm-right"></i>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="card text-white bg-warning mb-3">
      <div class="card-header">
        <div class="row">
          <?php $usernameshow = $_SESSION['user_login'];
          $userspro = mysqli_query($db_con, "SELECT * FROM `users` WHERE `username`='$usernameshow';");
          $userrow = mysqli_fetch_array($userspro); ?>
          <div class="col-sm-6">
            <!-- <img class="showimg" src="images/<?php echo $userrow['photo']; ?>"> -->
            <div style="font-size: 20px"><?php echo ucwords($userrow['name']); ?></div>
          </div>
          <div class="col-sm-6">

            <div class="clearfix"></div>
            <div class="float-sm-right">Welcome!</div>
          </div>
        </div>
      </div>
      <div class="list-group-item-primary list-group-item list-group-item-action">
        <a href="index.php?page=user-profile">
          <div class="row">
            <div class="col-sm-8">
              <p class="">Your Profile</p>
            </div>
            <div class="col-sm-4">
              <i class="fa fa-arrow-right float-sm-right"></i>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>

<hr>


<table class="table  table-striped table-hover table-bordered" id="data">
  <thead class="thead-dark">
    <tr>
      <th><b>STOCKS</b></th>
      
    </tr>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Product</th>
      <th scope="col">Type</th>
      <th scope="col">Quantity</th>
      <th scope="col">Unit Price(KSH)</th>
      <th scope="col">Description</th>
      <th scope="col">Stock level</th>


    </tr>
  </thead>
  <tbody>
    <?php

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <td><?php echo $row["stock_id"] ?></td>
        <td><?php echo $row["prod_name"] ?></td>
        <td><?php echo $row["type"] ?></td>
        <td><?php echo $row["quantity"] ?></td>
        <td><?php echo $row["unit_price"] ?></td>
        <td><?php echo $row["description"] ?></td>


        <?php if ($row["quantity"] <= 10000) : ?>


          <?php

          $id = $row["prod_name"];
          echo "
<td>
<div class='alert alert-danger' >
<i class=\"fas fa-exclamation-triangle  fa-1x\" ><br>Kindly Restock</i> 
        </div>
        </td>"
          ?>
        <?php endif  ?>

        <?php if ($row["quantity"] <= 25000 AND $row["quantity"] >= 10001) : ?>


          <?php

          $id = $row["prod_name"];
          echo "
<td>
<div class='alert alert-warning' >
<i class=\"fas fa-battery-half fa-2x\" ><br></i> 
</div>
</td>"
          ?>
        <?php endif  ?>

        <?php if ($row["quantity"] >= 25001) : ?>


          <?php

          $id = $row["prod_name"];
          echo "
<td>
<div class='alert alert-success' >
<i class=\"fas fa-battery-full fa-2x\" ><br></i> 
</div>
</td>"
          ?>
        <?php endif  ?>

        </tr>

    <?php
      }
    }
    ?>



  </tbody>
</table>



<script type="text/javascript">
  function goToNewPage() {
    var url = document.getElementById('list').value;
    if (url != 'none') {
      window.location = url;
    }
  }
</script>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
  integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="../../maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="../../ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="../../cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="../../maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<title>Dashboard</title>
</head>

<body>

</body>

</html>