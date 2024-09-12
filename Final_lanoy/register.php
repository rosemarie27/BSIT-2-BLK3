<?php include 'connection.php';?>

<?php 
    if (isset($_POST['register'])) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $fullname = $_POST['fullname'];
        $age = $_POST['age'];
        $birth_place = $_POST['birth_place'];
        $pos = $_POST['pos']; // Capture the selected position from the form

        // Check if username already exists
        $sql = "SELECT * FROM user WHERE `username` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        // If username exists, show an error
        if ($row && $row['username'] == $user) {
            echo '<script>window.alert("Username is already used")</script>';
        } else {
            // Insert user data into the database
            $sqls = "INSERT INTO `user`(`username`, `password`, `fullname`, `age`, `birth_place`, `position`) VALUES (?, ?, ?, ?, ?, ?)";
            $stmts = $conn->prepare($sqls);
            $stmts->bind_param("sssiss", $user, $pass, $fullname, $age, $birth_place, $pos);
            $stmts->execute();
            echo '<script>window.alert("Registered Successfully")</script>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="w-full max-w-xs">
        <form method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-2xl font-bold text-center mb-6">Register</h2>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="user">Username</label>
                <input type="text" name="user" id="user" placeholder="Username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="pass">Password</label>
                <input type="password" name="pass" id="pass" placeholder="Password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="fullname">Fullname</label>
                <input type="text" name="fullname" id="fullname" placeholder="Fullname" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="age">Age</label>
                <input type="number" name="age" id="age" placeholder="Age" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="birth_place">Birth Place</label>
                <input type="text" name="birth_place" id="birth_place" placeholder="Birth Place" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="pos">Position</label>
                <select name="pos" id="pos" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline">
                    <option value="Employee">Employee</option>
                    <option value="Admin">Admin</option>
                </select>
            </div>

            <div class="flex items-center justify-between">
                <input type="submit" name="register" value="REGISTER" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            </div>

            <div class="text-center">
            <a href="index.php" class="text-blue-500 hover:text-blue-700">LOGIN</a>
        </div>
        </form>

        
    </div>
</body>
</html>
