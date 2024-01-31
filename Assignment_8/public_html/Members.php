<!DOCTYPE html>
<html>
<head>
<title>Member page result</title>
</head>
<body>
<?php
    $connect = mysqli_connect("localhost", "group26admin", "ButterEnglish", "group26");
      if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
      $name = $_POST['name'];
      $address = $_POST['address'];
      $type = $_POST['member_type'];
      mysqli_query($connect,"INSERT INTO Members (name, address, member_type) VALUES ('$name', '$address', '$type');");
      echo "<p>success</p>";
      echo '<a href="maintenance.php">maintenance</a>';                      
?>
</body>
</html>