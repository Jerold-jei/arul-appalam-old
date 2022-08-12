<?php

include "../db/config.php";
if (isset($_POST["update"])) {

	
    $id = mysqli_real_escape_string($conn,$_POST["order_id"]);	           
	$order_status = mysqli_real_escape_string($conn, $_POST['order_status']);

    $querySelect = "SELECT * FROM orders where order_id =  $id";
       
		$ResultSelectStmt = mysqli_query($conn, $querySelect);
		$fetchRecords = mysqli_fetch_assoc($ResultSelectStmt);

              	
		if($fetchRecords > 0){

			$liveSqlQQ = "UPDATE orders SET status = '".$order_status."' where order_id = $id";
			$update = mysqli_query($conn, $liveSqlQQ);	
			
			if($update)
			{
			    //echo "Category updated successfully";
                header("Location: ../admin/order_details.php");
			}else
		    {
			$displayErrMessage = "Sorry, Unable to update";
		    }
   
        }else{
            echo "Error!!!";
    }
   
    
}

?>