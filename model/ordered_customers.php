<?php
require_once '../db/config.php';

if (isset($_GET["customer_id"])) {
      
      $id = $_GET["customer_id"];
      
      $query = "SELECT * FROM customers where customer_id =  $id";
         
      $Result1 =  $conn->query($query);
      $ordered_customers =  mysqli_fetch_all($Result1, MYSQLI_ASSOC);
    }

?>