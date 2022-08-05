<?php
$query ="SELECT * FROM products";
    $result1 = $conn->query($query);
    $product_count = mysqli_num_rows( $result1 );
      $products = mysqli_fetch_all($result1, MYSQLI_ASSOC);
    
?>