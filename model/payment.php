<?php

$query = "SELECT * FROM payments";

    $result = $conn->query($query);
    $payment_count = mysqli_num_rows( $result );
      $payments = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
?>