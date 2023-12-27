<?php
    $servername = "localhost";
    $username = "id21703179_root";
    $password = "@Q1057m8I";
    $dbname = "id21703179_visitors";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Check if the 'id' parameter is set in the URL
        if (isset($_GET['id'])) {
            // Get the visitor's ID from the URL
            $visitorID = $_GET['id'];

            // Prepare a DELETE statement
            $stmt = $conn->prepare("DELETE FROM tbl_visitors WHERE tbl_visitor_id = :id");

            // Bind the visitor's ID to the DELETE statement
            $stmt->bindParam(':id', $visitorID);

            // Execute the DELETE statement
            $stmt->execute();

            // Redirect the user back to the main page
            header('Location: index.php');
        } else {
            // If the 'id' parameter is not set in the URL, show an error message
            echo "Error: No visitor ID provided.";
        }
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
        echo "<script src='path/to/your/script.js'></script>";
?>
