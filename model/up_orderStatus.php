<?php

include "../db/config.php";
if (isset($_POST["get_order_status"])) {

	
    $order_id = $_POST["get_order_status"]['order_id'];	            
	$order_status = $_POST['get_order_status']['order_status'];

    $querySelect = "SELECT * FROM orders where order_id =  $order_id";
       
		$ResultSelectStmt = mysqli_query($conn, $querySelect);
		$fetchRecords = mysqli_fetch_assoc($ResultSelectStmt);

              	
		if($fetchRecords > 0){

			$liveSqlQQ = "UPDATE orders SET status = '".$order_status."' where order_id = $order_id";
			$update = mysqli_query($conn, $liveSqlQQ);
			echo $update;
        }else{
            echo "Error!!!";
    }
   
    
}
