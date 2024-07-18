<?php
$user =  $_SESSION['user_login'];
$corepage = explode('/', $_SERVER['PHP_SELF']);
$corepage = end($corepage);
if ($corepage !== 'index.php') {
  if ($corepage == $corepage) {
    $corepage = explode('.', $corepage);
    header('Location: index.php?page=' . $corepage[0]);
  }
}
?>
<h1 class="text-primary"><i class="fas fa-user"></i> User Profile</h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
    <li class="breadcrumb-item active" aria-current="page">User Profile</li>
  </ol>
</nav>
<?php
$query = mysqli_query($db_con, "SELECT * FROM `users` WHERE `username` ='$user';");
$row = mysqli_fetch_array($query);

?>
<div class="row">
  <div class="col-sm-6">
    <form role="form" action="edit_user.php" method="POST">
      <table class="table table-bordered">
        
        <tr>
          <td>Name</td>
          <td><?php echo ucwords($row['name']); ?></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><?php echo $row['email']; ?></td>
        </tr>
        <tr>
          <td>Username</td>
          <td><?php echo ucwords($row['username']); ?></td>
        </tr>
        <tr>
          <td>Status</td>
          <td><?php echo ucwords($row['role']); ?></td>
        </tr>
        <tr>
          <td>Register Date</td>
          <td><?php echo $row['reg_date']; ?></td>
        </tr>

      </table>
      <a class="btn btn-warning pull-right" href="index.php?page=edit_user&id=<?php echo base64_encode($row['user_id']); ?>">Edit Profile</a>
    </form>
  </div>


  
</div>