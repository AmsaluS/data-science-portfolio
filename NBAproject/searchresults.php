<?php
include("php/db_connect.php");

$searchQuery = isset($_GET['search']) ? $_GET['search'] : null;

if (!$searchQuery) {
    header("Location: index.php"); // Redirect if no search term is provided
    exit();
}

$searchQuery = trim($conn->real_escape_string($_GET['search'])); // Fix: Trim and escape the search term

// Debug: Print the search query
echo "<p>Debug: Search Query = '$searchQuery'</p>";

// Search across multiple tables with detailed results
$queries = [
    "Teams" => "SELECT TeamName AS Name, City, Arena, RingsWon AS Details FROM Team WHERE TeamName LIKE '%$searchQuery%'",
    "Players" => "SELECT CONCAT(PlayerFName, ' ', PlayerLName) AS Name, Position, Height, Weight, DOB AS Details FROM Player WHERE PlayerFName LIKE '%$searchQuery%' OR PlayerLName LIKE '%$searchQuery%'",
    "Divisions" => "SELECT DivisionName AS Name, ConferenceName AS Details FROM Division WHERE DivisionName LIKE '%$searchQuery%'",
    "Coaches" => "SELECT CONCAT(CoachFName, ' ', CoachLName) AS Name, Role AS Details FROM Coach WHERE CoachFName LIKE '%$searchQuery%' OR CoachLName LIKE '%$searchQuery%'",
    "Games" => "SELECT GameID AS Name, HomeTeamID, AwayTeamID, Date AS GameDate, FinalScore AS Details FROM Game WHERE GameID LIKE '%$searchQuery%'",
    "Stats" => "SELECT PlayerID AS Name, Points, Rebounds, Assists, Steals, Blocks AS Details FROM PlayerGame WHERE PlayerID LIKE '%$searchQuery%'",
    "Seasons" => "SELECT Year AS Name, StartDate, EndDate AS Details FROM Season WHERE Year LIKE '%$searchQuery%'",
    "Records" => "SELECT TeamName AS Name, Record, PlayOffStanding AS Details FROM TeamSeason WHERE Record LIKE '%$searchQuery%'"
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Results</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="index-page">
    <div class="container">
        <h1>Search Results for: <?php echo htmlspecialchars($searchQuery); ?></h1>

        <?php
        foreach ($queries as $table => $query) {
            // Debug: Print the query being executed
            echo "<p>Debug: Executing Query for $table = '$query'</p>";

            $result = $conn->query($query);

            if ($result && $result->num_rows > 0) {
                echo "<h2>" . $table . "</h2>";
                echo "<table border='1'>
                        <tr>
                          <th>Name</th>
                          <th>Details</th>
                        </tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['Name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Details']) . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                // Debug: Print if no results are found for this query
                echo "<p>Debug: No results found for $table.</p>";
            }
        }

        if (!$result || $result->num_rows === 0) {
            echo "<p>No results found for '" . htmlspecialchars($searchQuery) . "'.</p>";
        }

        closeConnection($conn);
        ?>

        <p><a href="index.php">Return to Main Page</a></p>
    </div>
</body>
</html>