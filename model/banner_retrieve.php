<?php


$query ="SELECT DISTINCT * FROM banner";
$result2 = $conn->query($query);  
$banner_count = mysqli_num_rows( $result2 );
  
?>
