<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Delete Student</title>
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
      color: #dc3545;
      font-size: 1.8em;
      margin-bottom: 20px;
    }

    form {
      background-color: #fff;
      padding: 25px 30px;
      width: 100%;
      max-width: 350px;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      border: 1px solid #ccc;
    }

    label {
      font-size: 0.95em;
      font-weight: 500;
      margin-bottom: 6px;
      display: block;
    }

    input[type="text"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 0.95em;
    }

    input[type="submit"] {
      background-color: #dc3545;
      color: #fff;
      border: none;
      padding: 10px;
      width: 100%;
      border-radius: 5px;
      font-size: 1em;
      cursor: pointer;
      transition: background-color 0.2s ease;
    }

    input[type="submit"]:hover {
      background-color: #c82333;
    }

    .message {
      text-align: center;
      margin-top: 20px;
      font-size: 1em;
      font-weight: 500;
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

  <h2>Delete Student Record</h2>

  <form method="POST">
    <label for="student_id">Enter Student ID:</label>
    <input type="text" name="student_id" id="student_id" required>
    <input type="submit" value="Delete">
  </form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include 'connection.php';

  $stu_id = $_POST['student_id'];

  $sql = "DELETE FROM student WHERE id = $stu_id";
  if ($conn->query($sql) === TRUE) {
    if ($conn->affected_rows > 0) {
      echo "<div class='message success'>Record deleted successfully.</div>";
    } else {
      echo "<div class='message error'>No record found with ID $stu_id.</div>";
    }
  } else {
    echo "<div class='message error'>Error: " . $conn->error . "</div>";
  }

  $conn->close();
}
?>


</body>
</html>
