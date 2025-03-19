<?php
include("php/db_connect.php");
?>

<!DOCTYPE html>
<html>
<head>
  <title>NBA Teams</title>
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
    <h1>NBA Teams</h1>

    <?php
    // Check if division_id is passed in the URL
    if (isset($_GET['division_id'])) {
        $division_id = $conn->real_escape_string($_GET['division_id']);

        // Fetch division name for the header
        $division_sql = "SELECT DivisionName FROM Division WHERE DivisionID = $division_id";
        $division_result = $conn->query($division_sql);
        $division_name = $division_result->fetch_assoc()['DivisionName'];

        echo "<h2>Teams in Division: $division_name</h2>";

        // Fetch teams in the selected division
        $query = "
            SELECT t.TeamID, t.TeamName, t.City, t.Arena, t.RingsWon, d.DivisionName
            FROM Team t
            JOIN Division d ON t.DivisionID = d.DivisionID
            WHERE t.DivisionID = $division_id
        ";
    } else {
        // Fetch all teams if no division_id is provided
        $query = "
            SELECT t.TeamID, t.TeamName, t.City, t.Arena, t.RingsWon, d.DivisionName
            FROM Team t
            JOIN Division d ON t.DivisionID = d.DivisionID
        ";
    }

    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                  <th>Team Name</th>
                  <th>City</th>
                  <th>Arena</th>
                  <th>Division</th>
                  <th>Rings Won</th>
                  <th>Players</th>
                </tr>";
        while ($team = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($team['TeamName']) . "</td>";
            echo "<td>" . htmlspecialchars($team['City']) . "</td>";
            echo "<td>" . htmlspecialchars($team['Arena']) . "</td>";
            echo "<td>" . htmlspecialchars($team['DivisionName']) . "</td>";
            echo "<td>" . htmlspecialchars($team['RingsWon']) . "</td>";
            echo "<td><a href='player.php?team_id={$team['TeamID']}'>View Players</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No teams found.</p>";
    }

    closeConnection($conn);
    ?>
    <p><a href="index.php">Back to Home</a></p>
  </div>
</body>
</html>