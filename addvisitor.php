<?php
include("conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name'], $_POST['contact_number'], $_POST['address'], $_POST['purpose_destination'])) {
        $name = $_POST['name'];
        
        // Check if the name contains any numbers
        if (preg_match('~[0-9]~', $name)) {
            echo "
                <script>
                    alert('Name should not contain numbers!');
                    window.location.href = 'http://scatterbox.000webhostapp.com/logbook.php';
                </script>
            ";
            exit();
        }

        $contactNumber = $_POST['contact_number'];
        $address = $_POST['address'];
        $purposeDestination = $_POST['purpose_destination'];
        $timeIn = date("H:i:s"); // Use date() instead of time()
        $date = date("Y-m-d");

        try {
            $stmt = $conn->prepare("INSERT INTO tbl_visitors (name, contact_number, address, purpose_destination, time_in, date) VALUES (:name, :contact_number, :address, :purpose_destination, :time_in, :date)");
            
            $stmt->bindParam(":name", $name, PDO::PARAM_STR); // Add ":" before parameter names
            $stmt->bindParam(":contact_number", $contactNumber, PDO::PARAM_STR);
            $stmt->bindParam(":address", $address, PDO::PARAM_STR);
            $stmt->bindParam(":purpose_destination", $purposeDestination, PDO::PARAM_STR);
            $stmt->bindParam(":time_in", $timeIn, PDO::PARAM_STR);
            $stmt->bindParam(":date", $date, PDO::PARAM_STR);

            $stmt->execute();

            header("Location: http://scatterbox.000webhostapp.com/logbook.php");

            exit();
        } catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
        }

    } else {
        echo "
            <script>
                alert('Please fill in all fields!');
                window.location.href = 'http://scatterbox.000webhostapp.com/logbook.php';
            </script>
        ";
    }
}
?>
