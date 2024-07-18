<?php
$corepage = explode('/', $_SERVER['PHP_SELF']);
$corepage = end($corepage);
if ($corepage !== 'index.php') {
  if ($corepage == $corepage) {
    $corepage = explode('.', $corepage);
    header('Location: index.php?page=' . $corepage[0]);
  }
}

// session_start();
// if (!isset($_SESSION['user_login'])) {
//   header('Location: login.php');
// }

$ses = $_SESSION['user_login'];
$qry = "SELECT * FROM `users` WHERE `username`='$ses';";
$rst = mysqli_query($db_con, $qry);
if (mysqli_num_rows($rst) > 0) {
  while ($row = mysqli_fetch_assoc($rst)) {
    $name = $row["name"];
  }
}

$sql = "SELECT * FROM stocks";
$result = mysqli_query($db_con, $sql);

?>

<h1><a href="index.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a> <small>Statistics Overview</small></h1>
<!-- <a href="lecturer/index.php" ><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                  LECTURER DASHBOARD
                </button></a> -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user"></i> Dashboard</li>
  </ol>
</nav>

<div class="row student">
  <!-- <div class="col-sm-4">
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
        <div class="row">
          <div class="col-sm-8">
            <p class="">All Supplies</p>
          </div>
          <div class="col-sm-4">
            <a href="all-student.php"><i class="fa fa-arrow-right float-sm-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div> -->

  <div class="col-sm-4">
    <div class="card text-white bg-success mb-3">
      <div class="card-header">
        <div class="row">
          <div class="col-sm-4">
            <i class="fa fa-users fa-3x"></i>
          </div>
          <div class="col-sm-8">
            <div class="float-sm-right">&nbsp;<span style="font-size: 30px"><?php $tusers = mysqli_query($db_con, "SELECT * FROM `purchases` where `client_name` = '$name'");
                                                                            $tusers = mysqli_num_rows($tusers);
                                                                            echo $tusers; ?></span></div>
            <div class="clearfix"></div>
            <div class="float-sm-right">PURCHASES</div>
          </div>
        </div>
      </div>
      <div class="list-group-item-success list-group-item list-group-item-action">
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
<!-- <h3>Timetable</h3>
<a href="printdept_tt.php" ><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                  Download Timetable
                </button></a> -->
<table class="table  table-striped table-hover table-bordered" id="data">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Product</th>
      <th scope="col">Type</th>
      <th scope="col">Quantity</th>
      <th scope="col">Unit Price(KSH)</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>


    </tr>
  </thead>
  <tbody>

    <tr>
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
          <?php
          $id = base64_encode($row["batch_no"]);
          echo "
                                                <td><button  class='btn btn-success' style=\"background-color:white;\">
                                                  <a href='make_purchase.php?uid=$id  
                                                  '> Make Purchase</a>               
                </button></td>"  ?>
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