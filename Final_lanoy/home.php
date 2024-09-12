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
	<title>Welcome</title>
	<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 flex items-center justify-center h-screen">

	<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 text-center">
		<h1 class="text-3xl font-bold mb-4">Welcome, <?php echo $_SESSION['fullname']; ?>!</h1>

		<a href="logout.php" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">LOGOUT</a>
	</div>

</body>
</html>
