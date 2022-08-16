<?php
$query ="SELECT orders.*, customers.*, payments.payment_status 
         FROM orders, customers, payments
         Where orders.customer_id = customers.customer_id 
         AND customers.customer_id = payments.customer_id 
         ORDER BY order_id DESC";

         $result3 = $conn->query($query);
         $orders_count = mysqli_num_rows( $result3 );
         $orders = mysqli_fetch_all($result3, MYSQLI_ASSOC);

?>