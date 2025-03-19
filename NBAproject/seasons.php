
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php include("php/db_connect.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NBA Seasons</title>
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
        <h1>NBA Seasons</h1>
        <?php
        // Fetch data from the Season table
        $sql = "SELECT SeasonID, Year, StartDate, EndDate FROM Season";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            echo "<table border='1'>
                    <tr>
                        <th>Season ID</th>
                        <th>Year</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['SeasonID']}</td>
                        <td>{$row['Year']}</td>
                        <td>{$row['StartDate']}</td>
                        <td>{$row['EndDate']}</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No seasons found.</p>";
        }

        $conn->close();
        ?>
        <p><a href="index.php">Back to Home</a></p>
    </div>
</body>
</html>