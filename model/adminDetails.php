<?php
    $query ="SELECT DISTINCT * FROM admin";
    $result = $conn->query($query);
    $admin_count = mysqli_num_rows( $result );
    $admins = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>