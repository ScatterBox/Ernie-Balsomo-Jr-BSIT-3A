<?php include ("conn.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Log-book</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
    .main {
    display: flex;
    justify-content: space-around; /* add space around divs */
}

body {
            background-image: url('pexel.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }

</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

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
            <li class="nav-item">
                <a class="nav-link" href="http://scatterbox.000webhostapp.com/visitor.php" style="color: #39FF14;">Visitor List</a>
            </li>
            </ul>
        </div>
    </nav>

    <div class="main">
        
        <div class="log-e-book-container row">
        <div class="form col-8 light-purple-box">
    <h2>Log Book Form</h2>
    <form class="mt-4" action="addvisitor.php" method="POST" onsubmit="return validateForm() && showNotification()" id="logbookForm">
        <div class="form-group">
            <label for="name">Full Name:</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="contactNumber">Contact Number:</label>
                <input type="text" class="form-control" id="contactNumber" name="contact_number" maxlength="13">
            </div>
            <div class="form-group col-md-6">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>
        </div>
        <div class="form-group">
            <label for="purposeDestination">Purpose/Destination:</label>
            <input type="text" class="form-control" id="purposeOffice" name="purpose_destination" maxlength="20">
        </div>
        <button type="submit" class="btn btn-success float-right">Enter Info</button>
        <button type="button" class="btn btn-danger float-right  mr-3" onclick="clearForm()">Clear Fields</button>
    </form>
</div>
        </div>

        <div class="recently-added white-background round-edge">
            <h2 class="mb-3 text-center">Recent Log-In's</h2>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Log ID</th>
                        <th scope="col">Date</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Purpose/Destination</th>
                        <th scope="col">Time In</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                        $stmt = $conn->prepare("SELECT * FROM tbl_visitors ORDER BY tbl_visitor_id DESC LIMIT 3");
                        $stmt->execute();
        
                        $result = $stmt->fetchAll();
        
                        foreach ($result as $row) {
                            $visitorID = $row["tbl_visitor_id"];
                            $date = $row["date"];
                            $name = $row["name"];
                            $purposeDestination = $row["purpose_destination"];
                            $timeIn = $row["time_in"];
                        ?>

                        <tr>
                            <th scope="row"><?= $visitorID ?></th>
                            <td><?= $date ?></td>
                            <td><?= $name ?></td>
                            <td><?= $purposeDestination ?></td>
                            <td><?= $timeIn ?></td>
                        </tr>

                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>
    

   

    <!-- Script  -->
    <script src="script.js"></script>
</body>
</html>