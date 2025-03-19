<?php
include("php/db_connect.php");

if (isset($_POST['sql_query'])) {
    $sql_query = $_POST['sql_query'];
    $result = $conn->query($sql_query);

    if ($result) {
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
        echo "<p>Error executing query: " . $conn->error . "</p>";
    }
} else {
    echo "<p>No query submitted.</p>";
}

closeConnection($conn);
?>