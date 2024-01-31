<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Search </title>
</head>
<body>
<div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>name</th>
                                    <th>author</th>
                                    <th>section</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $connect = mysqli_connect("localhost", "group26", "prettysimple", "group26");
                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM Books WHERE CONCAT(book_id,name,author,section) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($connect, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                
                                                    <td>  <a href=<?php echo '"viewresultdetails.php?book_id='. $items['book_id'].'"' ?>><?= $items['book_id']; ?></a>  </td>                                                                                                            
                                                    <td><?= $items['name']; ?></td>
                                                    <td><?= $items['author']; ?></td>
                                                    <td><?= $items['section']; ?></td>
                                                </tr> 
                                            
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                        <a href="search.php">search page</a>  
                    </div>
                </div>
            </div>
        </div>
    </div>
   
<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>