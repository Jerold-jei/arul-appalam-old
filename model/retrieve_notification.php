<?php
include_once '../db/config.php';

$query ="SELECT * FROM notifications";
    $result = $conn->query($query);  
    $notification_count = mysqli_num_rows( $result );
      $notifications = mysqli_fetch_all($result, MYSQLI_ASSOC);



      if (isset($_POST["get_notification_details"])) {
      
        $id = $_POST["get_notification_details"]; 
        $query = "SELECT notification_id, notification_title, notification, image_path FROM notifications where notification_id =  $id"; 
        $result1 =  $conn->query($query);
        $notification_previews =  mysqli_fetch_all($result1, MYSQLI_ASSOC);
        echo json_encode($notification_previews);

      }