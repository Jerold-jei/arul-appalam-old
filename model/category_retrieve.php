<?php
$query ="SELECT DISTINCT * FROM category";
    $result2 = $conn->query($query);  
    $category_count = mysqli_num_rows( $result2 );
      $categories= mysqli_fetch_all($result2, MYSQLI_ASSOC);
    ?>