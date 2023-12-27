<?php
include ("conn.php");

// Get the updated information from the $_POST array.
$visitorID = $_POST['id'];
$name = $_POST['name'];
$contactNumber = $_POST['contact_number'];
$address = $_POST['address'];
$purposeDestination = $_POST['purpose_destination'];

// Update the visitor's information in your database.
$stmt = $conn->prepare("UPDATE tbl_visitors SET name = ?, contact_number = ?, address = ?, purpose_destination = ? WHERE tbl_visitor_id = ?");
$stmt->execute([$name, $contactNumber, $address, $purposeDestination, $visitorID]);

// Redirect the user back to the original page.
header('Location: visitor.php');
