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
        } else if (@$row['password'] == $pass && $row['position'] == 'Admin') {
            header("Location:dashboard.php");
        } else {
            echo '<script>window.alert("Incorrect Credential! Try Again.")</script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="w-full max-w-xs">
        <form method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-2xl font-bold text-center mb-6">Login</h2>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="user">Username</label>
                <input type="text" name="user" id="user" placeholder="Username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="pass">Password</label>
                <input type="password" name="pass" id="pass" placeholder="Password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="pos">Position</label>
                <select name="pos" id="pos" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline">
                    <option value="Employee">Employee</option>
                    <option value="Admin">Admin</option>
                </select>
            </div>

            <div class="flex items-center justify-between">
                <input type="submit" name="login" value="LOGIN" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            </div>

            <div class="text-center">
            <a href="register.php" class="text-blue-500 hover:text-blue-700">REGISTER</a>
        </div>
        </form>

        
    </div>
</body>
</html>
