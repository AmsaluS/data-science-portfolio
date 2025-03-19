<?php
include("php/db_connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Predefined Queries</title>
    <link rel="stylesheet" href="https://css1.seattleu.edu/~lil/template.css" />
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="index-page">
    <div class="container">

        <!-- Basketball Hoops -->
        <img src="photos/hoop.png" alt="Basketball Hoop Left" class="hoop-img left-hoop">
        <img src="photos/hoop.png" alt="Basketball Hoop Right" class="hoop-img right-hoop">

        <!-- Top NBA Logo with floating effect -->
        <div class="logo-container">
            <img src="photos/nba-logo.png" alt="NBA Logo" class="nba-logo floating-logo">
        </div>

        <h1>Predefined Queries</h1>
        <p>Click on a query to view its results:</p>
        <ul class="nav-links">
            <li><a href="run_query.php?query=1">Players scoring more than 25 points in a game</a></li>
            <li><a href="run_query.php?query=2">Teams with more than 2 championship rings</a></li>
            <li><a href="run_query.php?query=3">Players taller than the average height</a></li>
            <li><a href="run_query.php?query=4">Total points scored by each team</a></li>
            <li><a href="run_query.php?query=5">Teams and their head coaches</a></li>
        </ul>
        <p><a href="index.php">Back to Home</a></p>
    </div>

    <footer class="footer">
        <div class="container">
            <img src="photos/nba-logo.png" alt="NBA Logo" class="nba-logo-footer">
            <p>&copy; 2025 NBA Stats Tracker. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>