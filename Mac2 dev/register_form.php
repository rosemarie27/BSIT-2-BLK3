<?php
include('db.php');

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $age = $_POST['age'];

  $sql = "INSERT INTO `login_system`(`username`, `password`, `age`) VALUES(?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssi", $username, $password, $age);
  $stmt->execute();

  header('Location: Login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Register</title>
  
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
  <form method="POST" class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md mt-10">
    <h1 class="text-2xl font-bold text-center mb-6">REGISTER</h1>
    
    <div class="mb-4">
      <label for="username" class="block text-gray-700 font-semibold mb-2">Username</label>
      <input type="text" name="username" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
    </div>
    
    <div class="mb-4">
      <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
      <input type="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
    </div>
    
    <div class="mb-4">
      <label for="age" class="block text-gray-700 font-semibold mb-2">Age</label>
      <input type="number" name="age" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
    </div>

    <button type="submit" name="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition duration-300">Register</button>

    <p class="text-center text-gray-600 mt-4">Already have an account? Click <a href="login.php" class="text-blue-500 hover:underline">here</a></p>
  </form>
</body>
</html>
