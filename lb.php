<?php include ("conn.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <!--style-->
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

<form action="fh.php" method="post" onsubmit="return submitForm();">
    <div class="formp" style="background-color: #ffffff; padding: 1%;">
    <h2 style="text-align: center;">Log Book Form</h2>
        <label for="name">Full Name:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Example: Dave Dragonheart" required>
        <label for="contactNumber">Contact Number:</label>
        <input type="text" class="form-control" id="contactNumber" name="contact_number" placeholder="Example: 09123456789" required>
        <label for="address">Address:</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="Example: Purok. Amoni, Brgy. Amona" required>
        <label for="purposeDestination">Purpose/Destination:</label>
        <input type="text" class="form-control" id="purposeOffice" name="purpose_destination" style="margin-bottom: 10px;" placeholder="Example: Lagaw" required>
        <!-- Add a read-only input field for the date -->
        <label for="dateDisplay">Date:</label>
        <input type="text" class="form-control" id="dateDisplay" name="date_display" readonly>
        <!-- Keep the hidden input field for the date -->
        <input type="hidden" id="date" name="date">
        <div class="d-flex justify-content-end" style="margin-right: 20px; padding: 1%;">
            <button type="submit" class="btn btn-success" style="margin-bottom: 30px;">Submit</button>
            <button type="button" class="btn btn-danger ml-3" style="margin-bottom: 30px; margin-left: 10px;" onclick="clearForm()">Clear</button>
        </div>
    </div>
</form>



<!--
    <div class="formp" style="background-color: #ffffff;">
    <div class="formc" style="padding: 1%;">
        <h2 style="text-align: center;">Log Book Form</h2>
        <label for="name">Full Name:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Example: Dave Dragonheart" required>
        <label for="contactNumber">Contact Number:</label>
        <input type="text" class="form-control" id="contactNumber" name="contact_number" placeholder="Example: 09123456789" required>
        <label for="address">Address:</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="Example: Purok. Amoni, Brgy. Amona" required>
        <label for="purposeDestination">Purpose/Destination:</label>
        <input type="text" class="form-control" id="purposeOffice" name="purpose_destination" style="margin-bottom: 10px;" placeholder="Example: Lagaw" required>
        <div class="d-flex justify-content-end" style="margin-right: 20px; padding: 1%;">
            <button type="submit" class="btn btn-success" style="margin-bottom: 30px;" onclick="return showAlert()">Submit</button>
            <button type="button" class="btn btn-danger ml-3" style="margin-bottom: 30px; margin-left: 10px;" onclick="clearForm()">Clear</button>
        </div>
    </div>
</div>
-->

<script>
window.onload = function() {
    // Get the current date
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;

    // Set the date to the read-only input field
    document.getElementById('dateDisplay').value = today;

    // Set the date to the hidden input field
    document.getElementById('date').value = yyyy + "-" + mm + "-" + dd;
}

function showAlert() {
    var name = document.getElementById('name').value;
    var contactNumber = document.getElementById('contactNumber').value;
    var address = document.getElementById('address').value;
    var purposeOffice = document.getElementById('purposeOffice').value;

    if (name && contactNumber && address && purposeOffice) {
        alert('Recorded successfully');
        return true;
    } else {
        alert('Please fill all the fields');
        return false;
    }
}

function submitForm() {
    // Check if all fields are filled
    if (showAlert()) {
        // Submit the form
        return true;
    } else {
        // If not, prevent form submission
        return false;
    }
}

function clearForm() {
    document.getElementById('name').value = '';
    document.getElementById('contactNumber').value = '';
    document.getElementById('address').value = '';
    document.getElementById('purposeOffice').value = '';
}
</script>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script src="script.js"></script>
</body>
</html>