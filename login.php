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
	<script type="text/javascript" src="dist/bootstrap.bundle.min.js"></script>


</body>
</html>


<?php 

if(isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	$query = "SELECT * FROM users WHERE email='$email'";
	$run = mysqli_query($db, $query);
	$row = mysqli_num_rows($run);
	if($row > 0) {
		if ($password == $row['password']) {
			$_SESSION['user'] = $email;
			$d = mysqli_fetch_array($run);
			$_SESSION['id'] = $d['id'];
			header("location: index.php?msg=You are successfully Logged In!&cat=success");
		} else {
			header("location: login.php?msg=Password is incorrect!&cat=danger");
		}
	} else {
		header("location: login.php?msg=Email does not exists please <a href='register.php'>register</a>!&cat=danger");
	}

}

?>
