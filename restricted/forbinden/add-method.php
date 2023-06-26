<?php
include '../../conn.php';
include '../logged.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $subtitle = $_POST["subtitle"];
    $image = $_POST["image"];
    $link = $_POST["link"];

    $query = "INSERT INTO project (title, subtitle, image, link) VALUES ('$title', '$subtitle', '$image', '$link')";
    if (mysqli_query($conn, $query)) {
      echo '
      <script>
      alert("Successfully Add");
      window.location.href="add.php";
      </script>
      ';
    } else {
      echo "Error: " . mysqli_error($conn);
    }
  }
  
  mysqli_close($conn);
  ?>
?>