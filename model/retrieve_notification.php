<?php
//include_once '../../../Db connection.php';

$query ="SELECT * FROM notifications";
    $result = $conn->query($query);  
    $notification_count = mysqli_num_rows( $result );
      $notifications = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>