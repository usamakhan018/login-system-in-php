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
	$password = password_hash($password, PASSWORD_DEFAULT);
	$query = "INSERT INTO users (email, password) VALUES ('$email', '$password')";

	$run = mysqli_query($db, $query);

	echo "Now you can login";

}


?>