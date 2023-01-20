<?php
include 'includes/connect.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="dist/bootstrap.min.css">
</head>
<body>
	
<?php include 'includes/navbar.php'; ?>

<?php if (isset($_GET['msg'])) { ?>
<div class="bd-example">
        <div class="alert alert-<?php echo $_GET['cat']?> alert-dismissible fade show" role="alert">
          <center><?php echo $_GET['msg']; ?></center>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
</div>
<?php } ?>

<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<center>
			<h1>Register My Man!!!</h1>
			<form action="" method="post">
				<input class="form-control mt-2 mb-2" type="text" name="email" placeholder="Email">
				<input class="form-control mt-2 mb-2" type="password" name="password" placeholder="Password">
				<input class="form-control mt-2 mb-2" type="password" name="cpassword" placeholder="Confirm Password">
				<button class="form-control mt-2 mb-2 btn btn-secondary" type="submit" name="submit">Submit</button>
			</form><br><br>
			<p>Already Registered <a href="/login"><b><i>Login Here</i></b></a></p>

		</center>
	</div>
	<div class="col-md-4"></div>
</div>

	
	<script type="text/javascript" src="dist/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php

if(isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	if ($password != $cpassword) {
		header("location: register.php?msg=password is incorrect");
	}


	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header('location: register.php?msg=Invalid Email&cat=danger');
		die();
	} else if(strlen($password) < 6) {
		header('location: register.php?msg=Password is soo small please pick a password of at least 6 characters&cat=danger');
		die();
	}

	$q = "SELECT * FROM users where email='$email'";
	$r = mysqli_query($db, $q);
	$row = mysqli_fetch_array($r);
	if ($row > 0) {
		header('location: register.php?msg=email already exists please pick another&cat=danger');
		die();
	}


	$password = password_hash($password, PASSWORD_DEFAULT);
	$query = "INSERT INTO users (email, password) VALUES ('$email', '$password')";

	$run = mysqli_query($db, $query);

	header("location: register.php?msg=Succesfully Signed Up Now you can <a href='./login.php'>log in</a> &cat=info ");

}


?>