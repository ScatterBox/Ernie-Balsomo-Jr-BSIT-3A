<?php
    include ("conn.php");
    function loginUser($username, $password) {
    global $conn;  // Use the $conn from the global scope
    try {
        // Prepare an SQL statement
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username AND password = :password");

        // Bind parameters
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);

        // Execute the statement
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Login successful
            return 'Login successful';
        } else {
            // Invalid username or password
            return 'Invalid username or password';
        }
    } catch (PDOException $e) {
        // Handle any errors
        die("Error: " . $e->getMessage());
    }
}

$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $message = loginUser($_POST['username'], $_POST['password']);
    } else {
        $message = 'Please fill in all fields';
    }

    // Redirect back to the login page
    header("Location: login.php");
    exit;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('pexel.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
        .navbar {
            cursor: pointer;
        }
        .nav-link:hover {
            color: #ff9f43;
        }
        .navbar-brand {
            font-size: 20px;
            color: #1dd1a1 !important;
            font-weight: bold;
        }
        .navbar-brand:hover {
            color: #ffa502 !important;
        }
        .navbar-brand:active {
            color: #ff6348 !important;
        }
        .nav-link {
            color: #1dd1a1 !important;
        }
        .nav-link:hover {
            color: #48dbfb !important;
        }
        .nav-link:active {
            color: #ff9ff3 !important;
        }
        h1 {
            background: linear-gradient(to right, #38ada9 0%, #f6b93b 100%);
            background-clip: text;
            color: transparent;
        }
    </style>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark"> 
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span> 
    </button> 
    <div class="collapse navbar-collapse justify-content-between" id="navbarNav" style="font-weight: 500;">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="http://erenskylb.000webhostapp.com/visitors">Home</a>
            </li> 
            <li class="nav-item">
                <a class="nav-link" href="http://erenskylb.000webhostapp.com/lb.php">Log-Book</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://erenskylb.000webhostapp.com/about.php">About</a> 
            </li>  
        </ul> 
        <ul class="navbar-nav">
        <li class="nav-item">
                <a class="nav-link" href="http://erenskylb.000webhostapp.com/li.php">Sign-in</a>
            </li>
        <li class="nav-item">
                <a class="nav-link" href="http://erenskylb.000webhostapp.com/reg.php">Sign-up</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://erenskylb.000webhostapp.com/visitor.php">Visitor List</a>
            </li>
        </ul>
    </div> 
</nav>
    <div class="container" style="background-color: #dfe6e9; padding: 1%; margin-top: 20px; border-radius: 20px;">
        <form method="post" action="login.php" autocomplete="off" id="loginForm">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" autocomplete="off" required>
            </div>
            <div class="d-flex flex-column align-items-center" style="margin-right: 20px; padding: 1%;">
                <button type="submit" class="btn btn-success mb-3">Submit</button>
                <p>Don't have an account yet?</p>
                <button type="button" class="btn btn-danger ml-3">Register</button>
            </div>
        </form>
    </div>
    <script>
        window.onload = function() {
            // Get the form elements
            var username = document.getElementById("username");
            var password = document.getElementById("password");

            // Set the form fields to empty
            username.value = "";
            password.value = "";
        }

</script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</body>
</html>