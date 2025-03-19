<?php
include("php/db_connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NBA Stats Tracker</title>
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

        <h1>NBA STATS TRACKER</h1>
        <h2>Designed and Built by Amsalu Schmidt & Andrew Yu, Seattle U Professional Programmers</h2>

        <p class="call-to-action">CLICK ON THE LINKS BELOW TO EXPLORE OUR NBA DATABASE!!</p>

        <!-- Navigation Links -->
        <ul class="nav-links">
            <li><a href="teams.php">View Teams</a></li>
            <li><a href="player.php">View Players</a></li>
            <li><a href="divisions.php">View Divisions</a></li>
            <li><a href="coaches.php">View Coaches</a></li>
            <li><a href="games.php">View Games</a></li>
            <li><a href="playergame.php">View Player Stats</a></li>
            <li><a href="seasons.php">View Seasons</a></li>
            <li><a href="teamseason.php">Team Season Records</a></li>
            <hr class="nba-themed-line">
            <li><a href="relations.php">View Relations</a></li>
            <li><a href="queries.php">Predefined Queries</a></li>
            <li><a href="adhoc_query.php">Ad-Hoc Query</a></li>
        </ul>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <img src="photos/nba-logo.png" alt="NBA Logo" class="nba-logo-footer">
            <p>&copy; 2025 NBA Stats Tracker. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>