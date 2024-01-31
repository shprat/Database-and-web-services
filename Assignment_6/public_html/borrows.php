<!DOCTYPE html>
<head>
<title>Borrow page</title>
</head>
<body>
          <?php
              $connect = mysqli_connect("localhost", "group26", "prettysimple", "group26");
              if (mysqli_connect_errno())
              {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
              }
          ?>
          <form method="post" action="/~prshah/brresults.php">
          <div class="entities roboto-normal-black-29px">select member_id</div>
        <select name="Members">
            <?php
            $result = mysqli_query($connect, "SELECT * FROM Members");
            while ($row = mysqli_fetch_array($result))
            {
                echo "<option value='" . $row[member_id] . "'>"
                . $row[member_id] . "</option>\n";
            }
        ?>
        </select>
        <div class="entities roboto-normal-black-29px">select book_id</div>
        <select name="Books">
            <?php
            $result2 = mysqli_query($connect, "SELECT * FROM Books");
            while ($row2 = mysqli_fetch_array($result2))
            {
                echo "<option value='" . $row2[book_id] . "'>"
                . $row2[book_id] . "</option>\n";
            }
        ?>
    </select>
    <div class="entities roboto-normal-black-29px">submit</div>
    <button type="submit" />
    </form>
</body>

</html>