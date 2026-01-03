<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Student Management Dashboard</title>
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      background-color: #f0f2f5;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      margin: 0;
    }
    h1 {
      color: #007bff;
      margin-bottom: 40px;
      font-size: 2.2em;
    }

    .dashboard {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
      max-width: 600px;
    }

    a.button {
      text-decoration: none;
      padding: 16px 24px;
      border-radius: 8px;
      font-size: 1em;
      font-weight: 500;
      color: white;
      transition: background-color 0.2s ease;
      min-width: 200px;
      text-align: center;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .add { background-color: #28a745; }
    .view { background-color: #007bff; }
    .search { background-color: #17a2b8; }
    .update { background-color: #ffc107; color: black; }
    .delete { background-color: #dc3545; }

    a.button:hover {
      filter: brightness(1.1);
    }
  </style>
</head>
<body>

  <h1>📚 Student Management Dashboard</h1>

  <div class="dashboard">
    <a class="button add" href="form.php">➕ Add Student</a>
    <a class="button view" href="search.php">📋 View Students</a>
    <a class="button search" href="fetch.php">🔍 Search</a>
    <a class="button update" href="update.php">✏️ Update</a>
    <a class="button delete" href="delete.php">❌ Delete</a>
  </div>

</body>
</html>