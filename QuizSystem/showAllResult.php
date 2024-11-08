

<!DOCTYPE html>
<html lang="en">
<head>
    <title>allresult</title>
</head>
<body style="background-color: rgb(198, 225, 243);">
    
<h1>Chemistry Result of All Student</h1>

<?php

$conn = new mysqli("localhost", "root", "", "student_info");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, result FROM result";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    echo "<table border='1'>
<tr>
<th>ID</th>
<th>Name</th>
<th>Result</th>
</tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
<td>" . htmlspecialchars($row['id']) . "</td>
<td>" . htmlspecialchars($row['name']) . "</td>
<td>" . htmlspecialchars($row['result']) . "</td>
</tr>";
    }

    echo "</table>";
} else {
    echo "No results found.";
}
$conn->close();
?>


</body>
</html>

