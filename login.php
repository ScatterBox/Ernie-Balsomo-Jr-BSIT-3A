<?php
session_start();
include ("conn.php");
function loginUser($username, $password) {
    global $conn;  // Use the $conn from the global scope
    try {
        // Prepare SQL query
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);

        // Execute SQL query
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verify the password
            if ($password == $user['password']) {  // Change this line
                // User verified, set the session variable
                $_SESSION['loggedin'] = true;

                // Return success message
                return 'Login successful';
            } else {
                // Invalid credentials
                return "Invalid username or password.";
            }
        } else {
            // Invalid credentials
            return "Invalid username or password.";
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
}
?>

<!-- Include Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- Display the message -->
<?php if (!empty($message)): ?>
    <div class="alert <?php echo $message == 'Login successful' ? 'alert-success' : 'alert-danger'; ?>">
        <?php echo $message; ?>
        <?php if ($message == 'Login successful'): ?>
            <!-- Display the button when login is successful -->
            <a href="http://localhost/visitors/visitor.php" class="btn btn-primary mt-3">Go to Visitor Page</a>
        <?php else: ?>
            <!-- Display the button when login is unsuccessful -->
            <a href="li.php" class="btn btn-primary mt-3">Back to Login</a>
        <?php endif; ?>
    </div>
<?php endif; ?>
