<?php include ("conn.php") ?>

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
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand ml-3" href=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="http://scatterbox.000webhostapp.com/logbook.php" style="color: #39FF14;">Log-Book</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="http://scatterbox.000webhostapp.com/visitor.php" style="color: #39FF14;">Visitors</a>
            </li>
            </ul>
        </div>
    </nav>

    <table class="table" id="visitorTable" style="background-color: #ffffff;">
    <thead class="thead-dark">
        <tr>
            <th scope="col" style="color: #FFFF00;">Log ID</th>
            <th scope="col" style="color: #FFFF00;">Date</th>
            <th scope="col" style="color: #FFFF00;">Full Name</th>
            <th scope="col" style="color: #FFFF00;">Contact</th>
            <th scope="col" style="color: #FFFF00;">Address</th>
            <th scope="col" style="color: #FFFF00;">Purpose/Destination</th>
            <th scope="col" style="color: #FFFF00;">Time In</th>
            <th scope="col" style="color: #FFFF00;">Actions</th>
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
                <td><button type="button" class="btn btn-primary" onclick="editVisitor(<?= $visitorID ?>)">Edit</button></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>

<div class="row" style="justify-content: flex-end; margin-right: 20px;"> <!-- Aligns buttons to the bottom right with a margin -->
    <div class="buttons">
        <button type="button" class="btn btn-danger" onclick="deleteAll()">Delete All</button>
        <button type="button" class="btn btn-success" onclick="printVisitors()">Print</button>
    </div>
</div>

    <!-- Data Table -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

    <!-- Script  -->
    <script src="script.js"></script>
</body>

</html>
