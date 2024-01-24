<?php
    // Start the session
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        // If not, display a notification and a button that redirects to lb.php
        echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">';
        echo '<div class="alert alert-warning">Please log in or register first to view the list.</div>';
        echo '<a href="lb.php" class="btn btn-primary">Go to Login/Registration Page</a>';
        exit;
    }

    include ("conn.php");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Log-book</title>

    <!--style.css
    <link rel="stylesheet" type="text/css" href="style.css">-->
    <!-- Data Table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <!--bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
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
        .btn {
            text-align: right;
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


     <table class="table" id="visitorTable" style="background-color: #ffffff;">
    <thead class="thead-dark">
        <tr>
            <th scope="col" style="color: #ff9ff3;">Log ID</th>
            <th scope="col" style="color: #ff9ff3;">Date</th>
            <th scope="col" style="color: #ff9ff3;">Full Name</th>
            <th scope="col" style="color: #ff9ff3;">Contact</th>
            <th scope="col" style="color: #ff9ff3;">Address</th>
            <th scope="col" style="color: #ff9ff3;">Purpose/Destination</th>
            <th scope="col" style="color: #ff9ff3;">Time In</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $stmt = $conn->prepare("SELECT * FROM tbl_visitors");
           $stmt->execute();

            $result = $stmt->fetchAll();

            foreach ($result as $row) {
                $visitorID = $row["tbl_visitor_id"];
                $date = $row["date"];
                $name = $row["name"];
                $contactNumber = $row["contact_number"];
                $address = $row["address"];
                $purposeDestination = $row["purpose_destination"];
                $timeIn = $row["time_in"];
            ?>

            <tr>
                <th scope="row"><?= $visitorID ?></th>
                <td><?= $date ?></td>
                <td><?= $name ?></td>
                <td><?= $contactNumber ?></td>
                <td><?= $address ?></td>
                <td><?= $purposeDestination ?></td>
                <td><?= $timeIn ?></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>

<div class="row" style="justify-content: flex-end; margin-right: 20px;"> <!-- Aligns buttons to the bottom right with a margin -->
    <div class="buttons">
        <button type="button" class="btn btn-success" onclick="printVisitors()">Print</button>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#visitorTable').DataTable({
            "searching": false,   // Disable the search box
            "info": false,        // Disable the "showing x of y entries" message
        });
    });
</script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Data Table -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

    <!-- Script  -->
    <script src="script.js"></script>
</body>

</html>
