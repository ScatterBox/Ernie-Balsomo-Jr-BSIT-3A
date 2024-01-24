<?php
    include ("conn.php");
    function registerUser($username, $password) {
    try {
        // Create a new PDO instance
        $pdo = new PDO('mysql:host=localhost;dbname=visitors', 'root', '');

        // Check if username already exists
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Username already exists
            return 'Username already exists';
        } else {
            // Prepare an SQL statement
            $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");

            // Bind parameters
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);

            // Execute the statement
            $stmt->execute();

            return 'Registration successful';
        }
    } catch (PDOException $e) {
        // Handle any errors
        die("Error: " . $e->getMessage());
    }
}

$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $message = registerUser($_POST['username'], $_POST['password']);
    } else {
        $message = 'Please fill in all fields';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <!-- Add Bootstrap CSS -->
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
        .container {
            background-color: white;
            padding-bottom: 10px;
            border-radius: 10px;
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
                <a class="nav-link" href="http://erenskylb.000webhostapp.com">Home</a>
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
<!-- End NavBar -->

    <div class="container">
        <h2 class="mt-5">Registration Form</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <p class="mt-3">Already have an account?</p>
        <a href="li.php" class="btn btn-secondary">Sign in</a>
        <?php if (!empty($message)): ?>
            <div class="alert alert-info mt-3">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
