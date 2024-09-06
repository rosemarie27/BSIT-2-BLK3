<?php include 'connection.php';?>

<?php 

	if (!isset($_SESSION['username'])) {

			header("location:index.php");

	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

	<h1>Welcome <?php echo $_SESSION['fullname']; ?> </h1>

	<a href="logout.php">LOGOUT</a>

</body>
</html>
