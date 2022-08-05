<?php

$query = "SELECT orders.order_id, customers.*, payments.*
          FROM orders, customers, payments
          Where orders.customer_id = customers.customer_id";

    $result = $conn->query($query);
    $payment_count = mysqli_num_rows( $result );
      $payments = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
?>