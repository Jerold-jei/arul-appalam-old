<?php
require_once '../db/config.php';

if (isset($_POST["get_customer_details"])) {
      
      $id = $_POST["get_customer_details"]; 
      $query = "SELECT customer_id, customer_name, customer_email, address, phone FROM customers where customer_id =  $id"; 
      $Result1 =  $conn->query($query);
      $ordered_customers =  mysqli_fetch_all($Result1, MYSQLI_ASSOC);
      echo json_encode($ordered_customers);
    }
