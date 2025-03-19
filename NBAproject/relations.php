<?php
include("php/db_connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relations</title>
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

        <h1>Relations</h1>
        <p>Click on a relation to view its contents:</p>
        <ul class="nav-links">
            <li><a href="view_table.php?table=Team">Team</a></li>
            <li><a href="view_table.php?table=Player">Player</a></li>
            <li><a href="view_table.php?table=Division">Division</a></li>
            <li><a href="view_table.php?table=Coach">Coach</a></li>
            <li><a href="view_table.php?table=Game">Game</a></li>
            <li><a href="view_table.php?table=PlayerGame">PlayerGame</a></li>
            <li><a href="view_table.php?table=Season">Season</a></li>
            <li><a href="view_table.php?table=TeamSeason">TeamSeason</a></li>
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