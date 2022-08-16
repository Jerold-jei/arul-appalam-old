<?php
require_once '../db/config.php';

if (isset($_POST["get_papad_image"])) {
      
      $id = $_POST["get_papad_image"]; 
      $query = "SELECT appalam_image FROM orders where order_id =  $id"; 
      $image =  $conn->query($query);
      $papad_image =  mysqli_fetch_all($image, MYSQLI_ASSOC);
      echo json_encode($papad_image);
    }
