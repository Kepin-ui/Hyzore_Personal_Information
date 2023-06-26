<?php
include '../../conn.php';
include '../logged.php';

if (isset($_POST['add-user'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $epassword = password_hash($password, PASSWORD_DEFAULT);

  $sql = "SELECT * FROM user WHERE username='$username'";
  $result = mysqli_query($conn, $sql);
  if (!$result->num_rows > 0) {
    $sql = "INSERT INTO user (username, password) VALUES ('$username', '$epassword')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      header("location:add-user.php");
      $kode_user = "";
      $username = "";
      $_POST['epassword'] = "";
    } else {
      echo "<script>alert('Something Wrong')</script>";
    }
  } else {
    header("location:add-user.php");
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Add</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    body {
      background-color: #222;
      color: #fff;
      font-family: Arial, sans-serif;
    }

    .container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      text-align: center;
    }

    .login-form {
      background-color: #333;
      padding: 30px;
      border-radius: 4px;
    }

    h1 {
      margin-bottom: 30px;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: none;
      background-color: #444;
      color: #fff;
    }

    button {
      width: 100%;
      padding: 10px;
      border: none;
      background-color: #4CAF50;
      color: #fff;
      cursor: pointer;
    }

    button:hover {
      background-color: #45a049;
    }

    @media (max-width: 480px) {
      .container {
        width: 90%;
      }
    }
  </style>
</head>

<body>
  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <h3 class="text-center mb-4">Add User</h3>
        <form method="post" enctype="multipart/form-data" class="login-form">
          <div class="form-group">
            <input type="text" name="username" class="form-control rounded-left" placeholder="Username" required>
          </div>
          <div class="form-group d-flex">
            <input type="password" name="password" class="form-control rounded-left" placeholder="Password" required>
          </div>
          <div class="form-group">
            <button type="submit" name="add-user" class="form-control btn btn-primary rounded submit px-3">Add</button>
          </div>
        </form>
      </div>
    </div>
  </section>

</body>

</html>