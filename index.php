<?php include ("conn.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Log-book</title>

    <link rel="stylesheet" type="text/css" href="style.css">
    
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
                <a class="nav-link" href="http://erenskylb.000webhostapp.com/visitors">Home</a>
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

    <div class="container mt-5 purple-box" style="text-align: center; display: in-line; justify-content: center; background-color: white; border-radius: 20px; padding: 1%;">
        <h1 class="text-center">Digital Log-Book</h1>
        <p class="lead text-center">A very efficient record holder. A digital log-book that can be used in anything, may it be for libraries, classrooms, and etc.</p>
        <div class="d-flex justify-content-center">
            <a href="lb.php" class="btn btn-primary">Log-In Here!</a>
        </div>
    </div>
</div>

<script>
    document.getElementById('timeInButton').onclick = function () {
        window.location.href = "logbook.php";
    };
</script>


   
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Script  -->
    <script src="script.js"></script>
</body>
</html>