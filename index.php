<?php

session_start();

// echo $_SESSION['user'];


if(!isset($_SESSION["user"])) {
	header('location: login.php');

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="dist/styles.css">
	<link rel="stylesheet" type="text/css" href="dist/bootstrap.min.css">
</head>
<body>



<?php include 'includes/navbar.php'; ?>
<?php 
if (isset($_GET['msg'])) {

?>


<div class="bd-example">
        <div class="alert alert-<?php echo $_GET['cat']?> alert-dismissible fade show" role="alert">
          <center><?php echo $_GET['msg']; ?></center>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
</div>
<?php } ?>
<center><h2><?php echo $_SESSION['user']; ?><br>Thank you for giving this app a try</h2></center>

</body>
</html>

<?php

?>