<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Student Registration</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet" />
  <style>
    :root {
      --blue: #007bff;
      --green: #28a745;
      --gray-bg: #f4f6f8;
      --gray-border: #ccc;
      --text-dark: #333;
      --focus-blue: #80bdff;
      --success-bg: #d4edda;
      --success-text: #155724;
      --error-bg: #f8d7da;
      --error-text: #721c24;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Roboto', sans-serif;
      background-color: var(--gray-bg);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      color: var(--text-dark);
    }

    h2 {
      margin-bottom: 20px;
      color: var(--blue);
      font-size: 1.8em;
      font-weight: 500;
    }

    form {
      background: #fff;
      padding: 25px 30px;
      width: 100%;
      max-width: 360px;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      border: 1px solid var(--gray-border);
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-size: 0.9em;
      font-weight: 500;
    }

    input[type="text"] {
      width: 100%;
      padding: 9px 12px;
      margin-bottom: 15px;
      border: 1px solid var(--gray-border);
      border-radius: 4px;
      font-size: 0.95em;
      transition: border-color 0.2s, box-shadow 0.2s;
    }

    input[type="text"]:focus {
      border-color: var(--blue);
      box-shadow: 0 0 0 2px var(--focus-blue);
      outline: none;
    }

    input[type="submit"] {
      background: var(--green);
      color: #fff;
      padding: 10px;
      width: 100%;
      border: none;
      border-radius: 4px;
      font-size: 1em;
      cursor: pointer;
      font-weight: 500;
      transition: background 0.2s ease;
    }

    input[type="submit"]:hover {
      background: #218838;
    }

    .success-message,
    .error-message {
      margin-top: 20px;
      padding: 12px 16px;
      max-width: 360px;
      width: 90%;
      border-radius: 6px;
      text-align: center;
      font-size: 0.95em;
      font-weight: 500;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .success-message {
      background-color: var(--success-bg);
      color: var(--success-text);
      border: 1px solid #c3e6cb;
    }

    .error-message {
      background-color: var(--error-bg);
      color: var(--error-text);
      border: 1px solid #f5c6cb;
    }
  </style>
</head>
<body>

  <h2>Register Student</h2>
  <form method="POST">
    <label for="name">Full Name</label>
    <input type="text" id="name" name="name" required />

    <label for="stream">Stream</label>
    <input type="text" id="stream" name="stream" required />

    <label for="college">College</label>
    <input type="text" id="college" name="college" required />

    <label for="fees">Fees</label>
    <input type="text" id="fees" name="fees" required />

    <input type="submit" value="Register" />
  </form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include 'connection.php'; // Ensure this file defines $conn

  $my_name = $_POST['name'];
  $my_stream = $_POST['stream'];
  $my_college = $_POST['college'];
  $college_fees = $_POST['fees'];

  $sql = "INSERT INTO student(name, stream, college, fees) 
          VALUES ('$my_name', '$my_stream', '$my_college', $college_fees)";

  if ($conn->query($sql) === TRUE) {
    echo "<div class='success-message'>Student Registered Successfully</div>";
  } else {
    echo "<div class='error-message'>Error: Could not register student. Please try again.</div>";
  }
}
?>

</body>
</html>
