Login

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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">  
</head>  
<body class="bg-light">  
    <div class="container">  
        <form method="POST" class="col-md-6 mx-auto bg-white p-5 rounded mt-5 shadow">  
            <h1 class="text-center mb-4">Login</h1>  
            <div class="form-group">  
                <label for="username" class="font-weight-semibold">Username</label>  
                <input type="text" name="username" id="username" class="form-control" required>  
            </div>  
            <div class="form-group">  
                <label for="password" class="font-weight-semibold">Password</label>  
                <input type="password" name="password" id="password" class="form-control" required>  
            </div>  
            <button type="submit" name="Login" class="btn btn-primary btn-block">Login</button>  
            <p class="text-center mt-3">Don't have an account? Click <a href="register_form.php" class="text-primary">here</a></p>  
        </form>  
    </div>  

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  
</body>  
</html>


register.php


<?php  
include('db.php');  
if (isset($_POST['submit'])) {  
    $username = $_POST['username'];  
    $password = $_POST['password'];   
    $age = $_POST['age'];  
    $sql = "SELECT * FROM login_system WHERE `username` = ?";  
    $stmt = $conn->prepare($sql);  
    $stmt->bind_param('s', $username);  
    $stmt->execute();  
    $result = $stmt->get_result();  
    $row = $result->fetch_assoc();  
    if ($row && $row['username'] == $username) {   
        echo '<script>alert("Username is already used");</script>';  
    } else {  
        $sqls = "INSERT INTO `login_system` (`username`, `password`, `age`) VALUES (?, ?, ?)";  
        $stmts = $conn->prepare($sqls);  
        $stmts->bind_param('sss', $username, $password, $age);  
        $stmts->execute();  
        echo '<script>alert("Registered Successfully");</script>';  
        header('Location: login.php');  
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
    <title>Register</title>  
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">  
</head>  
<body class="bg-light">  
    <div class="container">  
        <form method="POST" class="col-md-6 mx-auto bg-white p-5 rounded mt-5 shadow">  
            <h1 class="text-center mb-4">REGISTER</h1>  
            <div class="form-group">  
                <label for="username" class="font-weight-semibold">Username</label>  
                <input type="text" name="username" id="username" class="form-control" required>  
            </div>  
            <div class="form-group">  
                <label for="password" class="font-weight-semibold">Password</label>  
                <input type="password" name="password" id="password" class="form-control" required>  
            </div>  
            <div class="form-group">  
                <label for="age" class="font-weight-semibold">Age</label>  
                <input type="number" name="age" id="age" class="form-control" required>  
            </div>  
            <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>  
            <p class="text-center mt-3">Already have an account? Click <a href="login.php" class="text-primary">here</a></p>  
        </form>  
    </div>  

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  
</body>  
</html>
