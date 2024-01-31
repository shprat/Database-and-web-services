<?php 
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: login.html");
        die();
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=1440, maximum-scale=1.0" />
  </head>
  <body style="margin: 0; background: #b86464">
    <input type="hidden" id="anPageName" name="page" value="maintenance-page" />
    <div class="container-center-horizontal">
      <div class="maintenance-page screen">
        <div class="overlap-group">
          <div class="rectangle-25"></div>
          <img class="whats-app-image-10-19-at-1216-1" src="img/onlinelib.jpeg" />
          <div class="text-1"><h1 style="margin: top 10px;">Welcome to Maintenance Page</h1></div>
        </div>
        <div class="text-2"><h3>Here you will find all the form links to submit and fill all the details</h3></div>
        <div class="entities roboto-normal-black-29px">Entities</div>
        <div class="frame"><div class="place roboto-normal-black-29px"><a href = "Member.html">Members</a></div></div><br><br>
        <div class="frame-1"><div class="place roboto-normal-black-29px"><a href = "teacher.html">Teacher</a></div></div><br><br>
        <div class="entities roboto-normal-black-29px">Relationship</div>
        <div class="frame-2"><div class="place roboto-normal-black-29px"><a href = "borrows.php">Borrows</a></div></div>
        
        <div class="flex-row">
          
          <div class="frame-33"></div>
        </div>
      </div>
    </div>
  </body>
</html>