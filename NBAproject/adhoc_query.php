<?php
include("php/db_connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ad-Hoc Query</title>
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

        <h1>Ad-Hoc Query</h1>
        <form method="POST" action="execute_query.php">
            <textarea name="sql_query" rows="5" cols="50" placeholder="Enter your SQL query here"></textarea><br>
            <input type="submit" name="submit" value="Submit">
            <input type="reset" value="Clear">
        </form>
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