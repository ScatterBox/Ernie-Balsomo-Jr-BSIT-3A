<?php
$servername = "localhost";
$username = "id21805850_eslb";
$password = "@EsLb123";
$dbname = "id21805850_erenskylb";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['name']) && isset($_POST['contact_number']) && isset($_POST['address']) && isset($_POST['purpose_destination']) && isset($_POST['date'])) {
            $name = $_POST['name'];
            $contact_number = $_POST['contact_number'];
            $address = $_POST['address'];
            $purpose_destination = $_POST['purpose_destination'];
            $date = $_POST['date'];

            $sql = "INSERT INTO tbl_visitors (name, contact_number, address, purpose_destination, date) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            if (!$stmt) {
                echo "SQL error";
            } else {
                $stmt->execute([$name, $contact_number, $address, $purpose_destination, $date]);
            }
        }
    }

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>