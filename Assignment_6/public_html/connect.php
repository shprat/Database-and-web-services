<?php
    $conn = mysqli_connect("localhost", "group26", "prettysimple", "group26");
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>