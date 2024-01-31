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
    $name = $_POST['teacher_name'];
    $department = $_POST['department'];
    //Sending form data to sql db.
    mysqli_query($connect,"INSERT INTO Members (name, address, member_type) VALUES ('$name', '$address', '$type');");
    $mid = mysqli_insert_id($connect);
    mysqli_query($connect,"INSERT INTO Teacher (member_id, teacher_name, department) VALUES ('$mid', '$name', '$department');");
    echo "<p>success</p>";
    echo '<a href="maintenance.php">maintenance</a>';            
?>
         