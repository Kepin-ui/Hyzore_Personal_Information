<?php
session_start();
include "../conn.php";

if (isset($_SESSION['username'])) {
    header("Location: ./forbinden/data.php");
    exit();
}
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['id'] = $user['id'];

            header("Location: ./forbinden/data.php");
            exit();
        } else {
            $error = "Invalid username or password";
        }
    } else {
        $error = "Invalid username or password";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Xyletn - Login</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
            width: 94%;
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
                <h3 class="text-center mb-4">Sign In</h3>
                <form method="post" enctype="multipart/form-data" class="login-form">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control rounded-left" placeholder="Username"
                            required>
                    </div>
                    <div class="form-group d-flex">
                        <input type="password" name="password" class="form-control rounded-left" placeholder="Password"
                            required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="login"
                            class="form-control btn btn-primary rounded submit px-3">Login</button>
                    </div>
                    <?php if (isset($error)): ?>
                        <p class="error">
                            <?php echo $error; ?>
                        </p>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </section>
</body>

</html>