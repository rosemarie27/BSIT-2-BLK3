<?php
include('db.php');
if (isset($_POST['Login'])) {
    $username = $_POST['username'];
    $password = $_POST['password']; 
    $query = "SELECT * FROM `login_system` WHERE `username` = ? AND `Password` = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    if (!$row || $row['username'] !== $username || $row['password'] !== $password) {
        echo '<script>alert("Invalid username or password");</script>';
        exit();
    } else {
        header('Location: home.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<form method="POST" class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md mt-10">
    <h1 class="text-2xl font-bold text-center mb-6">Login</h1>
    <div class="mb-4">
        <label for="username" class="block text-gray-700 font-semibold mb-2">Username</label>
        <input type="text" name="username" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
    </div>
    <div class="mb-4">
        <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
        <input type="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
    </div>
    <input type="submit" name="Login" value="Login" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition duration-300">
    <p class="text-center text-gray-600 mt-4">Don't have an account? Click <a href="register_form.php" class="text-blue-500 hover:underline">here</a></p>
</form>
</body>
</html>