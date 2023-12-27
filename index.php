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
            <li class="nav-item active">
                <a class="nav-link" href="http://localhost/index.php" style="color: #39FF14;">Home<span class="sr-only">(current)</span></a>
            </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5 purple-box">
        <h1 class="text-center">Digital Log-Book</h1>
        <p class="lead text-center">A very efficient record holder. A digital log-book that can be used in anything, may it be for libraries, classrooms, and etc.</p>
        <div class="d-flex justify-content-center">
            <a href="logbook.php" class="btn btn-primary">Log-In Here!</a>
        </div>
    </div>
</div>

<script>
    document.getElementById('timeInButton').onclick = function () {
        window.location.href = "logbook.php";
    };
</script>


   

    <!-- Script  -->
    <script src="script.js"></script>
</body>
</html>