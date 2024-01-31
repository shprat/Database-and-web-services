<?php      
    session_start();
   $connect = mysqli_connect("localhost", "group26admin", "ButterEnglish", "group26");
   if (mysqli_connect_errno())
     {
         echo "Failed to connect to MySQL: " . mysqli_connect_error();
     } 
    $username = $_POST['username'];  
    $password = $_POST['password'];  
      
        //to prevent from mysqli injection  
        //$username = stripcslashes($username);  
        //$password = stripcslashes($pasword);  
        //$username = mysqli_real_escape_string($connect, $username);  
        //$password = mysqli_real_escape_string($connect, $password);  
      
    $sql = "SELECT A.username FROM Admins A WHERE A.username='$username' AND A.pasword='$password' LIMIT 1";  
    $result = mysqli_query($connect, $sql);  
    $row = mysqli_fetch_assoc($result);  
    $count = mysqli_num_rows($result); 
        
    if($count == 1){  
        echo "<h1><center> Login successful </center></h1>";  
        $_SESSION['username'] = $row[username];
        header("Location: maintenance.php");
        die();
    }  
    else{  
        echo "<h1> Login failed. Invalid username or password.</h1>";  
    }     
?> 