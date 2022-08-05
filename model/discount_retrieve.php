    <?php
    
    $query ="SELECT DISTINCT * FROM coupons";
    $result = $conn->query($query);  
    $discount_count = mysqli_num_rows( $result );
    $coupons = mysqli_fetch_all($result, MYSQLI_ASSOC);

    ?>