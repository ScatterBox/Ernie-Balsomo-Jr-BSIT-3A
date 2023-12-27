<?php 
include ("conn.php");

try {
    $stmt = $conn->prepare("TRUNCATE TABLE tbl_visitors");
    $stmt->execute();

    echo "<script>
            alert('All Visitors Deleted Successfully');
            window.location.href = 'http://scatterbox.000webhostapp.com/visitor.php';
          </script>";
    exit();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
