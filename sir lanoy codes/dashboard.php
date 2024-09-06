<?php include 'connection.php';?>

<?php 

	if (!isset($_SESSION['username'])) {
		header("location:index.php");
		// code...
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

	<?php 

		$sql = "SELECT * FROM user";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$result = $stmt->get_result();

	?>

	<table style="margin-top: 1cm;" border="1">
		<thead>
			<tr>
				<th style="padding-right: 10px;">ID</th>
				<th style="padding-right: 10px;">Username</th>
				<th style="padding-right: 10px;">Password</th>
				<th style="padding-right: 10px;">Fullname</th>
				<th style="padding-right: 10px;">Age</th>
				<th style="padding-right: 10px;">Birth Place</th>
				<th style="padding-right: 10px;">Position</th>
			</tr>
		</thead>

		<?php while ($row = $result->fetch_assoc()) {
		
			$i = 1;
		 ?>

		 <tbody>
		 	<tr>
		 		<td><?php echo $i++; ?></td>
		 		<td><?php echo $row['username'];?></td>
		 		<td><?php echo $row['password'];?></td>
		 		<td><?php echo $row['fullname'];?></td>
		 		<td><?php echo $row['age'];?></td>
		 		<td><?php echo $row['birth_place'];?></td>
		 		<td><?php echo $row['position'];?></td>
		 	</tr>
		 </tbody>

		<?php }?>
	</table>
</body>
</html>