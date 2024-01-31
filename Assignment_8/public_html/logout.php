<?php 
    session_start();
    if(isset($_GET['logout']))
    {
        session_destroy();
        header("location: https://clabsql.clamv.jacobs-university.de/~prshah/login/login.php");
    }

?>