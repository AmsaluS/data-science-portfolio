<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php include("php/db_connect.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Games</title>
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
    <h1>Games</h1>
    <table border="1">
      <tr>
        <th>Game ID</th>
        <th>Home Team</th>
        <th>Away Team</th>
        <th>Date</th>
        <th>Arena</th>
        <th>Final Score</th>
      </tr>
      <?php
      // Fetch game data with team names
      $sql = "
        SELECT 
          g.GameID, 
          ht.TeamName AS HomeTeam, 
          at.TeamName AS AwayTeam, 
          g.Date, 
          g.Arena, 
          g.FinalScore 
        FROM Game g
        JOIN Team ht ON g.HomeTeamID = ht.TeamID
        JOIN Team at ON g.AwayTeamID = at.TeamID
      ";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>{$row['GameID']}</td>";
          echo "<td>{$row['HomeTeam']}</td>";
          echo "<td>{$row['AwayTeam']}</td>";
          echo "<td>{$row['Date']}</td>";
          echo "<td>{$row['Arena']}</td>";
          echo "<td>{$row['FinalScore']}</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='6'>No games found.</td></tr>";
      }
      ?>
    </table>
    <p><a href='index.php'>Back to Home</a></p>
  </div>
</body>
</html>