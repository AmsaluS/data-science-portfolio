<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php include("php/db_connect.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Team Season Records</title>
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
    <h1>Team Season Records</h1>
    <table border="1">
      <tr>
        <th>Team</th>
        <th>Season</th>
        <th>Record</th>
        <th>Playoff Standing</th>
      </tr>
      <?php
      // Fetch team season data with team and season information
      $sql = "
        SELECT 
          t.TeamName, 
          s.Year, 
          ts.Record, 
          ts.PlayOffStanding 
        FROM TeamSeason ts
        JOIN Team t ON ts.TeamID = t.TeamID
        JOIN Season s ON ts.SeasonID = s.SeasonID
      ";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>{$row['TeamName']}</td>";
          echo "<td>{$row['Year']}</td>";
          echo "<td>{$row['Record']}</td>";
          echo "<td>{$row['PlayOffStanding']}</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='4'>No team season records found.</td></tr>";
      }
      ?>
    </table>
    <p><a href='index.php'>Back to Home</a></p>
  </div>
</body>
</html>