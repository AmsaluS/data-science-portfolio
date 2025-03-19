<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php include("php/db_connect.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Divisions</title>
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
    <h1>Divisions</h1>
    <table border="1">
      <tr>
        <th>Division ID</th>
        <th>Division Name</th>
        <th>Conference</th>
        <th>Number of Teams</th>
        <th>View Teams</th>
      </tr>
      <?php
      // Fetch division data with dynamic team count
      $sql = "
        SELECT 
          d.DivisionID, 
          d.DivisionName, 
          d.ConferenceName, 
          COUNT(t.TeamID) AS NumberOfTeams 
        FROM Division d
        LEFT JOIN Team t ON d.DivisionID = t.DivisionID
        GROUP BY d.DivisionID, d.DivisionName, d.ConferenceName
      ";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>{$row['DivisionID']}</td>";
          echo "<td>{$row['DivisionName']}</td>";
          echo "<td>{$row['ConferenceName']}</td>";
          echo "<td>{$row['NumberOfTeams']}</td>";
          // Pass DivisionID as a query parameter
          echo "<td><a href='teams.php?division_id={$row['DivisionID']}'>View Teams</a></td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='5'>No divisions found.</td></tr>";
      }
      ?>
    </table>
    <p><a href='index.php'>Back to Home</a></p>
  </div>
</body>
</html>