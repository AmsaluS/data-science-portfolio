<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("php/db_connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Player Game Stats</title>
    <link rel="stylesheet" href="https://css1.seattleu.edu/~lil/template.css">
    <link rel="stylesheet" href="css/style.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NBA Stats Tracker</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Side Logos Container -->
<div class="side-logos-container">
    <div class="side-logo left-logo">
        <img src="photos/nba-logo.png" alt="NBA Logo">
    </div>
    <div class="side-logo right-logo">
        <img src="photos/nba-logo.png" alt="NBA Logo">
    </div>

    <div class="container">
        <h1>NBA Player Game Stats</h1>

        <?php
        $playerID = isset($_GET['player_id']) ? intval($_GET['player_id']) : null;

        if ($playerID) {
            $playerQuery = "SELECT PlayerFName, PlayerLName FROM Player WHERE PlayerID = $playerID";
            $playerResult = $conn->query($playerQuery);
            if ($playerResult && $playerResult->num_rows > 0) {
                $player = $playerResult->fetch_assoc();
                echo "<h2>Stats for {$player['PlayerFName']} {$player['PlayerLName']}</h2>";
            }

            $sql = "
              SELECT 
                g.Date, 
                pg.Points, 
                pg.Assists, 
                pg.Rebounds, 
                pg.Steals, 
                pg.Blocks, 
                pg.MinsPG, 
                pg.TurnOvers 
              FROM PlayerGame pg
              JOIN Game g ON pg.GameID = g.GameID
              WHERE pg.PlayerID = $playerID
              ORDER BY g.Date DESC
            ";
        } else {
            echo "<h2>All Player Stats</h2>";
            $sql = "
              SELECT 
                p.PlayerFName, 
                p.PlayerLName, 
                g.Date, 
                pg.Points, 
                pg.Assists, 
                pg.Rebounds, 
                pg.Steals, 
                pg.Blocks, 
                pg.MinsPG, 
                pg.TurnOvers 
              FROM PlayerGame pg
              JOIN Game g ON pg.GameID = g.GameID
              JOIN Player p ON pg.PlayerID = p.PlayerID
              ORDER BY p.PlayerLName, g.Date DESC
            ";
        }

        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            echo "<table border='1'>
                    <tr>
                        <th>Player</th>
                        <th>Game Date</th>
                        <th>Points</th>
                        <th>Assists</th>
                        <th>Rebounds</th>
                        <th>Steals</th>
                        <th>Blocks</th>
                        <th>Minutes Played</th>
                        <th>Turnovers</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                $playerName = isset($row['PlayerFName']) ? "{$row['PlayerFName']} {$row['PlayerLName']}" : '';
                echo "<tr>
                        <td>$playerName</td>
                        <td>{$row['Date']}</td>
                        <td>{$row['Points']}</td>
                        <td>{$row['Assists']}</td>
                        <td>{$row['Rebounds']}</td>
                        <td>{$row['Steals']}</td>
                        <td>{$row['Blocks']}</td>
                        <td>{$row['MinsPG']}</td>
                        <td>{$row['TurnOvers']}</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No game statistics found.</p>";
        }

        $conn->close();
        ?>
        <p><a href="index.php">Back to Home</a></p>
    </div>
</body>
</html>
