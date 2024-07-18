<?php require_once 'db_con.php';

session_start();
if (isset($_SESSION['user_login'])) {
	header('Location: index.php');
}
if (isset($_POST['login'])) {
	$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
	$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

	$input_arr = array();

	if (empty($username)) {
		$input_arr['input_user_error'] = "Username empty or invalid string ";
	}

	if (empty($password)) {
		$input_arr['input_pass_error'] = "Password empty or invalid Password";
	}

	if (count($input_arr) == 0) {
		$query = "SELECT * FROM `users` WHERE `username` = '$username';";
		$result = mysqli_query($db_con, $query);
		if (mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_assoc($result);
			if ($row['password'] == sha1($password)) {
				if ($row['role'] == 1) {
					
					$_SESSION['user_login'] = $username;
					header('Location: index.php');
				} elseif ($row['role'] == 2) {
					$_SESSION['user_login'] = $username;
					header('Location: ../client/index.php');
				}
			} else {
				$status_inactive = "Your Status is inactive, please contact with admin or support!";
			}
		} else {
			$worngpass = "This password Wrong!";
		}
	} else {
		$usernameerr = "Username Not Found!";
	}
}



?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<title>WMS</title>

</head>

<body style="background-image: url('../images/compact.jpg');">

	<div class="container"><br><br><br><br><br><br>
		<div class="col-md-6">
			<div class="card card-primary">
			
				<h1 style="font-family: cambria ;" class="text-center">Login</h1>
				<hr class="col-sm-10">
				<br>
				<div class="d-flex justify-content-center">
					<?php if (isset($usernameerr)) { ?> <div role="alert" aria-live="assertive" aria-atomic="true" align="center" class="toast alert alert-danger fade hide" data-delay="5000"><?php echo $usernameerr; ?></div><?php }; ?>
					<?php if (isset($worngpass)) { ?> <div role="alert" aria-live="assertive" aria-atomic="true" align="center" class="toast alert alert-danger fade hide" data-delay="5000"><?php echo $worngpass; ?></div><?php }; ?>
					<?php if (isset($status_inactive)) { ?> <div role="alert" aria-live="assertive" aria-atomic="true" align="center" class="toast alert alert-danger fade hide" data-delay="5000"><?php echo $status_inactive; ?></div><?php }; ?>
				</div>
				<div class="row animate__animated animate__pulse">

					<div class="col-md-4 offset-md-4">
						<div class="bg-img">
							<form method="POST" action="">
								<div class="form-group row">
									<div class="col-sm-12">
										Username<input type="text" class="form-control" name="username" value="<?= isset($username) ? $username : ''; ?>" placeholder="Username" id="inputEmail3"> <?php echo isset($input_arr['input_user_error']) ? '<label>' . $input_arr['input_user_error'] . '</label>' : ''; ?>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-sm-12">
										Password<input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password"><label><?php echo isset($input_arr['input_pass_error']) ? '<label>' . $input_arr['input_pass_error'] . '</label>' : ''; ?>
									</div>
								</div>
								<div class="text-left">
									<button type="submit" name="login" class="btn btn-warning">Sign in</button>
									
								</div>

							</form>
						</div>
					</div>
				</div>





				<!-- Optional JavaScript -->
				<!-- jQuery first, then Popper.js, then Bootstrap JS -->
				<script src="../js/jquery-3.5.1.min.js"></script>
				<script src="../js/bootstrap.min.js"></script>
				<script type="text/javascript">
					$('.toast').toast('show')
				</script>
			</div>
		</div>
	</div>
</body>

</html>