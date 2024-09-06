<?php include 'connection.php';?>

<?php 


	if (isset($_POST['register'])) {
		
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$fullname = $_POST['fullname'];
		$age = $_POST['age'];
		$birth_place = $_POST['birth_place'];
		$pos = 'Employee';

		$sql = "SELECT * FROM user WHERE `username` = '$user'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();

		if (@$row['Username'] == $user) {
			
		echo '<script>window.alert("Username is already used ")</script>';
		}else{
		$sqls = "INSERT INTO `user`( `username`, `password`, `fullname`, `age`, `birth_place`, `position`) VALUES ('$user','$pass','$fullname','$age','$birth_place','$pos')";
		$stmts = $conn->prepare($sqls);
		$stmts->execute();
		echo '<script>window.alert("Registered Successfully")</script>';
		
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
			<input type="text" name="fullname" placeholder="Fullname">
			<input type="number" name="age" placeholder="Age">
			<input type="text" name="birth_place" placeholder="Birth Place">
			<input type="submit" name="register" value="REGISTER">
		</form>

		<a href="index.php">LOGIN</a>

</body>
</html>