<?php include 'connection.php';?>

<?php 


	if (isset($_POST['login'])) {
		
		$user = $_POST['user'];
		$pass = $_POST['pass'];


		$sql = "SELECT * FROM user WHERE `username` = '$user'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();

		session_regenerate_id();
		$_SESSION['username'] = @$row['username'];
		$_SESSION['fullname'] = @$row['fullname'];
		$_SESSION['position'] = @$row['position'];
		session_write_close();

		if (@$row['password'] == $pass && $row['position'] == 'Employee') {
			
			header("Location:home.php");
		}else if (@$row['password'] == $pass && $row['position'] == 'Admin') {
			
			header("Location:dashboard.php");
		}else{

			echo '<script>window.alert("Incorrect Credential! Try Again.")</script>';
		}



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
		<form method="POST">
			<input type="text" name="user" placeholder="Username">
			<input type="password" name="pass" placeholder="Password">
			<input type="submit" name="login" value="LOGIN">
		</form>

		<a href="register.php">REGISTER</a>
</body>
</html>