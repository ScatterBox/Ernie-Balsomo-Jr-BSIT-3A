<?php
include ("conn.php");

// Get the visitor ID from the URL parameters.
$visitorID = $_GET['id'];

// Fetch the current information for the visitor from your database.
$stmt = $conn->prepare("SELECT * FROM tbl_visitors WHERE tbl_visitor_id = ?");
$stmt->execute([$visitorID]);
$visitorInfo = $stmt->fetch();

// TODO: Handle the case where no visitor with the given ID was found.

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Visitor</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <form action="updateVisitor.php" method="POST">
        <div class="form-group">
            <label for="name">Full Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $visitorInfo['name'] ?>">
        </div>

        <div class="form-group">
            <label for="contactNumber">Contact Number:</label>
            <input type="text" class="form-control" id="contactNumber" name="contact_number" value="<?= $visitorInfo['contact_number'] ?>">
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" name="address" value="<?= $visitorInfo['address'] ?>">
        </div>

        <div class="form-group">
            <label for="purposeDestination">Purpose/Destination:</label>
            <input type="text" class="form-control" id="purposeDestination" name="purpose_destination" value="<?= $visitorInfo['purpose_destination'] ?>">
        </div>

        <input type="hidden" name="id" value="<?= $visitorID ?>">
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>

</body>
</html>
