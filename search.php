<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>All Students</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      padding: 40px;
      text-align: center;
    }
    h2 {
      color: #007bff;
      margin-bottom: 20px;
    }
    table {
      border-collapse: collapse;
      width: 90%;
      max-width: 1000px;
      margin: auto;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    th, td {
      border: 1px solid #ccc;
      padding: 12px;
      text-align: center;
    }
    th {
      background-color: #007bff;
      color: white;
    }
    tr:nth-child(even) {
      background-color: #f9f9f9;
    }
  </style>
</head>
<body>

<h2>All Student Records</h2>

<?php

include 'connection.php';

$sql = "SELECT * FROM student ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table>
          <tr><th>ID</th><th>Name</th><th>Stream</th><th>College</th><th>Fees</th></tr>";
  while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['stream']}</td>
            <td>{$row['college']}</td>
            <td>{$row['fees']}</td>
          </tr>";
  }
  echo "</table>";
} else {
  echo "<p style='color:red;'>No students found in database.</p>";
}

$conn->close();
?>

</body>
</html>
