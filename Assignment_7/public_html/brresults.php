<!DOCTYPE html>
<html>
<head>
<title>Borrows page result</title>
</head>
<body>
<?php
$connect = mysqli_connect("localhost", "group26", "prettysimple", "group26");
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$query = "INSERT INTO Borrows (member_id, book_id) VALUES 
            ('$_POST[Members]', '$_POST[Books]')";
            
            if (!mysqli_query($connect, $query))
            {
                die('Error: ' . mysqli_error($connect));
            }
            echo "<p>success</p>";
            echo '<a href="maintenance.html">maintenance</a>';
?>
</body>

</html>