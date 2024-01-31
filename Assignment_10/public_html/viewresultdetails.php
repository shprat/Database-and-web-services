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
                                    $connect = mysqli_connect("localhost", "group26admin", "ButterEnglish", "group26");
                                    if (mysqli_connect_errno())
                                    {
                                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                    }
                                        $query = "SELECT * FROM Books B WHERE B.book_id=".$_GET[book_id]." LIMIT 1";
                                        $query_run = mysqli_query($connect, $query);
                                       
                                        $book = mysqli_fetch_assoc($query_run);

                                        $book_id = $book['book_id'];
                                        $name = $book['name'];
                                        $author = $book['author'];
                                        $section = $book['section'];

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            ?>
                                                <tr>
                                                
                                                    <td> <?= $book_id; ?></a>  </td>                                               
                                                    <td><?= $name; ?></td>
                                                    <td><?= $author; ?></td>
                                                    <td><?= $section; ?></td>
                                                </tr> 
                                            
                                            <?php
                                            }
                                        
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
                                                </tr>
                                            <?php
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