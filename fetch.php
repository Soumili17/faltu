<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Fetch Student by Fields</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f2f5;
      padding: 40px;
      text-align: center;
    }
    form {
      background-color: white;
      padding: 20px;
      max-width: 600px;
      margin: auto;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    input[type="text"], input[type="number"] {
      padding: 10px;
      width: 46%;
      margin: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    input[type="submit"] {
      padding: 10px 20px;
      margin-top: 10px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }
    table {
      border-collapse: collapse;
      margin: 30px auto;
      width: 90%;
      max-width: 1000px;
    }
    th, td {
      border: 1px solid #ccc;
      padding: 12px;
    }
    th {
      background-color: #007bff;
      color: white;
    }
    tr:nth-child(even) {
      background-color: #f9f9f9;
    }
    .no-result {
      color: red;
      margin-top: 20px;
    }
  </style>
</head>
<body>

<h2>Fetch Specific Student</h2>

<form method="POST">
  <input type="number" name="id" placeholder="ID">
  <input type="text" name="name" placeholder="Name">
  <input type="text" name="stream" placeholder="Stream">
  <input type="text" name="college" placeholder="College">
  <input type="number" name="fees" placeholder="Fees"><br>
  <input type="submit" value="Search">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include 'connection.php';
  $conditions = [];

  if (!empty($_POST['id']))      $conditions[] = "id = " . $conn->real_escape_string($_POST['id']);
  if (!empty($_POST['name']))    $conditions[] = "name LIKE '%" . $conn->real_escape_string($_POST['name']) . "%'";
  if (!empty($_POST['stream']))  $conditions[] = "stream LIKE '%" . $conn->real_escape_string($_POST['stream']) . "%'";
  if (!empty($_POST['college'])) $conditions[] = "college LIKE '%" . $conn->real_escape_string($_POST['college']) . "%'";
  if (!empty($_POST['fees']))    $conditions[] = "fees = " . $conn->real_escape_string($_POST['fees']);

  $where = count($conditions) > 0 ? "WHERE " . implode(" AND ", $conditions) : "";

  $sql = "SELECT * FROM student $where ORDER BY id DESC";
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
    echo "<div class='no-result'>No records found matching your search.</div>";
  }

  $conn->close();
}
?>

</body>
</html>
