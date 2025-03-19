<?php
include("php/db_connect.php");
?>

<!DOCTYPE html>
<html>
<head>
  <title>NBA Players</title>
  <link rel="stylesheet" href="https://css1.seattleu.edu/~lil/template.css" />
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
    <?php
    $teamID = isset($_GET['team_id']) ? intval($_GET['team_id']) : null;

    if ($teamID) {
        // Get the team name
        $teamQuery = "SELECT TeamName FROM Team WHERE TeamID = $teamID";
        $teamResult = $conn->query($teamQuery);
        $teamName = ($teamResult && $teamResult->num_rows > 0)
            ? $teamResult->fetch_assoc()['TeamName']
            : "Unknown Team";

        echo "<h1>Players on " . htmlspecialchars($teamName) . "</h1>";

        $playerQuery = "
            SELECT PlayerFName, PlayerLName, Position, Height, Weight, DOB, ContractDetails
            FROM Player
            WHERE TeamID = $teamID
        ";
    } else {
        echo "<h1>All NBA Players</h1>";

        $playerQuery = "
            SELECT PlayerFName, PlayerLName, Position, Height, Weight, DOB, ContractDetails
            FROM Player
        ";
    }

    $playerResult = $conn->query($playerQuery);

    if ($playerResult && $playerResult->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                  <th>Name</th>
                  <th>Position</th>
                  <th>Height</th>
                  <th>Weight</th>
                  <th>Date of Birth</th>
                  <th>Contract</th>
                </tr>";
        while ($player = $playerResult->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($player['PlayerFName'] . " " . $player['PlayerLName']) . "</td>";
            echo "<td>" . htmlspecialchars($player['Position']) . "</td>";
            echo "<td>" . htmlspecialchars($player['Height']) . "</td>";
            echo "<td>" . htmlspecialchars($player['Weight']) . "</td>";
            echo "<td>" . htmlspecialchars($player['DOB']) . "</td>";
            echo "<td>" . htmlspecialchars($player['ContractDetails']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No players found.</p>";
    }

    closeConnection($conn);
    ?>

    <p><a href="index.php">Back to Home</a></p>
  </div>
</body>
</html>
