<?php

$query ="SELECT orders.order_id, customers.*, payments.payment_status
         FROM orders, customers, payments
         Where orders.customer_id = customers.customer_id 
         AND customers.customer_id = payments.customer_id 
         AND payments.payment_status ='success'";

    $result4 = $conn->query($query);
    $shipping_count = mysqli_num_rows( $result4 );
      $shippings = mysqli_fetch_all($result4, MYSQLI_ASSOC);
    
?>