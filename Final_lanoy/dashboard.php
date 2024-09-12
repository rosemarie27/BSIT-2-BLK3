<?php include 'connection.php'; ?>

<?php 
	if (!isset($_SESSION['username'])) {
		header("location:index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
	<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

	<div class="container mx-auto p-4">
		<h1 class="text-3xl font-bold text-center mb-6">Welcome, <?php echo $_SESSION['fullname']; ?></h1>

		<div class="flex justify-end mb-4">
			<a href="logout.php" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">LOGOUT</a>
		</div>

		<?php 
			$sql = "SELECT * FROM user";
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			$result = $stmt->get_result();
		?>

		<div class="overflow-x-auto">
			<table class="min-w-full bg-white border-collapse border border-gray-300">
				<thead>
					<tr>
						<th class="py-2 px-4 bg-gray-200 border border-gray-300">ID</th>
						<th class="py-2 px-4 bg-gray-200 border border-gray-300">Username</th>
						<th class="py-2 px-4 bg-gray-200 border border-gray-300">Password</th>
						<th class="py-2 px-4 bg-gray-200 border border-gray-300">Fullname</th>
						<th class="py-2 px-4 bg-gray-200 border border-gray-300">Age</th>
						<th class="py-2 px-4 bg-gray-200 border border-gray-300">Birth Place</th>
						<th class="py-2 px-4 bg-gray-200 border border-gray-300">Position</th>
					</tr>
				</thead>

				<tbody>
					<?php 
					$i = 1; 
					while ($row = $result->fetch_assoc()) { 
					?>
					<tr>
						<td class="py-2 px-4 border border-gray-300"><?php echo $i++; ?></td>
						<td class="py-2 px-4 border border-gray-300"><?php echo $row['username']; ?></td>
						<td class="py-2 px-4 border border-gray-300"><?php echo $row['password']; ?></td>
						<td class="py-2 px-4 border border-gray-300"><?php echo $row['fullname']; ?></td>
						<td class="py-2 px-4 border border-gray-300"><?php echo $row['age']; ?></td>
						<td class="py-2 px-4 border border-gray-300"><?php echo $row['birth_place']; ?></td>
						<td class="py-2 px-4 border border-gray-300"><?php echo $row['position']; ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>
