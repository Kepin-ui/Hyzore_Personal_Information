<?php
include '../../conn.php';
include '../logged.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
    $id = $_GET['id'];
  
    $query = "DELETE FROM project WHERE id='$id'";
    if (mysqli_query($conn, $query)) {
      echo '
      <script>
      alert("Successfully Delete");
      window.location.href="data.php";
      </script>
      ';
    } else {
      echo "Error: " . mysqli_error($conn);
    }
  mysqli_close($conn);
  ?>
?>