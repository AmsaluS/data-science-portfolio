<?php
include("php/db_connect.php");

$table = $conn->real_escape_string($_GET['table']);
$query = "SELECT * FROM $table";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    echo "<h2>Contents of Table: $table</h2>";
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
    echo "<p>No data found in table: $table</p>";
}

closeConnection($conn);
?>