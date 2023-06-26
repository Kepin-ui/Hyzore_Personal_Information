<?php
include '../../conn.php';
include '../logged.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST["title"];
    $subtitle = $_POST["subtitle"];
    $image = $_POST["image"];
    $link = $_POST["link"];
  
    $query = "UPDATE project SET title='$title', subtitle='$subtitle', image='$image', link='$link' WHERE id='$id'";
    if (mysqli_query($conn, $query)) {
      echo '
      <script>
      alert("Successfully Edit");
      window.location.href="data.php";
      </script>
      ';
    } else {
      echo "Error: " . mysqli_error($conn);
    }
  }
  
  mysqli_close($conn);
?>