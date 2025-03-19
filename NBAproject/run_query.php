<?php
include("php/db_connect.php");

$query_id = $conn->real_escape_string($_GET['query']);
$queries = [
    1 => "SELECT p.PlayerFName, p.PlayerLName, t.TeamName, g.Date, pg.Points FROM Player p JOIN Team t ON p.TeamID = t.TeamID JOIN PlayerGame pg ON p.PlayerID = pg.PlayerID JOIN Game g ON pg.GameID = g.GameID WHERE pg.Points > 25",
    2 => "SELECT TeamName, RingsWon FROM Team WHERE RingsWon > 2",
    3 => "SELECT PlayerFName, PlayerLName, Height FROM Player WHERE Height > (SELECT AVG(Height) FROM Player)",
    4 => "SELECT t.TeamName, SUM(pg.Points) AS TotalPoints FROM Team t JOIN Player p ON t.TeamID = p.TeamID JOIN PlayerGame pg ON p.PlayerID = pg.PlayerID GROUP BY t.TeamName",
    5 => "SELECT t.TeamName, c.CoachFName, c.CoachLName FROM Team t LEFT JOIN Coach c ON t.TeamID = c.TeamID"
];

if (isset($queries[$query_id])) {
    $result = $conn->query($queries[$query_id]);

    if ($result && $result->num_rows > 0) {
        echo "<h2>Query Results</h2>";
        echo "<table border='1'>";
        // Display headers
        echo "<tr>";
        while ($field = $result->fetch_field()) {
            echo "<th>{$field->name}</th>";
        }
        echo "</tr>";
        // Display rows
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . htmlspecialchars($value) . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No results found for this query.</p>";
    }
} else {
    echo "<p>Invalid query ID.</p>";
}

closeConnection($conn);
?>