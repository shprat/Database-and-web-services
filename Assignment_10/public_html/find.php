$(function() {
        var Books = [];
        <?php 
            $connect = mysqli_connect("localhost", "group26", "prettysimple", "group26");
            $query = "SELECT book_id, name, author, section FROM Books";
            $query_run = mysqli_query($connect, $query);
            while($book = mysqli_fetch_assoc($query_run))
            { ?>
                Books.push( '<?php echo $book['name']; ?>' );
            <?php }  ?>;

        $( "#tags" ).autocomplete({
            source: Books,
        });
        
    } );