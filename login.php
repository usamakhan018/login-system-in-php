<?php
include 'includes/connect.php';
session_start();

// if (isset($_SESSION['user'])) {
// echo $_SESSION['user'];

// }
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
			<h1>Login My Man!!!</h1>
			<form method="post" action="">
				<input class="form-control mt-2 mb-2" type="text" name="email" placeholder="Email">
				<input class="form-control mt-2 mb-2" type="password" name="password" placeholder="Password">
				<button class="form-control mt-2 mb-2 btn btn-secondary" type="submit" name="submit">Submit</button><br><br>
			<p>Not Registered Yet <a href="./register.php"><b><i>Register Here</i></b></a></p>
			</form>
			
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
	$query = "SELECT * FROM users WHERE email='$email'";
	$run = mysqli_query($db, $query);
	if(mysqli_num_rows($run) > 0) {
		echo "success";
		$_SESSION['user'] = $email;
		$d = mysqli_fetch_array($run);
		$_SESSION['id'] = $d['id'];
		header("location: index.php?msg=You are successfully Logged In!&cat=success");
	} else {
		echo "failed";
	}

}

?>
