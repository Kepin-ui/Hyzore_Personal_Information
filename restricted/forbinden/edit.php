<?php
include "../../conn.php";
include "../logged.php";
?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      background-color: #222;
      color: #fff;
      font-family: Arial, sans-serif;
    }
    
    .form-container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: #333;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }
    
    .form-container label, .form-container input {
      display: block;
      margin-bottom: 10px;
    }
    
    .form-container input[type="text"], .form-container input[type="email"] {
      width: 95%;
      padding: 10px;
      border: none;
      background-color: #444;
      color: #fff;
      border-radius: 3px;
    }

	.form-container textarea {
      width: 95%;
      height: 120px;
      padding: 10px;
      border: none;
      background-color: #444;
      color: #fff;
      border-radius: 3px;
      resize: none;
    }

    .form-container input[type="submit"], .form-container input[type="button"] {
      padding: 10px 20px;
      border: none;
      background-color: #007bff;
      color: #fff;
      cursor: pointer;
      border-radius: 3px;
    }
    
    .form-container input[type="submit"]:hover, .form-container input[type="button"]:hover {
      background-color: #0056b3;
    }
    
    .form-container input[type="submit"]:focus, .form-container input[type="button"]:focus {
      outline: none;
    }
    
    @media (max-width: 600px) {
      .form-container {
        max-width: 100%;
        padding: 10px;
      }
    }
  </style>
</head>
<body>
    <?php 
    $query = mysqli_query($conn, "SELECT * FROM project WHERE id='$_GET[id]'");
    $data = mysqli_fetch_array($query);
    ?>
  <div class="form-container">
    <form action="edit-method.php" method="POST">
      <label for="title">ID:</label>
      <input type="text" id="id" name="id" placeholder="" value="<?php echo $data['id'];?>" maxlength="60" readonly>
      
      <label for="title">Title:</label>
      <input type="text" id="title" name="title" placeholder="Title (Max 60 Word)" value="<?php echo $data['title'];?>" maxlength="60" required>
      
      <label for="subtitle">Sub Title:</label>
	  <textarea id="subtitle" name="subtitle" placeholder="Sub Title (Max 250 Word)" maxlength="250"><?php echo $data['subtitle'];?></textarea required>
      
      <label for="image">Image:</label>
      <input type="text" id="image" name="image" placeholder="Image link" value="<?php echo $data['image'];?>" required>
      
      <label for="link">Link:</label>
      <input type="text" id="link" name="link" placeholder="Project Link" value="<?php echo $data['link'];?>" required>
      
      <div style="display: flex; justify-content: space-between; margin-top: 20px;">
        <a href="data.php"><input type="button" value="Back"></a>
        <input type="submit" value="Send">
      </div>
    </form>
  </div>
</body>
</html>
