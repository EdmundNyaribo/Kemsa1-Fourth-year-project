<?php
$corepage = explode('/', $_SERVER['PHP_SELF']);
$corepage = end($corepage);
if ($corepage !== 'index.php') {
  if ($corepage == $corepage) {
    $corepage = explode('.', $corepage);
    header('Location: index.php?page=' . $corepage[0]);
  }
}

?>
<h1 class="text-primary"><i class="fas fa-users"></i> All Users<small class="text-warning"> All Users List!</small></h1>
<div class="card-tools">
  <div class="input-group input-group-sm" style="width: 150px;">
    <button class="btn btn-primary "><a href="signup.php" class="text-white"> ADD USER</a></button>
  </div>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
    <li class="breadcrumb-item active" aria-current="page">All Users</li>
  </ol>
</nav>

<table class="table  table-striped table-hover table-bordered" id="data">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Username</th>
      <th scope="col">User Role</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $query = mysqli_query($db_con, 'SELECT * FROM `users`');
    $i = 1;
    while ($result = mysqli_fetch_array($query)) { ?>
      <tr>
        <?php
        echo '<td>' . $i . '</td>
          <td>' . ucwords($result['name']) . '</td>
          <td>' . $result['email'] . '</td>
          <td>' . ucwords($result['username']) . '</td>
          <td>' . $result['role'] . '</td>'; ?>
      </tr>
    <?php $i++;
    } ?>

  </tbody>
</table>
<script type="text/javascript">
  function confirmationDelete(anchor) {
    var conf = confirm('Are you sure want to delete this record?');
    if (conf)
      window.location = anchor.attr("href");
  }
</script>