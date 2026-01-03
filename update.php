<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Update Student Record</title>
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      background-color: #f4f6f8;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      margin: 0;
    }

    h2 {
      color: #007bff;
      margin-bottom: 20px;
    }

    form {
      background: #fff;
      width: 100%;
      max-width: 350px;
      padding: 25px 30px;
      border-radius: 8px;
      border: 1px solid #ccc;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    input[type="text"],
    input[type="number"] {
      width: 100%;
      padding: 9px 12px;
      margin-bottom: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 0.95em;
    }

    input[type="submit"] {
      background-color: #007bff;
      color: #fff;
      padding: 10px;
      width: 100%;
      border: none;
      border-radius: 5px;
      font-size: 1em;
      cursor: pointer;
      transition: background-color 0.2s ease;
    }

    input[type="submit"]:hover {
      background-color: #0056b3;
    }

    .message {
      text-align: center;
      margin-top: 20px;
      font-weight: 500;
      font-size: 1em;
    }

    .success {
      color: #28a745;
    }

    .error {
      color: #dc3545;
    }
  </style>
</head>
<body>

  <h2>Update Student Record</h2>

  <form method="POST">
    <label>Student ID:</label>
    <input type="number" name="id" required>

    <label>New Name:</label>
    <input type="text" name="name">

    <label>New Stream:</label>
    <input type="text" name="stream">

    <label>New College:</label>
    <input type="text" name="college">

    <label>New Fees:</label>
    <input type="number" name="fees">

    <input type="submit" name="update" value="Update">
  </form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    include 'connection.php';

    $id = $_POST['id'];
    $name = $_POST['name'];
    $stream = $_POST['stream'];
    $college = $_POST['college'];
    $fees = $_POST['fees'];

    // Build update query dynamically based on input
    $fields = [];
    if (!empty($name))    $fields[] = "name='$name'";
    if (!empty($stream))  $fields[] = "stream='$stream'";
    if (!empty($college)) $fields[] = "college='$college'";
    if (!empty($fees))    $fields[] = "fees=$fees";

    if (count($fields) > 0) {
        $sql = "UPDATE student SET " . implode(', ', $fields) . " WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            if ($conn->affected_rows > 0) {
                echo "<p class='message success'>Record updated successfully.</p>";
            } else {
                echo "<p class='message error'>No record found with ID $id.</p>";
            }
        } else {
            echo "<p class='message error'>Error: " . $conn->error . "</p>";
        }
    } else {
        echo "<p class='message error'>Please fill at least one field to update.</p>";
    }

    $conn->close();
}
?>

</body>
</html>
