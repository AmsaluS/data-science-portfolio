<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php include("php/db_connect.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Coaches</title>
  <link rel="stylesheet" href="https://css1.seattleu.edu/~lil/template.css" />
  <link rel="stylesheet" href="css/style.css">

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NBA Stats Tracker</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<<!-- Side Logos Container -->
<div class="side-logos-container">
    <div class="side-logo left-logo">
        <img src="photos/nba-logo.png" alt="NBA Logo">
    </div>
    <div class="side-logo right-logo">
        <img src="photos/nba-logo.png" alt="NBA Logo">
    </div>

  <div class="container">
    <h1>Coaches</h1>
    <table border="1">
      <tr>
        <th>Coach Name</th>
        <th>Team</th>
        <th>Role</th>
        <th>Years Experience</th>
      </tr>
      <?php
      // Fetch coach data with team names
      $sql = "
        SELECT 
          c.CoachFName, 
          c.CoachLName, 
          t.TeamName, 
          c.Role, 
          c.YearsExperience 
        FROM Coach c
        JOIN Team t ON c.TeamID = t.TeamID
      ";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>{$row['CoachFName']} {$row['CoachLName']}</td>";
          echo "<td>{$row['TeamName']}</td>";
          echo "<td>{$row['Role']}</td>";
          echo "<td>{$row['YearsExperience']}</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='4'>No coaches found.</td></tr>";
      }
      ?>
    </table>
    <p><a href='index.php'>Back to Home</a></p>
  </div>
</body>
</html>