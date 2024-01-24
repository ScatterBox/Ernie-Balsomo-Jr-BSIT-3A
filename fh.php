<?php

    include ("conn.php");
    // Include your database connection code
    $servername = "localhost";
    $username = "id21805850_eslb";
    $password = "@EsLb123";
    $dbname = "id21805850_erenskylb";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "<div class='alert alert-danger text-center' role='alert'>Connection failed: " . $e->getMessage() . "</div>";
    }

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $name = $_POST['name'];
        $contact_number = $_POST['contact_number'];
        $address = $_POST['address'];
        $purpose_destination = $_POST['purpose_destination'];
        $date = $_POST['date'];  // Get the date from the form

        // Prepare SQL query
        $stmt = $conn->prepare("INSERT INTO tbl_visitors (name, contact_number, address, purpose_destination, date, time_in) VALUES (:name, :contact_number, :address, :purpose_destination, :date, NOW())");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':contact_number', $contact_number);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':purpose_destination', $purpose_destination);
        $stmt->bindParam(':date', $date);  // Bind the date to your SQL statement

        // Execute SQL query
        if ($stmt->execute()) {
            echo "<div class='alert alert-success text-center' role='alert'>New record created successfully.</div>";
            echo "<div class='text-center'><button onclick=\"location.href='lb.php'\" type=\"button\" class='btn btn-primary'>Submit Another</button></div>";
        } else {
            echo "<div class='alert alert-danger text-center' role='alert'>Error: " . $stmt . "<br>" . $conn->error . "</div>";
        }
        
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    
</body>
</html>